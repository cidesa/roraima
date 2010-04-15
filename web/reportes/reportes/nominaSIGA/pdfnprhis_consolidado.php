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
		var $annos;
		var $fechades;
		var $fechahas;
		var $codcondes;
		var $codconhas;
		var $tipnom;
		var $elaborado;
		var $revisado;
		var $autorizado;
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
			$this->fechades=$_POST["fecnomdes"];
			$this->fechahas=$_POST["fecnomhas"];
			$this->codcondes=$_POST["codcondes"];
			$this->codconhas=$_POST["codconhas"];
			$this->tipnom=$_POST["tipnom"];
			$this->elaborado=$_POST["elaborado"];
			$this->revisado=$_POST["revisado"];
			$this->autorizado=$_POST["autorizado"];
			if(substr($this->fechades,0,2)<='15')
			{
				$this->fechades='01/'.substr($this->fechades,3,8);
			}
			$this->sql="SELECT 
							DISTINCT(A.CODCON) as codcon,
							substr(RTRIM(B.NOMCON),1,33) as NOMCON,
							A.CODNOM,
							C.NOMNOM,
							B.OPECON as ASIDED,
							SUM((CASE WHEN MONTO=0 THEN 0 ELSE 1 END)) as CANT, 
							SUM((CASE WHEN B.OPECON='A' THEN MONTO ELSE 0 END)) as ASIGNA, 
							SUM((CASE WHEN B.OPECON='D' THEN MONTO ELSE 0 END)) as DEDUC ,
							SUM((CASE WHEN B.OPECON='P' THEN MONTO ELSE 0 END)) as APO ,
							B.IMPCPT,
							b.codpar
						FROM 
							NPNOMINA C,
							NPDEFCPT B,
							NPHISCON A 
						WHERE
							(A.CODCON) <> 'XXX' AND
							(B.CODCON) = (A.CODCON) AND
							(A.CODCON) >= RPAD('".$this->codcondes."',3,' ') AND
							(A.CODCON) <= RPAD('".$this->codconhas."',3,' ') AND
							B.IMPCPT = 'S' AND
							A.CODNOM=C.CODNOM AND
							(A.CODNOM) = RPAD('".$this->tipnom."',3,' ')  AND FECNOM>=to_date('".$this->fechades."','dd/mm/yyyy')
							AND FECNOM<=to_date('".$this->fechahas."','dd/mm/yyyy')
						GROUP BY A.CODCON,RTRIM(B.NOMCON),A.CODNOM,C.NOMNOM,B.OPECON, B.IMPCPT,b.codpar
						ORDER BY asided,A.CODCON";
						//print $this->sql;			
			
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s","s");
			$this->setFont("Arial","B",8);
			$rs=$this->bd->select("select nomnom as nombre from NPASICAREMP where codnom='".$this->tipnom."'");
			if(!$rs->EOF)
			{
				$this->nombre=$rs->fields["nombre"];
			}
			$sr=$this->bd->select("SELECT coalesce(TO_CHAR(NUMSEM,'99'),'-1') as nombre FROM NPNOMINA WHERE (CODNOM)= ('".$this->tipnom."') AND FRECAL='s'");
			if(!$sr->EOF)
			{
				$nomb=$sr->fields["nombre"];
			}
			if($nomb<>'-1')
			{
				$semana='SEMANA: '.$nomb;
			}
			else
			{
				$semana='';
			}
			$this->setTextColor(0,0,255); 
			$this->cell(100,5,'NOMINA: '.$this->tipnom.' - '.$this->nombre);
			$this->cell(60,5,'PERIODO DEL: '.$this->fechades.' AL '.$this->fechahas);
			$this->cell(20,5,$semana);
			$this->ln(5);
			$np=$this->bd->select("SELECT COUNT(DISTINCT(CODEMP)) as NUMERO FROM NPNOMCAL WHERE (CODNOM)= ('".$this->tipnom."')");
			if(!$np->EOF)
			{
				$cantidad=$np->fields["numero"];
			}
			$this->cell(100,5,'Nº de Trabajadores: '.$cantidad);
			$this->setTextColor(0,0,0); 
			$this->ln(5);
			$this->line(10,$this->getY(),200,$this->getY());
		}
		function Cuerpo()
		{
			$this->setFont("Arial","B",8);
		    $tb=$this->bd->select($this->sql);
		    //$tb2=$this->bd->select($this->sql);
			$ref="";
			$acum1=0;
			$acum2=0;
			$acum3=0;
			while(!$tb->EOF)
			{
				if($tb->fields["codnom"]!=$ref)
				{
				 $this->setFont("Arial","B",8);
				 	$this->ln(2);
				 	$this->cell(28,5,'Cant.Trabajadores');
				 	$this->cell(17,5,'Concepto');
				 	$this->cell(35,5,'Partida Presupuestaria');
				 	$this->cell(45,5,'Nombre Concepto');
				 	$this->cell(25,5,'Asignación');
				 	$this->cell(25,5,'Deducción');
				 	$this->cell(25,5,'Aporte');
				 	$this->ln(4);
				 	$this->line(10,$this->getY(),200,$this->getY());
				 }	
				 	$this->setFont("Arial","",8);
				 	$this->cell(28,5,$tb->fields["cant"]);
				 	$this->cell(17,5,$tb->fields["codcon"]);
				 	$this->cell(35,5,$tb->fields["codpar"]);
				 	$this->setFont("Arial","",7);
				 	$this->cell(45,5,$tb->fields["nomcon"]);
				 	$this->setFont("Arial","",8);
				 	$this->cell(25,5,number_format($tb->fields["asigna"],2,'.',','));
					$acum1=$acum1+$tb->fields["asigna"];
				 	$this->cell(25,5,number_format($tb->fields["deduc"],2,'.',','));
					$acum2=$acum2+$tb->fields["deduc"];
				 	$this->cell(25,5,number_format($tb->fields["apo"],2,'.',','));
					$acum3=$acum3+$tb->fields["apo"];
				 $ref=$tb->fields["codnom"];
				 $tb->MoveNext();
			     $this->ln(3);
			}
				 $this->setFont("Arial","B",8);
				 $this->ln(2);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->ln(2);
				 $this->setFillColor(192,192,192); 
				 $this->cell(35,5,'TOTAL '.$this->nombre,0,0,'',1);
				 $this->cell(10,5,'',0,0,'',1);
				 if(($acum1 > 0 )&& ($acum2 > 0))
				 {
				 	$monto=$acum1-$acum2;
				 }
				 else
				 {
				 	$monto=0;
				 }
				 $this->cell(35,5,number_format($monto,2,'.',','),0,0,'',1);
				 $this->cell(45,5,'',0,0,'',1);
				 $this->setFillColor(0,0,0); 
				 $this->cell(25,5,number_format($acum1,2,'.',','));
				 $this->cell(25,5,number_format($acum2,2,'.',','));
				 $this->cell(25,5,number_format($acum3,2,'.',','));
				 $this->ln(5);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->ln(5);
				 $this->setFont("Arial","BU",8);
				 $this->cell(150,5,$this->elaborado);
				 $this->cell(50,5,$this->revisado);
				 $this->ln(3);
				 $this->setFont("Arial","B",8);
				 $this->setTextColor(0,0,255); 
				 $this->cell(150,5,'						Elaborado Por');
				 $this->cell(50,5,'							Revisado Por');
				 $this->ln(3);
				 $this->setTextColor(0,0,0); 
				 $this->setFont("Arial","BU",8);
				 $this->cell(110,5,$this->autorizado,0,0,'R');
				 $this->ln(3);
				 $this->setFont("Arial","B",8);
				 $this->setTextColor(0,0,255); 
				 $this->cell(110,5,'Autorizado Por						',0,0,'R');
				 $this->setTextColor(0,0,0); 
				 // 
		}
	}
?>