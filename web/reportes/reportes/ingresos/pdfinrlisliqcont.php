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
		var $fecregdes;
		var $fecreghas;
		var $rifcondes;
		var $rifconhas;
		var $conf;

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
			$this->fecregdes=$_POST["fecregdes"];
			$this->fecreghas=$_POST["fecreghas"];
			$this->rifcondes=trim($_POST["rifcondes"]);
			$this->rifconhas=trim($_POST["rifconhas"]);


				$this->sql="select a.refing, to_char(a.fecing,'dd/mm/yyyy') as fecing, a.rifcon, b.nomcon, a.moning, case when b.tipcon='N' then 'Natural' when b.tipcon='J' then 'Jurídico' when b.tipcon='O' then 'Oficial' end as tipcon
							from cireging a, ciconrep b
							where
							a.rifcon=b.rifcon and
							rtrim(a.rifcon) >= rtrim('".$this->rifcondes."') and
							rtrim(a.rifcon) <= rtrim('".$this->rifconhas."') and
							rtrim(a.fecing) >= rtrim('".$this->fecregdes."') and
							rtrim(a.fecing) <= rtrim('".$this->fecreghas."')
							order by a.rifcon";

			$this->llenartitulosmaestro();
			$this->llenartitulosdetalle();
			$this->cab=new cabecera();
			$this->SetAutoPageBreak(false,32);

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="RIF/CI Contribuyente";
				$this->titulos[1]="Nombre o Razon Social";
				$this->titulos[2]="Tipo";
		}

		function llenartitulosdetalle()
		{
				$this->titulos2[0]="";
				$this->titulos2[1]="Numero Liquidacion";
				$this->titulos2[2]="";
				$this->titulos2[3]="Fecha";
				$this->titulos2[4]="Monto Liquidacion";
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos[$i]);
			}
			$this->SetY($this->GetY()+10);
			for($i=0;$i<$ncampos2;$i++)
			{
				$this->cell($this->anchos2[$i],10,$this->titulos2[$i]);
			}
			$this->ln();
			$this->Line(10,55,200,55);
		}




		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
			$this->setFont("Arial","B",8);
			$ncampos=count($this->titulos);
			$acum=0;
			$ref=$tb->fields["rifcon"];
			$this->SetAutoPageBreak(false);
				 	$yy=$this->GetY();
				 	$this->cell($this->anchos[0],4,$tb->fields["rifcon"]);
				 	$this->Multicell($this->anchos[1]-2,4,$tb->fields["nomcon"]);
				 	$y2=$this->GetY();
				 	$this->SetXY($this->anchos[0]+$this->anchos[1]+10,$yy);
				 	$this->cell($this->anchos[2],4,$tb->fields["tipcon"]);
				 	$this->SetAutoPageBreak(true);
				 	$this->ln(5);
			while(!$tb->EOF)
			{
				if ($ref!=$tb->fields["rifcon"]){
					$this->setFont("Arial","B",8);
				$this->ln();
				$this->Line(140,$this->GetY(),170,$this->GetY());
				$this->SetX($this->anchos2[0]+$this->anchos2[1]+$this->anchos2[2]+10);
				$this->cell($this->anchos2[3],6,'Total Liquidacion    ',0,0,'R');
				$this->cell($this->anchos2[4],6,number_format($acum,'2','.',','),0,0,'R');

					$acum=0;
					$this->ln(10);

					$this->SetAutoPageBreak(false);
				 	$yy=$this->GetY();
				 	$this->cell($this->anchos[0],4,$tb->fields["rifcon"]);
				 	$this->Multicell($this->anchos[1]-2,4,$tb->fields["nomcon"]);
				 	$y2=$this->GetY();
				 	$this->SetXY($this->anchos[0]+$this->anchos[1]+10,$yy);
				 	$this->cell($this->anchos[2],4,$tb->fields["tipcon"]);
				 	$this->SetAutoPageBreak(true);
				 	$this->ln(5);

				}

				 $this->setFont("Arial","",8);
				 $this->cell($this->anchos2[0],4,"");
				 $this->cell($this->anchos2[1],4,$tb->fields["refing"]);
				 $this->cell($this->anchos2[2],4,$tb->fields["nrocon"]);
				 $this->cell($this->anchos2[3],4,$tb->fields["fecing"]);
				 $this->cell($this->anchos2[4],4,number_format($tb->fields["moning"],'2','.',','),0,0,'R');
				 $this->ln();
				 $acum=$acum + $tb->fields["moning"];
				$ref=$tb->fields["rifcon"];
				 $tb->MoveNext();
				 if ($this->GetY()>=220){
				 	$this->AddPage();
				 }

				}
				$this->setFont("Arial","B",8);
				$this->ln();
				$this->Line(140,$this->GetY(),170,$this->GetY());
				$this->SetX($this->anchos2[0]+$this->anchos2[1]+$this->anchos2[2]+10);
				$this->cell($this->anchos2[3],6,'Total Liquidacion    ',0,0,'R');
				$this->cell($this->anchos2[4],6,number_format($acum,'2','.',','),0,0,'R');

		}


	}
?>