<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	
	class pdfreporte extends fpdf
	{
		
		var $bd;
		var $sql;
		var $empdes;
		var $emphas;				
		var $bandes;
		var $banhas;
		var $fecdes;
		var $fechas;
		var $catdes;
		var $cathas;
		var $nomdes;
		var $nomhas;
		
		
		
		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
 			$this->empdes=$_POST["empdes"];
			$this->emphas=$_POST["emphas"];
			$this->bandes=$_POST["bandes"];
			$this->banhas=$_POST["banhas"];
			$this->fecdes=$_POST["fecdes"];	
			$this->fechas=$_POST["fechas"];								
			$this->catdes=$_POST["catdes"];	
			$this->cathas=$_POST["cathas"];								
			$this->nomdes=$_POST["nomdes"];	
			$this->nomhas=$_POST["nomhas"];								
			$this->a=1;
			$this->sql="SELECT
A.CODBAN,
C.NOMBAN,
A.NACEMP,
A.CEDEMP as CODEMP,
B.CODEMP as IDEMP,
A.NOMEMP,
A.NUMCUE,
SUM(case when G.OPECON='A' then B.MONTO else 0 end),
B.CODCAR as CODCAR,
D.NOMCAR,
B.CODNOM,
B.NUMREC
FROM NPHISCON B, NPBANCOS C, NPHOJINT A,  NPCARGOS D, NPDEFCPT G
WHERE
B.CODNOM>=LPAD('".$this->nomdes."',3,'0')
AND B.CODNOM<=LPAD('".$this->nomhas."',3,'0')
AND B.CODEMP>= RPAD('".$this->empdes."',16,' ')
AND B.CODEMP <= RPAD('".$this->emphas."',16,' ')
AND B.FECNOM>=TO_DATE('".$this->fecdes."','dd/mm/yyyy')
AND B.FECNOM<=TO_DATE('".$this->fechas."','dd/mm/yyyy')
AND B.CODCAT>=RPAD('".$this->catdes."',16,' ')
AND B.CODCAT<=RPAD('".$this->cathas."',16,' ')
AND B.CODCAR=D.CODCAR
AND B.CODCON=G.CODCON
AND B.CODEMP = A.CODEMP
AND A.CODBAN=C.CODBAN
GROUP BY A.CODBAN,C.NOMBAN,A.NACEMP,A.CEDEMP,B.CODEMP,
A.NOMEMP,A.NUMCUE,B.CODCAR,D.NOMCAR,B.CODNOM,B.NUMREC,
B.CODCAT
ORDER BY B.codnom,b.codcat,A.CODBAN";
		//	print $this->sql;	
			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			
		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="CÉDULA";
				$this->titulos[1]="NOMBRE DEL EMPLEADO";
				$this->titulos[2]="CARGOS";
				$this->titulos[3]="CUENTA BANCARIA";
				$this->titulos[4]="MONTO A DEPOSITAR";								
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","",8);	
			$this->SetXY(20,35);
			$this->cell(20,6,"Banco ",0,'L',0); $this->ln();	
  			$this->cell(20,6,"NÓMINA :",0,'L',0);//$this->ln();	
			$this->cell(60,6,"Desde: ",0,'L',0);
 			$this->cell(80,6,"Hasta : ",0,'L',0);
		  	$this->ln();		
   			$this->cell(20,6,"CATEGORÍA :",0,'L',0); 
		  $this->ln();
		  
		  $this->sql3="SELECT UPPER(NOMNOM) as NOMBRE FROM NPNOMINA 
				WHERE CODNOM=LPAD('".$tb->fields["codnom"]."',3,'0');";
  			$tb3=$this->bd->select($this->sql3);
   			
   			$this->sql2="SELECT to_char(ULTFEC,'dd/mm/yyyy') as ultfec,
					 to_char(PROFEC,'dd/mm/yyyy') as profec FROM NPNOMINA 
					 WHERE CODNOM='".$tb->fields["codnom"]."';";
  			$tb2=$this->bd->select($this->sql2);
  			
   			$this->sql4=" SELECT DISTINCT(CODCAT) as CODCAT FROM NPHISCON
						  WHERE CODNOM='".$tb->fields["codnom"]."' AND 
 						  CODEMP=RPAD('".$tb->fields["idemp"]."',16,' ') AND
						  CODCAR=RPAD('".$tb->fields["codcar"]."',16,' ') AND
						  to_char(FECNOM,'dd/mm/yyyy')>='".$this->fecdes."' AND
  						  to_char(FECNOM,'dd/mm/yyyy')<='".$this->fechas."' AND
						  CODCON NOT IN (SELECT CODCAT FROM NPCONCEPTOSCATEGORIA
										 WHERE CODNOM='".$tb->fields["codnom"]."')";
  			$tb4=$this->bd->select($this->sql4);
  			
  			$this->sql5=" SELECT NOMCAT FROM NPCATPRE WHERE CODCAT=RPAD('".$tb4->fields["codcat"]."',16,' ');";
  			$tb5=$this->bd->select($this->sql5);
  			$this->SetY(35);
  				$this->cell(25,6,$tb->fields["codban"].'   '.$tb->fields["nomban"],0,'L',0); 
  			$this->ln();	
			$this->cell(25,6,$tb->fields["codnom"].'	'.$tb3->fields["nombre"],0,'L',0); 
			$this->cell(90,6,$tb->fields["ultfec"],0,'L',0); 
			$this->cell(120,6,$tb->fields["profec"],0,'L',0); 
		    $nom=$tb->fields["codnom"];
			$this->ln();		
   			$this->cell(25,6,$tb4->fields["codcat"]."    ".$tb5->fields["nomcat"]);
		   
		  
		  $this->setFont("Arial","",7);			
			$this->ln();				
			if ($this->a!=1)	
			{$this->cell(13,6,$this->titulos[0]);
			$this->cell(65,6,$this->titulos[1]);
			$this->cell(60,6,$this->titulos[2]);
			$this->cell(30,6,$this->titulos[3]);
			$this->cell(15,6,$this->titulos[4]);
			$this->ln(4);
			$this->Line($this->GetX(),$this->GetY()+1,$this->GetX()+195,$this->GetY()+1);
			}
		}
		
		function PreCuerpo()
		{
			$this->setFont("Arial","",7);			
			$this->ln();				
			$this->cell(13,6,$this->titulos[0]);
			$this->cell(65,6,$this->titulos[1]);
			$this->cell(60,6,$this->titulos[2]);
			$this->cell(30,6,$this->titulos[3]);
			$this->cell(15,6,$this->titulos[4]);
			$this->ln(4);
			$this->Line($this->GetX(),$this->GetY()+1,$this->GetX()+195,$this->GetY()+1);
			
		}
		
		function Cuerpo()
		{
		
			$this->setFont("Arial","",7);			
		    $tb=$this->bd->select($this->sql);
		$this->a=0;
		   // print $this->sql;
		  $this->sql3="SELECT UPPER(NOMNOM) as NOMBRE FROM NPNOMINA 
				WHERE CODNOM=LPAD('".$tb->fields["codnom"]."',3,'0');";
  			$tb3=$this->bd->select($this->sql3);
   			
   			$this->sql2="SELECT to_char(ULTFEC,'dd/mm/yyyy') as ultfec,
					 to_char(PROFEC,'dd/mm/yyyy') as profec FROM NPNOMINA 
					 WHERE CODNOM='".$tb->fields["codnom"]."';";
  			$tb2=$this->bd->select($this->sql2);
  			
   			$this->sql4=" SELECT DISTINCT(CODCAT) as CODCAT FROM NPHISCON
						  WHERE CODNOM='".$tb->fields["codnom"]."' AND 
 						  CODEMP=RPAD('".$tb->fields["idemp"]."',16,' ') AND
						  CODCAR=RPAD('".$tb->fields["codcar"]."',16,' ') AND
						  to_char(FECNOM,'dd/mm/yyyy')>='".$this->fecdes."' AND
  						  to_char(FECNOM,'dd/mm/yyyy')<='".$this->fechas."' AND
						  CODCON NOT IN (SELECT CODCAT FROM NPCONCEPTOSCATEGORIA
										 WHERE CODNOM='".$tb->fields["codnom"]."')";
  			$tb4=$this->bd->select($this->sql4);
  			//print $this->sql4;
  			$this->sql5=" SELECT NOMCAT FROM NPCATPRE WHERE CODCAT=RPAD('".$tb4->fields["codcat"]."',16,' ');";
  			$tb5=$this->bd->select($this->sql5);
  			$this->SetY(35);
  			$this->cell(50,6,$tb->fields["codban"].'   '.$tb->fields["nomban"],0,'L',0); 
  			$this->ln();	
			$this->cell(50,6,$tb->fields["codnom"].'	'.$tb3->fields["nombre"],0,'L',0); 
			$this->cell(70,6,$tb->fields["ultfec"],0,'L',0); 
			$this->cell(90,6,$tb->fields["profec"],0,'L',0); 
		    $nom=$tb->fields["codnom"];
			$this->ln();		
   			$this->cell(50,6,$tb4->fields["codcat"]."    ".$tb5->fields["nomcat"],0,'L',0); 
		   // $this->ln();
		    $this->PreCuerpo();
		     $nom=$tb->fields["codnom"];
		     $cat=$tb4->fields["codcat"];
		    $cont=0;
			$acum=0;
			while (!$tb->EOF)
			{	
				if ($tb->fields["codnom"]==$nom)
				{
				$cont=$cont+1;
				$cont2=$cont2+1;
				$cont3=$cont3+1;
				$this->cell(13,6,$tb->fields["codemp"]);
				$this->cell(65,6,$tb->fields["nomemp"]);
				$this->cell(60,6,$tb->fields["nomcar"]);
				$this->cell(30,6,$tb->fields["numcue"]);
				$acum=$acum+$tb->fields["monto"];
				$acum2=$acum2+$tb->fields["monto"];
				$acum3=$acum3+$tb->fields["monto"];
				$this->cell(15,6,number_format($tb->fields["monto"],2,'.',','),0,0,'R');
				$this->ln(4);
				$tb->MoveNext();
				}
				else
				{ 
				
					$this->Line($this->GetX(),$this->GetY()+1,$this->GetX()+195,$this->GetY()+1);
				  $this->ln(4);
				  $this->sql3="SELECT nomnom as nombre FROM NPNOMINA 
					 WHERE CODNOM='".$nom."';";
  				  $tb3=$this->bd->select($this->sql3);
				  $this->cell(13,6,"Total   ".$tb3->fields["nombre"]."   ".number_format($acum2,2,'.',','));
			//    $this->cell(13,6,);						
				$this->ln(4);
				$this->cell(13,6,"Cantidad de Trabajadores de la nomina: ".$cont2);
					
				$this->AddPage();
			  $this->PreCuerpo();
		    	$nom=$tb->fields["codnom"];
				$this->sql3="SELECT UPPER(NOMNOM) as NOMBRE FROM NPNOMINA 
				WHERE CODNOM=LPAD('".$tb->fields["codnom"]."',3,'0');";
  			$tb3=$this->bd->select($this->sql3);
   			
   			$this->sql2="SELECT to_char(ULTFEC,'dd/mm/yyyy') as ultfec,
					 to_char(PROFEC,'dd/mm/yyyy') as profec FROM NPNOMINA 
					 WHERE CODNOM='".$tb->fields["codnom"]."';";
  			$tb2=$this->bd->select($this->sql2);
  			
   			$this->sql4=" SELECT DISTINCT(CODCAT) as CODCAT FROM NPHISCON
						  WHERE CODNOM='".$tb->fields["codnom"]."' AND 
 						  CODEMP=RPAD('".$tb->fields["idemp"]."',16,' ') AND
						  CODCAR=RPAD('".$tb->fields["codcar"]."',16,' ') AND
						  to_char(FECNOM,'dd/mm/yyyy')>='".$this->fecdes."' AND
  						  to_char(FECNOM,'dd/mm/yyyy')<='".$this->fechas."' AND
						  CODCON NOT IN (SELECT CODCAT FROM NPCONCEPTOSCATEGORIA
										 WHERE CODNOM='".$tb->fields["codnom"]."')";
  			$tb4=$this->bd->select($this->sql4);
  			
  			$this->sql5=" SELECT NOMCAT FROM NPCATPRE WHERE CODCAT=RPAD('".$tb4->fields["codcat"]."',16,' ');";
  			$tb5=$this->bd->select($this->sql5);
  			$this->SetY(35);
  				$this->cell(25,6,$tb->fields["codban"].'   '.$tb->fields["nomban"],0,'L',0); 
  			$this->ln();	
			$this->cell(25,6,$tb->fields["codnom"].'	'.$tb3->fields["nombre"],0,'L',0); 
			$this->cell(90,6,$tb->fields["ultfec"],0,'L',0); 
			$this->cell(120,6,$tb->fields["profec"],0,'L',0); 
		    $nom=$tb->fields["codnom"];
			$this->ln();		
   			$this->cell(25,6,$tb4->fields["codcat"]."    ".$tb5->fields["nomcat"]);
		    	
				  $this->PreCuerpo();
				//  $nom=$tb->fields["codnom"];
				  $cont2=0;
				  $acum2=0;
				 }
				 
				  
			}
			
			
			$this->Line($this->GetX(),$this->GetY()+1,$this->GetX()+195,$this->GetY()+1);
			$this->ln(4);
				  $this->sql3="SELECT nomnom as nombre FROM NPNOMINA 
					 WHERE CODNOM='".$nom."';";
  				  $tb3=$this->bd->select($this->sql3);
				  $this->cell(13,6,"Total Nomina ".$tb3->fields["nombre"]."   ".number_format($acum2,2,'.',','));
			//    $this->cell(13,6,);						
				$this->ln(4);
				$this->cell(13,6,"Cantidad de Trabajadores de la nomina: ".$cont2);
			
		//	$this->Line($this->GetX(),$this->GetY()+1,$this->GetX()+195,$this->GetY()+1);
			$this->ln(14);

			$this->sql5="SELECT DISTINCT(NOMBAN) as nombre FROM NPBANCOS WHERE CODBAN='".$this->banco."';";
  			$tb5=$this->bd->select($this->sql5);
			//print $this->sql5;
			$this->cell(13,6,"Total Banco ".$tb5->fields["nombre"]."   ".number_format($acum,2,'.',','));
		    $this->ln(4);
			$this->cell(13,6,"Cantidad de Trabajadores Total : ".$cont);

			
			

		}
	}
?>
