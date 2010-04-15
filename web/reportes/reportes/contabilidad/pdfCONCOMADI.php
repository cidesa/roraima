<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/Herramientas.class.php");

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
		var $fecha1;
		var $fecha2;
		var $com1;
		var $com2;
		var $estado;
		var $auxd=0;
		var $auxa=0;
		var $auxcon=0;
		var $auxmon=0;

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->fecha1=$_POST["fecha1"];
			$this->fecha2=$_POST["fecha2"];
			$this->com1=$_POST["com1"];

			$this->sql="select
						a.codcta,
						c.descta,
						ltrim(rtrim(b.descom)) as descripcion,
						a.refasi,
						a.monasi,
						a.debcre,
						a.numcomadi,
						a.numcom

					from 	contabc1 a,contabc b,contabb c

					where
						(a.numcomadi)=('".$this->com1."') and
						b.feccomadi>=to_date('".$this->fecha1."','dd/mm/yyyy') and
						b.feccomadi<=to_date('".$this->fecha2."','dd/mm/yyyy') and
						a.codcta=c.codcta and
						a.numcomadi=b.numcomadi and
						a.numcom=b.numcom";

//			H::PrintR($this->sql);exit;
			$this->llenartitulosmaestro();
			$this->cab=new cabecera();

		}
	function poner_cabecera($objeto,$rep,$configuracion,$pagina)
	{
		if($configuracion=="p")
		{
			//configuro la pagina con Orientacion Vertical
			//busco la descripcion y direccion de la empresa
			$tb3=$this->bd->select("select a.nomemp,a.diremp,a.tlfemp,a.faxemp,to_char(b.fecini,'dd/mm/yyyy') as fecini,to_char(b.feccie,'dd/mm/yyyy') as feccie  from empresa a,contaba b where a.codemp='001' and a.codemp=b.codemp");
			if(!$tb3->EOF)
			{
				$nombre=$tb3->fields["nomemp"];
				$direccion=$tb3->fields["diremp"];
				$telef=$tb3->fields["tlfemp"];
				$fax=$tb3->fields["faxemp"];
			}
			$objeto->setFont("Arial","B",8);
			//Logo de la Empresa
			$objeto->Image("../../img/logo_1.jpg",10,8,33);
			//fecha actual
			$fecha=date("d/m/Y");
			$objeto->Cell(350,10,'Fecha: '.$fecha,0,0,'C');
			$objeto->ln(5);
			//Paginas
			if($pagina=="s")
			{
				$objeto->Cell(350,10,'Pagina '.$objeto->PageNo().' de {nb}',0,0,'C');
			}
	    	//Titulo Descripcion de la Empresa
      $objeto->setFont("Arial","B",12);
      $objeto->Ln(-8);
       $tab = 45;
      $objeto->setX($tab);
      $objeto->Cell(270,10,'República Bolivariana de Venezuela',0,0,'L');
      $objeto->Ln(3);
      $objeto->setX($tab);
      $objeto->setFont("Arial","B",8);
      $objeto->Cell(270,10,'Ministerio del Poder Popular Para la Finanzas',0,0,'L');
      $objeto->Ln(3);
      $objeto->setX($tab);
      $objeto->Cell(270,10,$nombre,0,0,'L');
      $objeto->Ln(3);
      $objeto->setX($tab);
      $objeto->Cell(270,10,'',0,0,'L');
      $objeto->Ln(10);
      $objeto->setFont("Arial","B",12);
      //$objeto->setX(80);
      $objeto->Cell(180,10,$rep,0,0,'C',0);
      $objeto->ln(4);
      $objeto->setFont("Arial","B",7);
      $objeto->Cell(180,10,"desde  ".$this->fecha1."    hasta  ".$this->fecha2 ,0,0,'C',0);
      $objeto->ln(6);
      $tb1=$this->bd->select($this->sql);
	  $salir=0;
			while(!$tb1->EOF and $salir==0)
			{
				$tb0=$this->bd->select("select a.nomcue from tsdefban a,tsasoctapro b where a.numcue=b.numcue and rtrim(b.codcta)=rtrim('".$tb1->fields["codcta"]."')");
				if (trim($tb0->fields["nomcue"])<>'')
				{
					$j=$tb0->fields["nomcue"];
					$salir=1;
				}
				$tb1->MoveNext();
			}
      $objeto->Cell(180,10,"Numero:  ".$this->com1."    Fecha:  ".$this->fecha2."   Concepto:  ".$tb0->fields["nomcue"] ,0,0,'L',0);
      $objeto->ln(3);
      $objeto->Line(10,42.5,200,42.5);
		}
 else
    {
      //configuro la pagina con Orientacion Horizontal
      //busco la descripcion y direccion de la empresa
 	  $tb3=$this->bd->select("select * from a.empresa,to_char(b.fecini,'dd/mm/yyyy') as b.fecini,to_char(b.feccie,'dd/mm/yyyy') as feccie where codemp='001'");
      if(!$tb3->EOF)
      {
        $nombre=$tb3->fields["nomemp"];
        $direccion=$tb3->fields["diremp"];
        $telef=$tb3->fields["tlfemp"];
        $fax=$tb3->fields["faxemp"];
      }
      $objeto->setFont("Arial","B",8);
      //Logo de la Empresa
      $objeto->Image("../../img/logo_1.jpg",10,8,33);
      //fecha actual
      $fecha=date("d/m/Y");
      $objeto->Cell(470,10,'Fecha: '.$fecha,0,0,'C');
      $objeto->ln(5);
      //Paginas
      if($pagina=="s")
      {
        $objeto->Cell(470,10,'Pagina '.$objeto->PageNo().' de {nb}',0,0,'C');
      }
        //Titulo Descripcion de la Empresa
         $tab = 45;
      $objeto->setFont("Arial","B",12);
      $objeto->Ln(-8);
      $objeto->setX($tab);
      $objeto->Cell(270,5,'República Bolivariana de Venezuela',0,0,'L');
      $objeto->Ln(3);
      $objeto->setX($tab);
      $objeto->setFont("Arial","B",8);
      $objeto->Cell(270,5,'Ministerio del Poder Popular Para la Finanzas',0,0,'L');
      $objeto->Ln(3);
      $objeto->setX($tab);
      $objeto->Cell(270,5,$nombre,0,0,'L');
      $objeto->Ln(3);
      $objeto->setX($tab);
      $objeto->Cell(270,5,'',0,0,'L');
      $objeto->Ln(10);
      $objeto->setFont("Arial","B",12);
      $objeto->Cell(270,10,$rep,0,0,'L',0);
      $objeto->ln(10);
      $objeto->Cell(180,10,"desde  ".$this->fecha1." hasta  ".$this->fecha2 ,0,0,'C',0);
      $objeto->ln(10);
      $objeto->Line(10,35,270,35);
      }
	}


		function llenartitulosmaestro()

		{
				$i=0;
				$this->titulos[0]="CODIGO";
				$this->titulos[1]="DESCRIPCIÓN";
				$this->titulos[2]="DETALLE";
				$this->titulos[3]="DOCUMENTO";
				$this->titulos[4]="DEBITOS";
				$this->titulos[5]="CREDITOS";
				$this->cell(25,10,$this->titulos[$i]);
				$this->cell(53,10,$this->titulos[$i+1]);
				$this->cell(57,10,$this->titulos[$i+2]);
				$this->cell(20,10,$this->titulos[$i+3]);
				$this->cell(20,10,$this->titulos[$i+4]);
				$this->cell(20,10,$this->titulos[$i+5]);
			$this->SetLineWidth(0.5);
			$this->Line(10,47,200,47);
			$this->SetLineWidth(0.2);
			$this->ln(15);

		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","B",7);
		$this->llenartitulosmaestro();
		}
		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
			$this->setFont("Arial","",7);
			$ncampos=count($this->titulos);

			while(!$tb->EOF)
			{
				$this->setFont("Arial","",6);
				$this->cell(25,3,$tb->fields["codcta"]);
				$this->cell(53,3,substr($tb->fields["descta"],0,39));
				$this->cell(57,3,$tb->fields["descripcion"]);
				$this->cell(20,3,$tb->fields["refasi"]);
				$x=$this->GetX();

				if (strtoupper($tb->fields["debcre"])=='D'){
				$this->cell(15,3,number_format($tb->fields["monasi"],2,'.',','),0,0,'R');
				$this->cell(20,3,"");
				$this->auxC=$this->auxC+$tb->fields["monasi"];
				}
				if (strtoupper($tb->fields["debcre"])=='C'){
				$this->cell(15,3,"");
				$this->cell(20,3,number_format($tb->fields["monasi"],2,'.',','),0,0,'R');
			    $this->auxD=$this->auxD+$tb->fields["monasi"];
				}
				$this->auxcon=$this->auxcon + 1;
				$this->ln();
				$tb->MoveNext();
			}
				$this->ln();
				$this->Line(80,$this->GetY(),200,$this->GetY());
			    $this->setFont("Arial","B",8);
				$this->cell(20,5,"                   Total Comprobantes: ".number_format($this->auxcon,0,'.',','));
				$this->ln();
				$this->cell(155,5,"Total...:",0,0,"R");
				$this->setFont("Arial","B",7);
				$this->cell(15,5,number_format($this->auxD,2,',','.'),0,0,"R");
				$this->cell(20,5,number_format($this->auxC,2,',','.'),0,0,"R");
		}
	}
?>
