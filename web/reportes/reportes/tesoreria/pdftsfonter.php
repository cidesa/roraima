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
		var $sql2;
		var $sql3;
		var $rep;
		var $numero;
		var $cab;
		var $numcom;
		var $refpag;
		var $ord1;
		var $ord2;
		var $status;
		var $estado; 
		var $auxd=0;
		var $car;

				
		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->tipret=$_POST["tipret"];
			$this->status=$_POST["estatus"];


			if ($this->status=='PP')
			{
				$this->estado='NOASIGNA';
			}
			else
			{
				$this->estado='0%';
			}

			 $this->sql="select distinct(a.numord), 
						b.desord
						from 
						opretord a, 
						opordpag b
						where 
						a.numord=b.numord and
						codtip ='".$this->tipret."' and
						a.numret like '".$this->estado."'";

			
			$this->cab=new cabecera();
			
		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s",$parte[$ubica]);
			$this->setFont("Arial","B",8);
						
			$this->Rect(10,35,190,12);
			$this->SetX(15);
			$this->cell(5,5,"Numero");
			$this->SetX(50);
			$this->cell(5,5,"Concepto de la Orden");
			$this->SetX(95);
			$this->cell(5,5,"Fecha emisión");
			$this->SetX(120);
			$this->cell(5,5,"Cod. Presupuestario");
			$this->SetX(164);
			$this->cell(5,5,"Monto");
			$this->SetX(187);
			$this->cell(5,5,"O.P");
			$this->ln(3);
			$this->SetX(15);
			$this->cell(5,5,"Orden");
			$this->SetX(162);
			$this->cell(5,5,"Retenido");
			$this->SetX(183);
			$this->cell(5,5,"Asignada");
			
			$this->ln(8);
				
		}
		function Cuerpo()
		{
			
	    $tb=$this->bd->select($this->sql);		
			
		while(!$tb->EOF)
			{
				$acum=0;
				$this->setFont("Arial","",7);
				$this->SetX(14);
				$this->cell(5,5,$tb->fields["numord"]);
				
				$this->SetX(35);
			    $this->Multicell(120,3,$tb->fields["desord"]); 

				$this->ln(3);
				
        		$sql="select  
					to_char(b.FECEMI,'dd/mm/yyyy') as fecemi, 
					a.codpre, 
					a.monret, 
					(case when a.numret='NOASIGNA' then 'No Asignado' else  a.numret end) as retencion  
					from 
					opretord a, 
					opordpag b
					where 
					a.numord=b.numord and
					codtip ='".$this->tipret."' and
					a.numret like '".$this->estado."' and
					a.numord ='".$tb->fields["numord"]."'";

					$tbDet=$this->bd->select($sql);
					
					while(!$tbDet->EOF)
					{
						
						$this->SetX(95);
						$this->cell(5,5,$tbDet->fields["fecemi"]);
						
						$this->SetX(120);
						$this->cell(5,5,$tbDet->fields["codpre"]);
						
						
						$this->SetX(172);
						$this->cell(5,5,number_format($tbDet->fields["monret"],2,'.',','),0,0,'R');
		
						$this->SetX(184);
						$this->cell(5,5,$tbDet->fields["retencion"]);
		
						$acum=$acum+$tbDet->fields["monret"];
					
						$this->ln(4);
					    $tbDet->MoveNext(); 
			           }
			
						$this->ln(2);
						$this->setFont("Arial","B",8);
									
						$this->line(158,$this->GetY(),180,$this->GetY());
						$this->Setx(120);
						$this->cell(5,5,"TOTAL Bs.:");
						$this->Setx(172);
						$this->cell(5,5,number_format($acum,2,'.',','),0,0,'R');
						$this->ln(9);
						

			$tb->MoveNext(); 
			}
			
			
			
		}
	}
?>
