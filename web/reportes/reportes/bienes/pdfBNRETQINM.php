<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	
	class pdfreporte extends fpdf
	{
		
		var $acum1=0;
		var $acum2=0;
		var $acum3=0;
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
		var $codact1;
		var $codact2;
		var $codinm1;
		var $codinm2;		
		var $feccom1;
		var $feccom2;
		var $fecreg1;
		var $fecreg2;
						
		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->codact1=$_POST["codact1"];
			$this->codact2=$_POST["codact2"];
			$this->codinm1=$_POST["codinm1"];
			$this->codinm2=$_POST["codinm2"];
			$this->feccom1=$_POST["feccom1"];
			$this->feccom2=$_POST["feccom2"];
			$this->fecreg1=$_POST["fecreg1"];
			$this->fecreg2=$_POST["fecreg2"];						
					
								
						
				$this->sql="SELECT RTRIM(A.CODUBI) as acodubi, SUBSTR(A.CODACT,1,10) as acodact, A.CODINM as acodinm, A.DESINM as adesinm,
							B.DESUBI as adesubi FROM BNREGINM A,BNUBIBIE B WHERE
							RTRIM(A.CODACT) >= RTRIM('".$this->codact1."') AND
							RTRIM(A.CODACT) <= RTRIM('".$this->codact2."') AND
							RTRIM(A.CODINM) >= RTRIM('".$this->codinm1."') AND
							RTRIM(A.CODINM) <= RTRIM('".$this->codinm2."') AND 
							A.FECCOM >= to_date('".$this->feccom1."','dd/mm/yyyy') AND A.FECCOM <= to_date('".$this->feccom2."','dd/mm/yyyy') AND
							A.FECREG >= to_date('".$this->fecreg1."','dd/mm/yyyy') AND A.FECREG <= to_date('".$this->fecreg2."','dd/mm/yyyy') AND
							RTRIM(A.CODUBI) = RTRIM(B.CODUBI) ORDER BY A.CODACT,  A.CODINM"; 	

			$this->SetAutoPageBreak(true,32);			
			
		}

		function Cuerpo()
		{
			
		    $tb=$this->bd->select($this->sql);
			$this->setFont("Arial","B",8);
			$ncampos=count($this->titulos);


			while(!$tb->EOF)
			{
	
		 		 $this->setFont("Arial","",8); 
				 $aux=$tb->fields["adesinm"];
				 $aux2=$tb->fields["adesubi"];				 
				 $this->ln();
		  	     $this->cell(20,4," ".$tb->fields["acodact"]." - ".$tb->fields["acodinm"]);
				 $this->ln();				 
				 $this->cell(20,4," ".substr($aux,0,35));
				 $this->ln();				 
				 $this->cell(20,4,"                                                   UBICACION  ");
		 		 $this->setFont("Arial","",8); 				 
				 $this->ln();				 
		  	     $this->cell(20,4," ".$tb->fields["acodubi"]." - ".substr($aux2,0,50));
				 $this->ln();
				 $this->Line(10,$this->GetY()-16,105,$this->GetY()-16);
 		  	     $this->Line(10,$this->GetY(),105,$this->GetY());
				 $this->Line(10,$this->GetY()-4,105,$this->GetY()-4);
 		  	     $this->Line(10,$this->GetY()-16,10,$this->GetY());
				 $this->Line(105,$this->GetY()-16,105,$this->GetY());
 		  	     //$this->Line(50,$this->GetY()-5,50,$this->GetY()+2);				 				 
 		  	     //$this->Line(10,$this->GetY()+2,50,$this->GetY()+2);
				 $tb->MoveNext();
				}
				
		}
		
		
	}
?>