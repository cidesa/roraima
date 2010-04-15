<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	
	class pdfreporte extends fpdf
	{
		
		var $bd;
		var $titulos;
		var $titulos2;
		var $anchos;
		var $anchos2;
		var $campos;
		var $sql1;
		var $sql2;
		var $rep;
		var $numero;
		var $cab;
		var $codempdes;
		var $codemphas;
		var $codcardes;
		var $codcarhas;
		var $codcondes;
		var $codconhas;
		var $tipnomdes;
		var $tipnomhas;
		var $fechades;
		var $fechahas;
		var $conf;
		var $nombre;
				
		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->codempdes=$_POST["codempdes"];
			$this->codemphas=$_POST["codemphas"];
			$this->codcardes=$_POST["codcardes"];
			$this->codcarhas=$_POST["codcarhas"];
			$this->codcondes=$_POST["codcondes"];
			$this->codconhas=$_POST["codconhas"];
			$this->tipnomdes=$_POST["tipnomdes"];
			$this->tipnomhas=$_POST["tipnomhas"];
			$this->fechades=$_POST["fechades"];
			$this->fechahas=$_POST["fechahas"];
			$this->sql="SELECT
							A.CODEMP,         
							rtrim(C.NOMEMP) as nomemp,
							C.CEDEMP,
							C.FECING,
							C.FECRET,
							A.CODCON,
							A.CODCAR,         
							B.NOMCAR,
							A.NOMCON,         
							(CASE WHEN D.OPECON='A' THEN coalesce(SUM(A.MONTO),0) ELSE 0 END) as ASIGNA, 
							(CASE WHEN D.OPECON='D' THEN coalesce(SUM(A.MONTO),0) ELSE 0 END) as DEDUC,
							d.opecon as ASIDED,
							f.codcat,
							F.NOMCAT,
							E.nomnom,
							A.CODNOM as codnom
						FROM NPHISCON A, NPCARGOS B, NPHOJINT C, NPDEFCPT D,NPCATPRE F,NPNOMINA E
						WHERE
							A.CODNOM >= RPAD('".$this->tipnomdes."',3,' ') AND
							A.CODNOM <= RPAD('".$this->tipnomhas."',3,' ') AND 
							A.CODNOM=E.CODNOM AND
							F.CODCAT=A.CODCAT AND
							C.CODEMP=A.CODEMP AND
							B.CODCAR=A.CODCAR AND
							A.CODEMP >= RPAD('".$this->codempdes."',16,' ') AND
							A.CODEMP <= RPAD('".$this->codemphas."',16,' ') AND
							A.CODCAR >= RPAD('".$this->codcardes."',16,' ') AND
							A.CODCAR <= RPAD('".$this->codcarhas."',16,' ') AND
							A.CODCON >= RPAD('".$this->codcondes."',3,' ') AND
							A.CODCON <= RPAD('".$this->codconhas."',3,' ') AND
							A.CODCON=D.CODCON AND
							A.CODCON NOT IN (SELECT CODCON FROM NPNOMESPCONNOMTIP) AND 
							fecnom>=to_date('".$this->fechades."','dd/mm/yyyy') AND
							fecnom<=to_date('".$this->fechahas."','dd/mm/yyyy') AND
							D.IMPCPT = 'S' 
						GROUP BY A.CODEMP, C.NOMEMP,C.CEDEMP,C.FECING,C.FECRET,A.CODCON,A.CODCAR,B.NOMCAR,A.NOMCON,d.opecon,f.codcat,F.NOMCAT,E.nomnom,A.CODNOM 
						ORDER BY A.CODCAR,A.CODEMP,D.OPECON ,A.CODCON";
						//print $this->sql;			
			
		}

		function Header()
		{
		}
		function Cuerpo()
		{
			$this->setFont("Courier","B",8);
		    $tb=$this->bd->select($this->sql);
		    $tb2=$this->bd->select($this->sql);
			$ref="";
			$acum1=0;
			$acum2=0;
			$acum3=0;
			if(!$tb2->EOF)
			{
				$ref=$tb2->fields["codemp"];
			    $this->cell(190,10,$this->fechahas,0,0,'R');
			    $this->ln(8);
				$this->cell(30,10,$tb2->fields["codnom"]);
				$this->cell(20,10,$tb2->fields["codemp"]);
				$this->cell(100,10,$tb2->fields["nomemp"]);
				$this->ln(5);
				$this->cell(200,10,$tb2->fields["nomcar"],0,0,'C');
				$this->ln(10);
				$this->line(10,$this->getY(),200,$this->getY());				
				$this->ln(2);			
			}
			while(!$tb->EOF)
			{
				if($tb->fields["codemp"]!=$ref)
				{
				 $this->setFont("Courier","B",8);
				 $this->ln(28);
				 //totales
				 $this->line(10,$this->getY(),200,$this->getY());	
				 //$this->ln(2);
				 if(($acum1-$acum2) < 0)
				 {
				 	$this->cell(100,5,'('.number_format(abs(($acum1-$acum2)),2,'.',',').')',0,0,'R');
				 }
				 else
				 {
				 	$this->cell(100,5,number_format(($acum1-$acum2),2,'.',','),0,0,'R');
				 }
				 $acum1=0;
				 $acum2=0;
				 //
				 $this->ln(20);
				 $this->cell(190,10,$this->fechahas,0,0,'R');
				 $this->ln(8);
				 $this->cell(30,10,$tb->fields["codnom"]);
				 $this->cell(20,10,$tb->fields["codemp"]);
				 $this->cell(100,10,$tb->fields["nomemp"]);
				 $this->ln(5);
				 $this->cell(200,10,$tb->fields["nomcar"],0,0,'C');
				 $this->ln(10);
				 $this->line(10,$this->getY(),200,$this->getY());	
				 $this->ln(2);			
				}
				
				 $this->setFont("Courier","",8); 
				 $this->cell(90,5,$tb->fields["nomcon"]);
				 $this->cell(25,5,number_format($tb->fields["asigna"],2,'.',','));
				 $acum1=$acum1+$tb->fields["asigna"];
				 $this->cell(25,5,number_format($tb->fields["deduc"],2,'.',','));
				 $acum2=$acum2+$tb->fields["deduc"];
				 $ref=$tb->fields["codemp"];
				 $tb->MoveNext();
			     $this->ln(3);
			}
				 $this->setFont("Courier","B",8);
				 $this->ln(30);
				 //totales
				 $this->line(10,$this->getY(),200,$this->getY());	
				 //$this->ln(2);
				 if(($acum1-$acum2) < 0)
				 {
				 	$this->cell(100,5,'('.number_format(abs(($acum1-$acum2)),2,'.',',').')',0,0,'R');
				 }
				 else
				 {
				 	$this->cell(100,5,number_format(($acum1-$acum2),2,'.',','),0,0,'R');
				 }
				 $acum1=0;
				 $acum2=0;
				 // 
		}
	}
?>