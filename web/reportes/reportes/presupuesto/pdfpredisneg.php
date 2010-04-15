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
		var $codigo1;
		var $codigo2;
		var $periodo1;
		var $periodo2;
		var $comodin;
				
		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->codigo1=$_POST["codigo1"];
			$this->codigo2=$_POST["codigo2"];
			$this->periodo1=$_POST["periodo1"];
			$this->periodo2=$_POST["periodo2"];
			$this->comodin=$_POST["comodin"];
			$this->sql="SELECT DISTINCT(CodPre) as  codpre, 
						RTRIM(nompre) as nompre,
						Mondis as  mondis
						FROM 
						CPASIINI 
						WHERE  
						MONDIS < 0  AND
						CODPRE>= RPAD('".$this->codigo1."',32,' ') AND
						CODPRE<= RPAD('".$this->codigo2."',32,' ') AND
						PERPRE>='".$this->periodo1."' AND
						PERPRE<='".$this->periodo2."' AND
						CODPRE LIKE RTRIM('".$this->comodin."')
						ORDER BY CODPRE";
						
			$this->llenartitulosmaestro();
			$this->SetAutoPageBreak(true,20);		
		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Codigo Presupuestario";
				$this->titulos[1]="            Descripcion";
				$this->titulos[2]="           Disponibilidad";
				$this->anchos[0]=50;  
				$this->anchos[1]=103;
				$this->anchos[2]=35;				

		}

		function Header()
		{
			$mascara="PR-AC-PAR-GE-ES-SE";
			$sql="Select obtener_mascara() as mascara";
			$mytb=$this->bd->select($sql);
			if (!$mytb->EOF){$mascara=$mytb->fields["mascara"];}
			
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->SetDrawColor(255,255,255);
			$this->Line(10,35,270,35);
			$this->SetDrawColor(0,0,0);
			$this->SetTextColor(0,0,128);
			$this->setFont("Arial","B",9);
			$this->cell(73,5,"");
			$this->cell(30,5,"Periodo : ".$this->periodo1."    Al     ".$this->periodo2);
			$this->Line(10,43,200,43);
			$this->ln(8);
			$this->cell(90,5,$mascara);
			$this->ln(3);
			$this->SetTextColor(135,0,0);
			$ncampos=count($this->titulos);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos[$i]);
			}
			$this->ln(10); 
			$this->Line(10,$this->GetY(),200,$this->GetY());
		}
		function Cuerpo()
		{
			$this->setFont("Arial","B",8);
		    $tb=$this->bd->select($this->sql);
			$ref="";
			while(!$tb->EOF)
			{ 
				$mondis=-1*$tb->fields["mondis"];
				$this->setFont("Arial","",8); 
				$this->cell($this->anchos[0],4,$tb->fields["codpre"]);
				$x=$this->GetX();
				$this->cell($this->anchos[1]);
				$this->cell($this->anchos[2],4,"(".number_format($mondis,2,'.',',').")",0,0,'R');
				$this->SetX($x);
				$this->Multicell($this->anchos[1],4,$tb->fields["nompre"]);				
				$tb->MoveNext();
				$AcuMonDis=$AcuMonDis + $mondis;
			    $this->ln();
			}	
			$this->setFont("Arial","B",8);
			$this->ln(4);			
			$this->Line(169,$this->GetY(),200,$this->GetY());
			$this->ln(1);			
			$this->cell($this->anchos[0] + $this->anchos[1],10,"");
			$this->cell($this->anchos[2],10,"(".number_format($AcuMonDis,2,'.',',').")",0,0,'R');
			$this->ln(5);
		}
	}
?>