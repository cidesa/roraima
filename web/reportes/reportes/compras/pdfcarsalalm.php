<?
	require_once("../../lib/general/fpdf/fpdf.php");
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
	var $rep;
	var $numero;
	var $cab;
	var $numing1;
	var $numing2;
	var $rifcon1;
	var $rifcon2;
	var $fecing1;
	var $fecing2;
	var $tiping1;
	var $tiping2;
	var $codpre1;
	var $codpre2;
	var $comodin;

	function pdfreporte()
	{
	 $this->fpdf("p","mm","Letter");
	 $this->bd=new basedatosAdo();
	 $this->cab=new Cabecera();
	 $this->titulos=array();
	 $this->titulos2=array();
	 $this->campos=array();
	 $this->anchos=array();
	 $this->anchos2=array();
	 $this->codsaldes=H::GetPost("codsaldes");
	 $this->codsalhas=H::GetPost("codsalhas");
	 $this->codprodes=H::GetPost("codprodes");
	 $this->codprohas=H::GetPost("codprohas");
	 $this->codsalhas=H::GetPost("codsalhas");
	 $this->codramdes=H::GetPost("codramdes");
	 $this->codramhas=H::GetPost("codramhas");
	 $this->transcrito=H::GetPost("transcrito");
	 $this->despachado=H::GetPost("despachado");
	 $this->bultos=H::GetPost("bultos");
	 $this->revisado=H::GetPost("revisado");
	 $this->recibido=H::GetPost("recibido");



	$this->sql=" SELECT codsal,to_char(fecsal,'dd/mm/yyyy') as fecsal,dessal,codpro from casalalm where
				     (codsal>='".$this->codsaldes."' and codsal<='".$this->codsalhas."') and
					(codpro>='".$this->codprodes."' and codpro<='".$this->codprohas."') order by codsal";
	$this->arrpr=$this->bd->select($this->sql);
	//print $this->arrpr; exit;

		if ($this->arrpr)
		 {
		 	$this->arrp= $this->arrpr->GetArray();
		 }else{
		 	$this->arrp= array();
		 }






	}

	function Header()
	{
	 $this->cab->poner_cabecera($this,H::GetPost("titulo"),"p","s","n");
	 //$this->SetY(50);
	 $this->setXY(10,40);
	 $this->setFont("Arial","B",9);
	 $this->SetWidths(array(80));
	 $this->cell(40,5,"Número de Salida:  ");
	 $this->setFont("Arial","",9);
	 $this->cell(30,5,"");
	 $this->ln();
	 $this->setFont("Arial","B",9);
	 $this->cell(40,5,"Proveedor :  ");
	 $this->setFont("Arial","",9);
	 $this->cell(50,5,"");
	 $this->ln();
	 $this->setFont("Arial","B",9);
	 $this->cell(40,5,"Fecha de Salida:  ");
	 $this->setFont("Arial","",9);
	 $this->cell(50,5,"");
	 $this->ln();
	 $this->setFont("Arial","B",9);
	 $this->cell(40,5,"  ");
	 $this->setFont("Arial","",9);
	 $this->cell(50,5,"");
	 if($this->van){
	 	$this->ln();
	 	$this->SetX(150);
	 	$y1=$this->GetY();
	 	$this->setFont("Arial","B",7);
		$this->cell(25,5,"Vienen:",1,1,'C');
		$this->SetXY(175,$y1);
		$this->cell(25,5,number_format($this->total,2,'.',','),1,1,'R');
		$this->van=false;
		//$this->ln();
		$this->SetY($y1+5);
	 }else{
	 	$this->ln();
	 	$this->ln();
	 }
	 //$this->ln();
	 //$this->ln();

	 $this->setFont("Arial","B",9);
	 $this->SetWidths(array(35,130,25));
	 $this->SetBorder(true);
	 $this->Setaligns(array('C','C','C'));
	 $this->Row(array("Código","Descripción y Presentación","Cant."));
	 $this->Setaligns(array('L','L','C','C','R','R','R'));
	 $this->setFont("Arial","",7);
	}

	function Cuerpo()
	{
		$this->arrpr=$this->bd->select($this->sql);
	    $pri=true;

	while(!$this->arrpr->EOF){


			$ref1=$this->arrpr->fields["codsal"];
			$ref2=$this->arrpr->fields["codpro"];
			//$ref3=$this->arrpr->fields["ramart"];

		/*	if($ref3==' '){
				$sqlp="SELECT nompro as nombre from caprovee WHERE codpro='".$ref2."'";
			}else{
				$sqlp="SELECT nomram as nombre from caramart WHERE ramart='".$ref3."'";
			}*/

$sqlp="SELECT nompro as nombre from caprovee WHERE codpro='".$ref2."'";
			//print $sqlp; exit;
			$arrproram=$this->bd->select($sqlp);
			//print $arrproram; exit;

			$this->salida=$this->arrpr->fields["codsal"];
			$this->fecha=$this->arrpr->fields["fecsal"];
			$this->nombre=$arrproram->fields["nombre"];
			//print "1".$ref1; exit;

			$this->sqlg= "SELECT  c.codart as codart, b.desart as desart,
			formatonum(c.cantot) as cantot

			FROM caartalmubi d, cadetsal c,	caregart b , casalalm a

			WHERE (c.codsal='".$ref1."') and a.codsal=c.codsal and

			c.codart=b.codart and c.codart=d.codart and

			c.codalm=d.codalm and c.codubi=d.codubi

			 order by c.codsal,c.codart";

			$arrd=$this->bd->select($this->sqlg);
			$this->arrdet = $arrd->GetArray();
		//	print "<pre>"; print $this->sqlg;
			//print_R($this->arrdet); exit;
			//print $this->arrdet; exit;


			if (!$pri){
				$this->AddPage();
			}$pri=false;

			  $this->setFont("Arial","B",8);
            $x=$this->getx();
			$y=$this->gety();
			$this->setxy(45,40);
		    $this->cell(30,5,$this->salida);
		    $this->setxy(45,45);
		    $this->cell(30,5,$this->nombre);
		    $this->setxy(45,50);
		    $this->cell(30,5,$this->fecha);
		    $this->setxy($x,$y);
            $this->setFont("Arial","",7);

			$this->total=0;
			foreach($this->arrdet as $dat)
			{	$this->setFont("Arial","",7);
				 $this->SetWidths(array(35,130,25));
	             $this->Setaligns(array('C','C','C'));
				$this->SetBorder(true);
				//$this->cell(10,5,$this->GetY());
				$y=$this->GetY();
				if($y>=220){
					$this->van=true;
					$this->setFont("Arial","B",7);
					$this->SetX(150);
					$this->cell(25,5,"Van:",1,1,'C');
					$this->SetXY(175,$y);
					$this->cell(25,5,number_format($this->total,2,'.',','),1,1,'R');
					$this->AddPage();
					//$this->SetXY(150,50);
					//$this->cell(25,5,"Van:",1,1,'C');
					//$this->SetXY(175,50);
					//$this->cell(25,5,number_format($total,2,'.',','),1,1,'R');

				}
				$this->setFont("Arial","",7);
				$this->rowm($dat);
				//$this->rowm($dat[codsal],$dat[desart],$dat[numlot],$dat[fecven],number_format($dat[cantot],2,'.',','),number_format($dat[cosart],2,'.',','),number_format($dat[totart],2,'.',','));
				$this->total=$this->total+$dat[totart];

			}
			$this->setFont("Arial","B",7);
			$this->SetX(150);
			$y3=$this->GetY();
			$this->cell(25,5,"TOTAL INVERSION:",1,1,'C');
			$this->SetXY(175,$y3);
			$this->cell(25,5,number_format($this->total,2,'.',','),1,1,'R');
			//$this->row(array("","","","","","Total Bs.F:",number_format($this->total,2,'.',',')));

			//$this->ln();$this->ln();$this->ln();$this->ln();
			$this->SetXY(10,240);
				$this->SetWidths(array(47.5,47.5,47.5,47.5));
				$this->Setaligns(array('C','C','C','C'));
				$this->SetBorder(true);
				$this->rowm(array("Transcrito por","Despachado por:","Revisado por:","Recibido por"));
				$this->ln(1);
				$this->setJump(8);
				$this->rowm(array($this->transcrito,$this->despachado,$this->revisado,$this->recibido));




			//$this->AddPage();
			$this->arrpr->MoveNext();

	}

    }
}
?>