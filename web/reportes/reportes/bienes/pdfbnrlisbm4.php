<?
  require_once("../../lib/general/fpdf/fpdf.php");
  require_once("../../lib/bd/basedatosAdo.php");
  require_once("../../lib/general/Cabecera.php");
  require_once("../../lib/general/Herramientas.class.php");
  require_once("../../lib/modelo/sqls/bienes/Bm4.class.php");

  class pdfreporte extends fpdf
  {
    var $codpredes = '';
    var $codprehas = '';

    function pdfreporte()
    {
      $this->fpdf("l","mm","Letter");

	$this->arrp=array("no_vacio");
	      $this->cab = new cabecera();
      $this->codpredes=H::GetPost("codpredes");
      $this->codprehas=H::GetPost("codprehas");
      $this->muni=H::GetPost("mun");
      $this->parr=H::GetPost("par");
      $this->dirlug=H::GetPost("dirlug");
   $this->jefuni=H::GetPost("jefuni");
      $this->elab=H::GetPost("elab");

      $this->objBm4 = new Bm4();

#     $this->cpdeftit = new Cpdeftit();
#     $this->arrp = $this->cpdeftit->sqlp($this->codpredes,$this->codprehas);
	  $this->arrp=array("no vacio");
      $this->llenartitulosmaestro();
      $this->SetWidths($this->ancho);
    }

    function llenartitulosmaestro()
    {
    	$ancho=$this->w-$this->rMargin-$this->lMargin;
        $this->titulo[]="Sector";
        $this->ancho[]=$ancho*0.05;
        $this->titulo[]="Programa";
        $this->ancho[]=$ancho*0.07;
        $this->titulo[]="Unidad";
        $this->ancho[]=$ancho*0.05;
        $this->titulo[]="Clasif. Bines.";
        $this->ancho[]=$ancho*0.1;
        $this->titulo[]="No. de Inventario";
        $this->ancho[]=$ancho*0.1;
        $this->titulo[]="Nombre y Descripción de los Elementos";
        $this->ancho[]=$ancho*0.25;
        $this->titulo[]="Existencia Física";
        $this->ancho[]=$ancho*0.1;
        $this->titulo[]="Registro Contable";
        $this->ancho[]=$ancho*0.1;
        $this->titulo[]="Unidad Física Faltante";
        $this->ancho[]=$ancho*0.08;
        $this->titulo[]="Valores";
        $this->ancho[]=$ancho*0.1;
        //$this->ancho=array_pad(array(),count($this->titulo),$ancho/count($this->titulo));
    }

    function Header()
    {
      $this->getCabecera(H::GetPost("titulo"));
      $this->setFont("Arial","B",9);
      $this->ln();
      //$arrp = $this->objbm4->sqlestado($this->arrp[$this->i]["codubi"]);
      $arrp1 = $this->objBm4->sqldatos();
      $this->setFont("Arial","",8);
      $this->MultiCell(200,5,"1.- ESTADO: ".$arrp1[0]["edoins"]);
      $this->MultiCell(200,5,"2.- MUNICIPIO: ".$arrp1[0]["munins"]);
	  $this->MultiCell(200,5,"3.- PARROQUIA: ".$arrp1[0]["paqins"]);
	  $this->MultiCell(200,5,"4.- DIRECCION O LUGAR: ".$arrp1[0]["dirins"]);
      $this->MultiCell(200,5,"5.- DEPENDENCIA O UNIDAD PRIMARIA: ");
      $this->MultiCell(200,5,"6.- SERVICIO: ");
      $this->MultiCell(200,5,"7.- UNIDAD DE TRABAJO O DEPENDENCIA: ".$arrp1[0]["nomins"]);
      $this->MultiCell(200,5,"8.- PERIODO DE LA CUENTA: ".H::ObtenerMesenLetras(substr(date('d/m/Y'),3,2))." ".substr(date('d/m/Y'),6,4));
	  $this->ln();
      $this->setFont("Arial","",9);
      $this->SetWidths($this->ancho);
      $this->SetBorder('lrb');
	  $this->SetAligns('C');
	  eval('$anchoprimer='.implode("+",array_slice($this->ancho,0,5)).';');
	  eval('$anchosegund='.implode("+",array_slice($this->ancho,6,2)).';');
	  $this->Cell($anchoprimer,5,"CODIGO",'BTLR',0,'C');
	  $this->Cell($this->ancho[5],5,"",'TLR',0,'C');
	  $this->Cell($anchosegund,5,"CANTIDAD",'BTLR',0,'C');
	  $this->Cell($this->ancho[8],5,"",'TLR',0,'C');
	  $this->Cell($this->ancho[9],5,"",'TLR',0,'C');
	  $this->ln(5);
	  $this->RowM($this->titulo);
#	  $this->Rect(50,50,50,50,1);
    }
    function footer(){
    	   $this->sety(170);
			$this->SetWidths(array(130,130));
			$this->SetAligns(array("C","C"));
			$this->SetBorder(1);
			$this->ln();
			$this->Row(array("ELABORADO","Jefe"));
			// $this->ln();
			$this->setJump(8);
			$this->Row(array($this->elab, $this->jefuni));
			$this->setJump(2);
			$this->setFont("Arial","B",7);
			$this->Row(array("",""));
    }

    function Cuerpo()
    {
#        unset($this->cpdeftit);
    }
  }
?>