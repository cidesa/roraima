<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/funciones.php");

	class pdfreporte extends fpdf
	{

		var $bd;
		var $titulos;
		var $titulos2;
		var $anchos;
		var $anchos2;
		var $campos;
		var $sql;
		var $sql1;
		var $sql1b;
		var $sql1c;
		var $sql2;
		var $sql3;
		var $sqlb;
		var $che1;
		var $che2;
		var $hecho;
		var $revi;
		var $conta;
		var $audi;

		var $mes;
		var $ano;
		var $apro;
		var $ela;
		var $cod1;
		var $cod2;
		var $deb;
		var $cre;
		var $status;
		var $auxd=0;
		var $car;
		var $acumsalant=0;
		var $acumdeb=0;
		var $acumlib=0;
		var $acumban=0;
		var $acumlib2=0;
		var $acumban2=0;
		var $sal=0;
		var $fecha;

		function pdfreporte()
		{	//$pag= array(76,175);
			//$this->fpdf("l","mm",$pag);
			//$this->Rect(0,0,175,76);
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->che1=$_POST["che1"];
			$this->che2=$_POST["che2"];
			$this->hecho=$_POST["hecho"];
			$this->rev=$_POST["rev"];
			$this->aut=$_POST["aut"];
			$this->elab=$_POST["elab"];

	$this->sql="select a.numche as numche,
			   a.fecemi,
			   rtrim(c.nomben) as nomben,
			   a.numcue,
			   a.monche as monche,
				to_char(a.fecemi,'dd/mm/yyyy') as afecemi,
				to_char(e.fecemi,'dd/mm/yyyy') as efecemi,
				substr(to_char(a.fecemi,'dd/mm/yyyy'),7,4) as ano,
				'**'||ltrim(rtrim(to_char(a.monche,'999,999,999,999.99')))||'**' as monchestr,
				c.cedrif,
				b.nomcue,
				ltrim(rtrim(d.deslib)) as descon,
				d.numcom,
				e.numord as numord,
				e.desord,
				c.nomben, c.tipper as tipo
				from tscheemi a, tsdefban b, opbenefi c, tsmovlib d, opordpag e
				where
				rtrim(a.numcue)=rtrim(b.numcue) and rtrim(a.numche)=rtrim(d.reflib) and
				rtrim(a.numcue)=rtrim(d.numcue) and rtrim(a.cedrif)=rtrim(c.cedrif) and
				rtrim(a.numche)=rtrim(e.numche) and
				rtrim(a.numche)>=rtrim('".$this->che1."') and rtrim(a.numche)<=rtrim('".$this->che2."')
				order by rtrim(a.numche)";

			$this->cab=new cabecera();
			$this->SetTopMargin(0);
		}
		function Header()
		{
		 $this->Sety(10);
		}
		function Cuerpo()
		{
			$this->setFont("Arial","B",9);
		    $tb=$this->bd->select($this->sql);
//------------------------------------------------------------------------------------------------
			while (!$tb->EOF)
			{
//--------------- cheque---------------------------------------------------------------------------------------------------------------------//
				$this->SetFont('Arial',"B","10");
				$this->ln();
				//$this->Rect(15,10,175,76);
				$this->SetXY(195,1);
				$this->cell(20,1,$tb->fields["monchestr"],0,0,'R');
				$this->ln(6);
				$this->SetFont('Arial',"B","8");
				$this->SetXY(70,19);
				$this->cell(100,3,$tb->fields["nomben"],0,0,'');
				$this->SetXY(73,24);
				$this->multicell(140,10,montoescrito($tb->fields["monche"],$this->bd)."-----------");//MONTO CHEQUE ESCRITO
	//-------------calculo de fecha----------------------//
				$this->mes = array("00" => "","01" => "Enero","02" => "Febrero","03" => "Marzo","04" => "Abril","05" => "Mayo","06" => "Junio","07" => "Julio","08" => "Agosto","09" => "Septiembre","10" => "Octubre","11" => "Noviembre","12" => "Diciembre");
				$femes=substr($tb->fields["afecemi"],3,2);
				$me=$this->mes[$femes];
				$dia=substr($tb->fields["afecemi"],0,2);
   				$this->fecha=$dia." de ".$me;
				$this->setFont("Arial","","10");
				$this->SetXY(77,40);
				$this->cell(20,4,"Caracas      ".$this->fecha,0,0,'C');
				$this->SetXY(107,40);
				$this->cell(20,4,substr($tb->fields["ano"],2,4),0,0,'C');
				$this->ln();
				$this->SetXY(85,48);
				$this->cell(20,5,"CADUCA A LOS 60 DIAS");
				$this->SetXY(85,53);
				//$this->setFont("Arial","B",);
				$this->cell(20,5,"No endosable ");
//--------------- cheque---------------------------------------------------------------------------------------------------------------------//



//---------------------------vouche------------------------------------------------------------------------------------------------------------//
				$this->setFont("Arial","",10);
				$this->SetY(75);
				$t=strtoupper($tb->fields["descon"])."-Nro.Orden de Pago-".$tb->fields["numord"];
				$this->SetX(15);
				$this->MultiCell(193,3.5,$t,0,"J");$this->ln(6);
//				$this->SetXY(35,130);// numero de cheque
				$this->SetX(15);
				$this->cell(40,4,"Comprobante",0,0,'L');
				$this->cell(50,4,$tb->fields["numche"],0,0,'L');
				$this->ln();
				$this->SetX(15);// nombre de la cuenta
				$this->cell(40,4,"Banco",0,0,'L');
				$this->cell(50,4,strtoupper($tb->fields["nomcue"]),0,0,'L');
				$this->ln();
				$this->SetX(15);
				$this->cell(40,4,"Cuenta Numero",0,0,'L');
				$this->cell(50,4,($tb->fields["numcue"]),0,0,'L');
				$this->ln();
				$this->SetX(15);
				$this->cell(40,4,"Numero de Cheque",0,0,'L');
				$this->cell(50,4,$tb->fields["numche"],0,0,'L');
				$this->ln();
			    $this->SetX(15);
				$this->cell(40,4,"Fecha",0,0,'L');
				$this->cell(50,4,$this->fecha."   ".$tb->fields["ano"],0,0,'L');
				$this->ln();
				$this->SetX(15);
				$this->cell(40,4,"Beneficiario",0,0,'L');
				$this->cell(50,4,$tb->fields["nomben"],0,0,'L');
				$this->ln();
			    $this->SetX(15);
				$this->cell(40,4,"Descripción",0,0,'L');
				$this->cell(50,4,$tb->fields["desord"],0,0,'L');



//------------------------aqui va lo contable------------------------------------------------------------------------
		$this->sqlc="
		select
		b.desasi as descri,
		rtrim(b.debcre) as tipo,
		b.monasi as monto,
		rtrim(b.codcta) as cuenta
		from
		contabc a, contabc1 b
		where
		a.numcom=rtrim('".$tb->fields["numche"]."')
		and a.numcom=b.numcom ";

		$tbc=$this->bd->select($this->sqlc);
		$this->sety(145);
		$ad=0.00;
		$ac=0.00;
		$this->setFont("Arial","B",8);
		$this->SetX(10);
		$this->cell(40,4,"Cuenta",0,0,'L');
		$this->SetX(43);
		$this->cell(40,4,"Descripción",0,0,'L');
		$this->SetX(160);
		$this->cell(40,4,"Monto",0,0,'L');
		$this->SetX(190);
		$this->cell(40,4,"Credito",0,0,'L');
		$this->ln(8);
		while (!$tbc->EOF)
			{	$this->setFont("Arial","B",8);
				$this->SetX(7);
				$this->cell(30,4,$tbc->fields["cuenta"],0,0,'L');
				if ($tbc->fields["tipo"]=='D'){
					$this->SetX(160);
					$this->cell(15,4,number_format($tbc->fields["monto"],2,'.',','),0,0,'R');
					$ad+=$tbc->fields["monto"];
				}
				else{
					 $this->SetX(190);
				     $this->cell(15,4,number_format($tbc->fields["monto"],2,'.',','),0,0,'R');
				     $ac+=$tbc->fields["monto"];
				}
				$this->setFont("Arial","B",8);
				$this->SetX(43);
				$this->multicell(100,4,trim($tbc->fields["descri"]),0,'L');
				$tbc->MoveNext();
			}
//-----------------------------------------------------------------------------------------------------------------  //
//-------------------------totales-----------------------------------------------------------------------------------//
				$this->setFont("Courier","B",10);
				$this->SetY(228);// monto delcheque
				$this->SetX(120);
				$this->cell(15,5,"Total Comprobantes  ",0,0,'R');
				$this->SetX(160);
				$this->cell(15,5,number_format($ad,2,'.',','),0,0,'R');
				$this->SetX(192);
				$this->cell(15,5,number_format($ac,2,'.',','),0,0,'R');  			 $this->SetY(190);
				 $this->setY(250);
				 $this->setX(15);
				 $this->cell(50,5,$this->elab,0,0,'C');
				 $this->setX(90);
				 $this->cell(50,5,$this->rev,0,0,'C');
				 $this->setX(160);
				 $this->cell(50,5,$this->aut,0,0,'C');

//---------------------------voucher-------------------------------------------------------------------------------------------------------------//
				$tb->MoveNext();
				if (!$tb->EOF)
				{
					$this->AddPage();
				}
			}
		$this->bd->closed();

	}
	}
?>
