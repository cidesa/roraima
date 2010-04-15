<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	
	class pdfreporte extends fpdf
	{
		
		var $numorddes;
		var $bd;		
		var $numordhas;
		var $bendes;
		var $benhas;
		var $fechades;
		var $fechahas;
		var $tipcaudes;
		var $tipcauhas;
		var $codpredes;
		var $codprehas;
		var $codunides;
		var $codunihas;
		var $comodin;
						
		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->numorddes=$_POST["numorddes"];
			$this->numordhas=$_POST["numordhas"];
			$this->bendes=$_POST["bendes"];
			$this->benhas=$_POST["benhas"];
			$this->fechades=$_POST["fechades"];
			$this->fechahas=$_POST["fechahas"];
			$this->tipcaudes=$_POST["tipcaudes"];
			$this->tipcauhas=$_POST["tipcauhas"];			
			$this->codpredes=$_POST["codpredes"];
			$this->codprehas=$_POST["codprehas"];
			$this->codunides=$_POST["codunides"];			
			$this->codunihas=$_POST["codunihas"];	
			$this->comodin=$_POST["comodin"];			
			
			$this->sql="select 
					a.numord,
					a.numord2,
					a.cedrif,
					a.nomben,
					a.monord,
					a.coduni,
					b.codpre,
					b.monaju,
					c.nompre,
					d.desubi,
					e.refaju,
					e.desaju,
					to_char(e.fecaju,'dd/mm/yyyy') as fecaju
					from 
					opordpag a, 
					cpmovaju b, 
					cpdeftit c, 
					bnubica d,
					cpajuste e
					where 
					e.refaju=b.refaju and
					a.coduni = rpad(d.codubi,30,' ') and
					b.codpre= rpad(c.codpre,32,' ') and
					a.numord=e.refere and
					a.status='A' and
					e.refaju >= '".$this->numorddes."' and
					e.refaju <= '".$this->numordhas."' and
					a.cedrif >= '".$this->bendes."' and
					a.cedrif <= '".$this->benhas."' and
					e.fecaju >= to_date('".$this->fechades."','dd/mm/yyyy') and
					e.fecaju <= to_date('".$this->fechahas."','dd/mm/yyyy') and
					b.codpre>='".$this->codpredes."' and
					b.codpre<='".$this->codprehas."' and
					a.coduni>='".$this->codunides."' and
					a.coduni<='".$this->codunihas."' and
					rtrim(b.codpre) like rtrim('".$this->comodin."')
					order by a.numord,a.fecemi,a.coduni";
					
					//print $this->sql;
			$this->cab=new cabecera();			
		}


		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"1","s");
			$this->setFont("Arial","B",8);
			$this->cell(25,6,"N�mero Orden");
			$this->cell(60,6,"Beneficiario");
			$this->cell(70,6,"Concepto");
			$this->cell(20,6,"Fecha");
			$this->cell(70,6,"Unidad Origen");
			$this->cell(30,6,"Monto");			
		    $this->ln(4);
			$this->cell(25,6,"Tipo Anulaci�n");
			$this->cell(60,6," ");
			$this->cell(70,6,"Anulaci�n");
			$this->cell(20,6,"Anulaci�n");
			$this->cell(70,6," ");
			$this->cell(30,6,"Anular");			
			$this->ln(4);
			$this->line(10,$this->getY(),270,$this->getY());
   		    $this->ln();						
		}
		
			function Cuerpo()
			{			
				$tb=$this->bd->select($this->sql);				
				while(!$tb->EOF)				
				{
					$this->setFont("Arial","",8);
					$this->cell(25,6,$tb->fields["refaju"]);
					$this->cell(130,5," ");	
					$this->cell(20,5,$tb->fields["fecaju"]);	
					$this->cell(60,5,$tb->fields["desubi"]);	
					 	 $y=$this->GetY();					 
						 $this->setXY(35,$y);
						 
					$this->Multicell(55,5,trim($tb->fields["nomben"]));
						  $this->setXY(95,$y);
					
					$this->Multicell(70,5,trim($tb->fields["desaju"]));

					 $this->ln(4);
					 $this->cell(45,5,$tb->fields["codpre"]);
					 $this->cell(195,5,$tb->fields["nompre"]);
					 $this->setFont("Arial","B",8);
					 $this->line(190,$this->getY(),270,$this->getY());
					 $sum_monaju=$sum_monaju+$tb->fields["monaju"];
					 $this->cell(40,5,number_format($tb->fields["monaju"],2,'.',','),0,0,'R');
					 $this->ln(10);
					$tb->MoveNext();
				}
				$this->ln();
					$this->setFont("Arial","B",9);
				$this->line(190,$this->getY(),270,$this->getY());
				$this->ln(3);
				$this->cell(208,5,"Total .......",0,0,'R');
				$this->cell(50,5,number_format($sum_monaju,2,'.',','),0,0,'R');
			}

	}
?>