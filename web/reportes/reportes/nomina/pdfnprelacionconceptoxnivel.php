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
		var $sql;
		var $tsql;
		var $sql2;
		var $rep;
		var $numero;
		var $cab;
		var $codempdes;
		var $codemphas;
		var $codcardes;
		var $codcarhas;
		var $codnivdes;
		var $codnivhas;
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
			$this->codempdes=$_POST["codempdes"];
			$this->codemphas=$_POST["codemphas"];
			$this->codcardes=$_POST["codcardes"];
			$this->codcarhas=$_POST["codcarhas"];
			$this->codnivdes=$_POST["codnivdes"];
			$this->codnivhas=$_POST["codnivhas"];
			$this->codcondes=$_POST["codcondes"];
			$this->codconhas=$_POST["codconhas"];
			$this->tipnom=$_POST["tipnom"];
			$this->elaborado=$_POST["elaborado"];
			$this->revisado=$_POST["revisado"];
			$this->autorizado=$_POST["autorizado"];
			$this->tsql="SELECT * FROM NPESTORG WHERE CODNIV>= '".$this->codnivdes."' AND CODNIV<= '".$this->codnivhas."' ORDER BY CODNIV";
			$this->sql="SELECT DISTINCT(A.CODCON),                        
							D.CODNIV as codnivemp,
							RTRIM(A.NOMCON) as NOMCON,
							A.CODNOM,
							A.NOMNOM,
							A.ASIDED,
							SUM((CASE WHEN A.SALDO=0 THEN 0 ELSE 1 END)) as CANT,
							SUM((CASE WHEN A.ASIDED='A' THEN A.SALDO ELSE 0 END)) as ASIGNA,
							SUM((CASE WHEN A.ASIDED='D' THEN A.SALDO ELSE 0 END)) as DEDUC ,
							B.IMPCPT,
							b.codpar --,
							--E.CODNIV as nivel,
							--E.DESNIV as desnivel
						FROM NPNOMCAL A, NPDEFCPT B,NPASICAREMP C,NPHOJINT D --,NPESTORG E
						WHERE
							A.CODEMP=D.CODEMP AND
							A.CODNOM=C.CODNOM AND
							A.CODCAR=C.CODCAR AND
							A.CODEMP=C.CODEMP AND
							(A.CODCON) <> 'XXX' AND
							(B.CODCON) = (A.CODCON) AND
							(A.CODCON) >= RPAD('".$this->codcondes."',3,' ') AND
							(A.CODCON) <= RPAD('".$this->codconhas."',3,' ') AND
							A.SALDO > 0 AND
							B.IMPCPT = 'S' AND
							(A.CODNOM) = RPAD('".$this->tipnom."',3,' ') --AND 
							--E.CODNIV=D.CODNIV AND 
							--E.CODNIV>= '".$this->codnivdes."' AND
							--E.CODNIV<= '".$this->codnivhas."'
						GROUP BY A.CODCON,D.CODNIV,RTRIM(A.NOMCON),A.CODNOM,A.NOMNOM,A.ASIDED, B.IMPCPT,b.codpar --,E.CODNIV,E.DESNIV
						ORDER BY D.CODNIV,A.asided,A.CODCON";
						//print $this->sql;			
			
		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s",$parte[$ubica]);
			$this->setFont("Arial","B",8);
			$rs=$this->bd->select("select upper(nomnom) as nombre from NPASICAREMP where codnom='".$this->tipnom."'");
			if(!$rs->EOF)
			{
				$this->nombre=$rs->fields["nombre"];
			}
			$sr=$this->bd->select("SELECT to_char(ULTFEC,'dd/mm/yyyy') as FECHA FROM NPNOMINA  WHERE CODNOM=RPAD('".$this->tipnom."',3,' ')");
			if(!$sr->EOF)
			{
				$fechad=$sr->fields["fecha"];
			}
			$ss=$this->bd->select("SELECT to_char(PROFEC,'dd/mm/yyyy') as FECHA FROM NPNOMINA  WHERE CODNOM=RPAD('".$this->tipnom."',3,' ')");
			if(!$ss->EOF)
			{
				$fechah=$ss->fields["fecha"];
			}
			$this->cell(100,5,'NOMINA: '.$this->tipnom.' - '.$this->nombre);
			$this->cell(60,5,'PERIODO DEL: '.$fechad.' AL '.$fechah);
			$this->ln(5);
			
		}
		function Cuerpo()
		{
			$this->setFont("Arial","B",8);
		    $tb=$this->bd->select($this->sql);
		    $tb2=$this->bd->select($this->tsql);
			$acum1=0;
			$acum2=0;
			$acum3=0;
			$totacum1=0;
			$totacum2=0;
			$totacum3=0;
			$sw=false;
			$cont=0;
			while((!$tb2->EOF)&&($sw==false))
			{
				$ok=true;
				$ref=$tb2->fields["codniv"];
				 $this->setFont("Arial","B",8); 
				 $this->cell(80,5,'CATEGORIA: '.$tb2->fields["codniv"].' '.strtoupper($tb2->fields["desniv"]));
				 $this->ln(4);
				 $j=$this->bd->select("	SELECT COUNT(DISTINCT(A.CODEMP)) as NUMERO FROM NPNOMCAL A,NPASICAREMP B,NPHOJINT C WHERE A.CODEMP=C.CODEMP AND A.CODNOM=B.CODNOM AND A.CODCAR = B.CODCAR AND A.CODEMP=B.CODEMP AND A.CODNOM= ('".$this->tipnom."') AND C.CODNIV='".$tb2->fields["codniv"]."'");
				 if(!$j->EOF)
				 {
				 	$numero=$j->fields["numero"];
				 }
				 $this->cell(80,5,'NUMERO DE TRABAJADORES: '.$numero);
				 $unidad=$tb2->fields["desniv"];
				 $this->ln(5);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->ln(2);
				 $this->cell(30,3,'Cant.de Trabajadores');
				 $this->cell(15,3,'Concepto');
				 $this->cell(35,3,'Partida Presupuestaria');
				 $this->cell(50,3,'Nombre del Concepto');
				 $this->cell(30,3,'Asignaciones');
				 $this->cell(30,3,'Deducciones');
				 $this->ln(4);
				 $this->line(10,$this->getY(),200,$this->getY());
				while((!$tb->EOF)&&($ok==true))
				{
					if($tb->fields["codnivemp"]!=$ref)
					{
						$cont=$cont+1;
						$ok=false;
					}
					else
					{
				 		$this->setFont("Arial","",8); 
				 		$this->cell(30,5,$tb->fields["cant"]);
				 		$this->cell(15,5,$tb->fields["codcon"]);
				 		$this->cell(35,5,$tb->fields["codpar"]);
				 		$this->cell(50,5,$tb->fields["nomcon"]);
				 		$this->cell(30,5,number_format($tb->fields["asigna"],2,'.',','));
				 		$acum1=$acum1+$tb->fields["asigna"];
				 		$this->cell(30,5,number_format($tb->fields["deduc"],2,'.',','));
				 		$acum2=$acum2+$tb->fields["deduc"];
						$this->ln(3);
						$tb->MoveNext();
					}
				}
				 $this->setFont("Arial","B",8); 
				 $this->ln(2);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->ln(2);
				 $this->setFillColor(192,192,192);
				 $this->cell(20,3,'TOTAL  ',0,0,'',1);
				 $this->cell(70,3,strtoupper($tb2->fields["desniv"]),0,0,'',1);
				 $totacum1=$totacum1+$acum1;
				 $totacum2=$totacum2+$acum2;
				 $this->cell(20,3,number_format(($totacum1-$totacum2),2,'.',','),0,0,'',1);
				 $totacum1=0;
				 $totacum2=0;
				 $this->cell(20,3,'');
				 $this->cell(30,3,number_format($acum1,2,'.',','));
				 $this->cell(30,3,number_format($acum2,2,'.',','));
				 $this->ln(5);
				 $acum1=0;
				 $acum2=0;
				 $acum3=0;
			     $this->ln(10);
				 $this->setFont("Arial","B",8); 
				 $this->cell(60,3,$this->elaborado,0,0,'C');
				 $this->cell(60,3,$this->revisado,0,0,'C');
				 $this->cell(60,3,$this->autorizado,0,0,'C');
				 $this->ln(2);
				 $this->setFont("Arial","BU",8); 
				 $this->cell(60,3,'                                					',0,0,'C');
				 $this->cell(60,3,'                                					',0,0,'C');
				 $this->cell(60,3,'                                					',0,0,'C');
				 $this->ln(3);
				 $this->setFont("Arial","B",8); 
				 $this->cell(60,3,'Elaborado',0,0,'C');
				 $this->cell(60,3,'Revisado',0,0,'C');
				 $this->cell(60,3,'Autorizado',0,0,'C');
			     $tb2->MoveNext();
				 $this->ln(200);
			}
		}
	}
?>