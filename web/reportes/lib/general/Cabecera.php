<?
require_once("../../lib/bd/basedatosAdo.php");
require_once("../../lib/yaml/Yaml.class.php");

class Cabecera
{

  protected $bd;
  protected $config = array();

  function __construct()
  {
    $this->bd=new basedatosAdo();
  }
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // Funcion que imprime la cabecera que se desea en el reporte                                                 //
  // $objeto: es el objeto fpdf que construye la cabecera                                                       //
  // $rep: es el Titulo del Reporte                                                                             //
  // $configuracion: es la manera de como vamos a mostrar las paginas (p) si es Vertical y (l) si es Horizontal //
  // $pagina: es el valor para mostrar el numero y el total de paginas (s) las muestra y (n) no las muestra     //
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  function poner_cabecera($objeto,$rep,$configuracion,$pagina,$departamento)
  {
    if($configuracion=="p")
    {
      //configuro la pagina con Orientacion Vertical
      //busco la descripcion y direccion de la empresa
      $tb3=$this->bd->select("select * from empresa where codemp='001'");
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
      //if($pagina=="s")
      {
        //$objeto->Cell(350,10,'Pagina '.$objeto->PageNo().' de {nb}',0,0,'C');
      }
        //Titulo Descripcion de la Empresa
       $objeto->Ln(-5);
        $objeto->Cell(180,5,'República Bolivariana de Venezuela',0,0,'C');
      $objeto->Ln(3);
     //   $objeto->Cell(180,5,'Alcaldía de Chacao',0,0,'C');
      $objeto->Ln(3);
        $objeto->Cell(180,5,$nombre,0,0,'C');
      $objeto->Ln(3);
        $objeto->Cell(180,5,'',0,0,'C');
        $objeto->Ln(8);
      $objeto->Ln(-5);
        $objeto->Cell(180,5,'',0,0,'C');
      $objeto->Ln(3);
        $objeto->Cell(180,5,'',0,0,'C');
      $objeto->Ln(3);
        $objeto->Cell(180,5,'',0,0,'C');
      $objeto->Ln(3);
        $objeto->Cell(180,5,'',0,0,'C');
        $objeto->Ln(8);
      //Titulo del Reporte
      $objeto->setFont("Arial","B",12);
      $objeto->Cell(260,10,$rep,0,0,'C',0);
      $objeto->ln(10);
      //$objeto->Line(10,35,260,35);
    }
    else
    {
      //configuro la pagina con Orientacion Horizontal
      //busco la descripcion y direccion de la empresa
      $tb3=$this->bd->select("select * from empresa where codemp='001'");
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
      //$objeto->Cell(270,5,'Alcaldía de Chacao',0,0,'L');
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
      $objeto->Line(10,35,270,35);
    }

  }

  public function setConfig($c)
  {
	$this->conf = $c;
  }

  public function getCabecera($pdf,$titulo='',$departamento='')
  {
  	if(count($this->conf)==0){
  		$this->conf = $this->getConfig();
  	}

    $ori = strtolower($pdf->getOrientation());
  	$conf = $this->conf;
  	$c = $conf['cabecera'];
  	$r = $conf['reportes'];

  	//H::PrintR(strtolower($ori));

	//configuro la pagina con Orientacion Vertical
	//busco la descripcion y direccion de la empresa
	$tb3=$this->bd->select("select * from empresa where codemp='001'");
	if(!$tb3->EOF)
	{
	  $nombre=trim($tb3->fields["nomemp"]);
	  $direccion=$tb3->fields["diremp"];
	  $telef=$tb3->fields["tlfemp"];
	  $fax=$tb3->fields["faxemp"];
	}

	$pdf->setFont("Arial","B",8);
	//Logo de la Empresa
	$pdf->Image($c['logo']['img'],10,8,33);

	//fecha actual
	$fecha=date("d/m/Y");

	if($c['fecha']){
	  $pdf->Cell(350,10,'Fecha: '.$fecha,0,0,'C');
	}else{$pdf->Cell(350,10,'',0,0,'C');}
	$pdf->ln(5);

	//Paginas
	if($c['nropagina'])
	{
	  $pdf->Cell(350,10,'Pagina '.$pdf->PageNo().' de {nb}',0,0,'C');
	}else{$pdf->Cell(350,10,'',0,0,'C');}

	//Titulo Descripcion de la Empresa
	$pdf->Ln(-5);
	$tab = 50;

	$pdf->setX($c['empresa']['x'][$ori]);
	if($c['empresa']['y'][$ori]!='0') $pdf->setY($c['empresa']['y'][$ori]);
	$pdf->setFont($c['empresa']['fuente'],"B",$c['empresa']['tam']);
	$pdf->Cell(180,5,'República Bolivariana de Venezuela',0,0,$c['empresa']['pos']);

	// Detalles de la empresa
	$pdf->setFont($c['detemp']['fuente'],"B",$c['detemp']['tam']);
	$pdf->Ln(3);
	$pdf->setX($c['detemp']['x'][$ori]);
	if($c['detemp']['y'][$ori]!='0') $pdf->setY($c['detemp']['y'][$ori]);
	//$pdf->Cell(180,5,'Ministerio del Poder Popular Para las Industrias ligeras y Comercio',0,0,$c['depemp']['pos']);
	$pdf->Ln(3);
	$pdf->setX($c['detemp']['x'][$ori]);
	$pdf->Cell(180,5,$nombre,0,0,$c['depemp']['pos']);
	$pdf->Ln(3);
	$pdf->setX($c['detemp']['x'][$ori]);
	$pdf->Cell(180,5,'',0,0,$c['depemp']['pos']);
	$pdf->Ln(8);

	//Departamento
	$pdf->setFont($c['departamento']['fuente'],"B",$c['departamento']['tam']);
	$pdf->setX($c['departamento']['x'][$ori]);
	if($c['departamento']['y'][$ori]!='0') $pdf->setY($c['departamento']['y'][$ori]);
	$pdf->Cell(180,10,$departamento,0,0,$c['departamento']['pos'],0);

	//Titulo del Reporte
	$pdf->setFont($c['titulo']['fuente'],"B",$c['titulo']['tam']);
	$pdf->setX($c['titulo']['x'][$ori]);
	if($c['titulo']['y'][$ori]!='0') $pdf->setY($c['titulo']['y'][$ori]);
	$pdf->Cell(180,10,$titulo,0,0,$c['titulo']['pos'],0);
	$pdf->ln(10);
	$pdf->Line(10,35,250,35);

	$pdf->setFont($r['fuente'],"",$conf['tamletra']);
  }


  public function getConfig()
  {
  	$config = Yaml::load("../../lib/bd/config.yml");
  	if($config) return $config;
  	else array();

  }

}
?>
