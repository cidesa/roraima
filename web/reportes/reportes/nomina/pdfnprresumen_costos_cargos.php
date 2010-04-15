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
		var $codcondes;
		var $codconhas;
		var $tipnom;
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
			$this->codcondes=$_POST["codcondes"];
			$this->codconhas=$_POST["codconhas"];
			$this->tipnom=$_POST["tipnom"];
			$this->sql="SELECT 
							(B.CODCAT) as codpre,
							(B.CODCAR) as codcar 
						FROM NPNOMCAL A,NPASICAREMP B,NPDEFCPT C
						WHERE
							(A.CODNOM) = RPAD('".$this->tipnom."',3,' ') AND
							(B.CODEMP)=(A.CODEMP) AND
							(B.CODCAR)=(A.CODCAR) AND
							C.CODCON=A.CODCON AND
							(B.STATUS)='V' AND
							(A.CODEMP) >= RPAD('".$this->codempdes."',16,' ') AND
							(A.CODEMP) <= RPAD('".$this->codemphas."',16,' ') AND
							(A.CODCON) >= RPAD('".$this->codcondes."',3,' ') AND
							(A.CODCON) <= RPAD('".$this->codconhas."',3,' ') AND
							(IMPCPT) = 'S' AND
							(OPECON) <> 'P' AND
							A.SALDO>0 AND
							A.CODCON<>'XXX' 
							And A.CODCON NOT IN (SELECT CODCON FROM npconceptoscategoria) 
						GROUP BY (B.CODCAT),(B.CODCAR) 
						ORDER BY (B.CODCAT)";
						//print $this->sql;			
			
		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s",$parte[$ubica]);
			$this->setFont("Arial","B",8);
			$rs=$this->bd->select("select nomnom as nombre from NPNOMCAL where (codnom)=RPAD('".$this->tipnom."',3,' ' )");
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
			$this->setTextColor(0,0,255); 
			$this->cell(100,5,'Nomina: '.$this->tipnom.' - '.$this->nombre);
			$this->ln(4);
			$this->cell(100,5,'DESDE: '.$fechad.' HASTA: '.$fechah);
			$this->setTextColor(0,0,255); 
			$this->ln(5);
			
		}
		function Cuerpo()
		{
			$this->setFont("Arial","B",8);
		    $tb=$this->bd->select($this->sql);
		    $tb2=$this->bd->select($this->sql);
			$ref="";
			$acum1=0;
			$acum2=0;
			$acum3=0;
			$acum4=0;
			$totacum1=0;
			$totacum2=0;
			$totacum3=0;
			$totacum4=0;
			$acumulado=0;
			$cont=0;
			$contador=0;
			$cont2=0;
			$cuenta=0;
			$y1=50;
			$y2=49;
			$y3=80;
			$y4=0;
			if(!$tb2->EOF)
			{
				 $ref=$tb2->fields["codpre"];
				 $this->setFillColor(192,192,192);
				 $this->cell(30,3,$tb2->fields["codpre"],0,0,'',1);
				 $j=$this->bd->select("SELECT NOMPRE as NOMBRE FROM CPDEFTIT  WHERE RTRIM(CODPRE)=RTRIM('".$tb2->fields["codpre"]."')");
				 if(!$j->EOF)
				 {
				 	$nompre=$j->fields["nombre"];
				 }
				 $this->cell(100,3,strtoupper($nompre),0,0,'',1);
				 //$cont=$cont+1;
				 $this->cell(60,3,'CANTIDAD DE EMPLEADOS: ',0,0,'',1);
				 $this->setFillColor(0,0,0);
				 $this->ln(5);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->ln(2);
				 $this->cell(30,5,'Código del Cargo');
				 $this->cell(90,5,'Descripción del Cargo');
				 $this->cell(30,5,'Nº Empleados');
				 $this->cell(30,5,'Monto');
				 $this->ln(4);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->setFont("Arial","",8); 
				 
			}
			while(!$tb->EOF)
			{
				if($tb->fields["codpre"]!=$ref)
				{
				 $this->setFont("Arial","B",8);
				 //print $y4;
				 
				 if($y4==15)
				 {
				 	$a=94 + $y4;
				 }
				 else if($y4==14)
				 {
				 	$a=89 + $y4;
				 }
				 else if($y4==13)
				 {
				 	$a=84 + $y4;
				 }
				 else if($y4==12)
				 {
				 	$a=79 + $y4;
				 }
				 else if($y4==11)
				 {
				 	$a=74 + $y4;
				 }
				 else if($y4==10)
				 {
				 	$a=69 + $y4;
				 }
				 else if($y4==9)
				 {
				 	$a=64 + $y4;
				 }
				 else if($y4==8)
				 {
				 	$a=59 + $y4;
				 }
				 else if($y4==7)
				 {
				 	$a=54 + $y4;
				 }
				 else if($y4==6)
				 {
				 	$a=49 + $y4;
				 }
				 else if($y4==5)
				 {
				 	$a=44 + $y4;
				 }
				 else if($y4==4)
				 {
				 	$a=39 + $y4;
				 }
				 else if($y4==3)
				 {
				 	$a=34 + $y4;
				 }
				 else if($y4==2)
				 {
				 	$a=29 + $y4;
				 }
				 else if($y4==1)
				 {
				 	$a=24 + $y4;
				 }
				 $this->cell(180,-$a ,$cont,0,0,'R');
				 $cont2=$cont2+$y4;
				 $cuenta=$cuenta + $cont;
				 $y4=0;
				 $cont=0;
				 $this->ln(2);
				 $this->line(100,$this->getY(),200,$this->getY());
				 $this->ln(2);
				 $this->cell(30,5,'');
				 $this->cell(90,5,'');
				 $this->cell(30,5,'');
				 $this->cell(30,5,number_format($acum1,2,'.',','));
				 $totacum1=$totacum1+$acum1;
				 $this->ln(4);
				 $this->line(100,$this->getY(),200,$this->getY());
				 $acum1=0;
				 //
				 $this->ln(30);
				 $this->setFillColor(192,192,192);
				 $this->cell(30,3,$tb->fields["codpre"],0,0,'',1);
				 $j=$this->bd->select("SELECT NOMPRE as NOMBRE FROM CPDEFTIT  WHERE RTRIM(CODPRE)=RTRIM('".$tb->fields["codpre"]."')");
				 if(!$j->EOF)
				 {
				 	$nompre=$j->fields["nombre"];
				 }
				 $this->cell(100,3,strtoupper($nompre),0,0,'',1);
				 $this->cell(60,3,'CANTIDAD DE EMPLEADOS: ',0,0,'',1);
				 $this->setFillColor(0,0,0);
				 $this->ln(5);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->ln(2);
				 $this->cell(30,5,'Código del Cargo');
				 $this->cell(90,5,'Descripción del Cargo');
				 $this->cell(30,5,'Nº Empleados');
				 $this->cell(30,5,'Monto');
				 $this->ln(4);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->setFont("Arial","",8); 
				}
				
				 $this->setFont("Arial","",8); 
				 $this->cell(30,5,$tb->fields["codcar"]);
				 $b=$this->bd->select("SELECT nomcar as NOMBRE FROM NPCARGOS  WHERE (CODCAR)=RPAD('".$tb->fields["codcar"]."',16,' ')");
				 if(!$b->EOF)
				 {
				 	$nomcar=$b->fields["nombre"];
				 }
				 $this->cell(90,5,$nomcar);
				 $contador=$contador+1;
				 $c=$this->bd->select("SELECT COUNT(CODEMP) as NUMERO FROM NPASICAREMP WHERE (CODCAT)=RPAD('".$tb->fields["codpre"]."',16,' ') AND (CODCAR)=RPAD('".$tb->fields["codcar"]."',16,' ') AND STATUS='V' AND CODNOM='".$this->tipnom."'");
				 if(!$c->EOF)
				 {
				 	$numero=$c->fields["numero"];
				 }
				 $this->cell(30,5,$numero);
				 $contador=0;
				 $cont=$cont+$numero;
				 $n=$this->bd->select("SELECT SUM(MONTONOMINA) as NUMERO FROM NPASICAREMP WHERE (CODCAT)=RPAD('".$tb->fields["codpre"]."',16,' ') AND (CODCAR)=RPAD('".$tb->fields["codcar"]."',16,' ') AND STATUS='V' AND CODNOM='".$this->tipnom."'");
				 if(!$n->EOF)
				 {
				 	$costo=$n->fields["numero"];
				 }
				 $this->cell(30,5,number_format($costo,2,'.',','));
				 $acum1=$acum1+$costo;
				 $y4=$y4+1;
				 $ref=$tb->fields["codpre"];
				 $tb->MoveNext();
			     $this->ln(3);
			}
				 $this->setFont("Arial","B",8);
				 if($y4==15)
				 {
				 	$a=94 + $y4;
				 }
				 else if($y4==14)
				 {
				 	$a=89 + $y4;
				 }
				 else if($y4==13)
				 {
				 	$a=84 + $y4;
				 }
				 else if($y4==12)
				 {
				 	$a=79 + $y4;
				 }
				 else if($y4==11)
				 {
				 	$a=74 + $y4;
				 }
				 else if($y4==10)
				 {
				 	$a=69 + $y4;
				 }
				 else if($y4==9)
				 {
				 	$a=64 + $y4;
				 }
				 else if($y4==8)
				 {
				 	$a=59 + $y4;
				 }
				 else if($y4==7)
				 {
				 	$a=54 + $y4;
				 }
				 else if($y4==6)
				 {
				 	$a=49 + $y4;
				 }
				 else if($y4==5)
				 {
				 	$a=44 + $y4;
				 }
				 else if($y4==4)
				 {
				 	$a=39 + $y4;
				 }
				 else if($y4==3)
				 {
				 	$a=34 + $y4;
				 }
				 else if($y4==2)
				 {
				 	$a=29 + $y4;
				 }
				 else if($y4==1)
				 {
				 	$a=24 + $y4;
				 }
				 $this->cell(180,-$a,$cont,0,0,'R');
				 $cont2=$cont2+$y4;
				 $cuenta=$cuenta + $cont;
				 $y4=0;
				 $this->ln(2);
				 $this->line(100,$this->getY(),200,$this->getY());
				 $this->ln(2);
				 $this->cell(30,5,'');
				 $this->cell(90,5,'');
				 $this->cell(30,5,'');
				 $this->cell(30,5,number_format($acum1,2,'.',','));
				 $totacum1=$totacum1+$acum1;
				 $this->ln(4);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->ln(2);
				 $this->cell(30,5,'TOTALES');
				 $this->cell(90,5,'');
				 $this->cell(30,5,$cuenta);
				 $this->cell(30,5,number_format($totacum1,2,'.',','));
				 $this->ln(4);
				 $this->line(10,$this->getY(),200,$this->getY());
				 
		}
	}
?>