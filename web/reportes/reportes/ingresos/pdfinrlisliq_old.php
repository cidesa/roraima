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
		var $numdecdes;
		var $numdechas;
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
			$this->numdecdes=$_POST["numdecdes"];
			$this->numdechas=$_POST["numdechas"];
			$this->fecregdes=$_POST["fecregdes"];
			$this->fecreghas=$_POST["fecreghas"];
			$this->rifcondes=$_POST["rifcondes"];
			$this->rifconhas=$_POST["rifconhas"];
			$this->sql="select a.refing, to_char(a.fecing,'dd/mm/yyyy') as fecing, a.rifcon, a.moning, b.nomcon
					from cireging a, ciconrep b
					where
					trim(a.rifcon) >= trim('".$this->rifcondes."') and
					trim(a.rifcon) <= trim('".$this->rifconhas."') and
					trim(a.refing) >= trim('".$this->numdecdes."') and
					trim(a.refing) <= trim('".$this->numdechas."') and
					a.fecing >= to_date('".$this->fecregdes."','dd/mm/yyyy') and
  					a.fecing <= to_date('".$this->fecreghas."','dd/mm/yyyy') and a.rifcon=b.rifcon
					order by a.refing";
			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			$this->SetAutoPageBreak(false,32);

		}
	function llenartitulosmaestro()
	{
	 $this->titulos[0]="Número Liquidación";
	 $this->titulos[1]="Fecha";
	 $this->titulos[2]="RIF/CI Contribuyente";
	 $this->titulos[3]="Nombre o Razón Social";
	 $this->titulos[4]="Monto Liquidación";
	}

	function Header()
	{
	 $this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
	 $this->setFont("Arial","B",9);
	 $ncampos=count($this->titulos);
	 for($i=0;$i<5;$i++)
	 {
		$this->cell($this->anchos[$i],10,$this->titulos[$i]);
	 }
	 $this->ln();
	 $this->Line(10,45,200,45);
	}

	function Cuerpo()
	{

    $tb=$this->bd->select($this->sql);
	$this->setFont("Arial","B",8);
	$ncampos=count($this->titulos);
	$acum=0;
	while(!$tb->EOF)
	{

		$this->setFont("Arial","",8);
		 $this->SetAutoPageBreak(false);
		 $yy=$this->GetY();
		 $this->cell($this->anchos[0],4,$tb->fields["refing"]);
		 $this->cell($this->anchos[1],4,$tb->fields["fecing"]);
		 $this->cell($this->anchos[2],4,$tb->fields["rifcon"]);
		 $this->Multicell($this->anchos[3]-2,4,$tb->fields["nomcon"]);
		 $y2=$this->GetY();
		 $this->SetXY($this->anchos[0]+$this->anchos[1]+$this->anchos[2]+$this->anchos[3]+10,$yy);
		 $this->cell($this->anchos[4]+20,4,number_format($tb->fields["moning"],'2','.',','),0,0,'R');
		 $this->SetAutoPageBreak(true);
		 $this->SetY($y2+5);
		 $acum=$acum + $tb->fields["moning"];

		 $tb->MoveNext();
		 if ($this->GetY()>=220){
		 	$this->AddPage();
		 }
		}
		$this->ln(10);
		$this->Line(170,$this->GetY(),200,$this->GetY());
		$this->SetX($this->anchos[0]+$this->anchos[1]+$this->anchos[2]+10);
		$this->cell($this->anchos[3],6,'Total Liquidación        ',0,0,'R');
		$this->cell($this->anchos[4]+30,6,number_format($acum,'2','.',','),0,0,'R');
	}


	}
?>