<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	
	class pdfreporte extends fpdf
	{
		
		var $acum1=0;
		var $acum2=0;
		var $acum3=0;
		var $acum1t=0;
		var $acum2t=0;
		var $acum3t=0;						
		var $cont=0;
		var $cont1=0;				
		var $result=0;				
		var $bd;
		var $titulos;
		var $titulos2;
		var $anchos;
		var $anchos2;
		var $campos;
		var $sqla;
		var $sql1;
		var $sql2;
		var $rep;
		var $numero;
		var $cab;
		var $codempdes;
		var $codemphas;

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->codempdes=$_POST["codempdes"];
			$this->codemphas=$_POST["codemphas"];
			

 				$this->sql1= "SELECT codtippre,destippre FROM NPTIPPRE";						
		    	$tb1=$this->bd->select($this->sql1);
				

			$this->cab=new cabecera();
			$this->SetAutoPageBreak(true,32);			
			
		}


		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","B",9);

		}
		
		
				
		function Cuerpo()
		{

		$tb=$this->bd->select($this->sql1);			
		while(!$tb->EOF)
			{
		         $this->SetTextColor(0,0,128);
				 //$this->Line(10,$this->GetY(),270,$this->GetY());
				 $this->SetLineWidth(0.5);	
				 //$this->Line(10,$this->GetY()+5,270,$this->GetY()+5);
				 $this->SetLineWidth(0.2);				 				 			
				 $this->setFont("Arial","B",9);			 
				 $this->cell(30,5,"".strtoupper($tb->fields["codtippre"]));
				 $this->cell(130,5,"".strtoupper($tb->fields["destippre"]));
				 $this->setFont("Arial","B",7);
				 $this->ln();
	
				 $codtippre=$tb->fields["codtippre"];
 
 				$this->sqla="SELECT distinct(A.CODEMP)
							FROM NPHISPRE A
							where 
							A.CODEMP >= rpad('".$this->codempdes."',16,' ') AND A.CODEMP <= rpad('".$this->codemphas."',16,' ')
							AND A.CODTIPPRE='".$codtippre."'
							order by a.codemp";
				$tba=$this->bd->select($this->sqla);
				
				while (!$tba->EOF)				 
				{
				$codemp=$tba->fields["codemp"];
				
				 $this->sql2="SELECT A.CODEMP,A.CODTIPPRE as codtippredet,B.CEDEMP,B.NOMEMP,A.DESHISPRE,
				 to_char(A.FECHISPRE,'dd/mm/yyyy') as FECHISPRE,A.MONPRE, A.SALDO FROM NPHISPRE A,NPHOJINT B WHERE
				 A.CODTIPPRE='".$codtippre."' AND A.CODEMP='".$codemp."' and
				 A.CODEMP=B.CODEMP
				 ORDER BY A.FECHISPRE"; 

				$this->setFont("Arial","B",7);
				 $tb2=$this->bd->select($this->sql2);				 
 				 $this->SetTextColor(0,0,0);
				 $this->cell(25,5,"Codigo:  ".$tb2->fields["codemp"]);
				 $this->cell(25,5,"Cedula:  ".$tb2->fields["cedemp"]);
				 $this->cell(80,5,"Nombre:  ".strtoupper($tb2->fields["nomemp"]));
 				 $this->ln();
				 $this->cell(5,5,"");
				 $this->cell(25,5,"   Fecha");
				 $this->cell(97,5,"Descripción del Movimiento");
				 $this->cell(29,5,"Monto");				 
				 $this->cell(25,5,"Saldo");
				 $this->Line(15,$this->GetY()+5,30,$this->GetY()+5);
				 $this->Line(40,$this->GetY()+5,120,$this->GetY()+5);
				 
	 			 $this->Line(133,$this->GetY()+5,153,$this->GetY()+5);				 				 
				 $this->Line(163,$this->GetY()+5,182,$this->GetY()+5);
				 $this->ln();				 				 
				 				 							 

				while(!$tb2->EOF)
				{
				$this->setFont("Arial","",7);
				 $this->cell(5,5,"");
				 $this->cell(25,5,"".$tb2->fields["fechispre"]);
				 $this->cell(85,5,"".strtoupper($tb2->fields["deshispre"]));
				 $this->cell(25,5,"".number_format($tb2->fields["monpre"],2,'.',','),0,0,"R");				
				 $this->cell(30,5,"".number_format($tb2->fields["saldo"],2,'.',','),0,0,"R");								 


				$this->ln();																												
				$tb2->MoveNext();
				}											 	 

				$this->ln();
				$tba->MoveNext();
				}

 	
				 $tb->MoveNext();
		        }
				
		}
	}
?>