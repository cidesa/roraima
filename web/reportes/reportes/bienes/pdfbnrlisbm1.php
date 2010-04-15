<?
  require_once("../../lib/general/fpdf/fpdf.php");
  require_once("../../lib/bd/basedatosAdo.php");
  require_once("../../lib/general/cabecera.php");
  require_once("../../lib/general/Herramientas.class.php");
  require_once("../../lib/modelo/sqls/bienes/Bm1.class.php");

  class pdfreporte extends fpdf
  {
    var $i = 0;

    function pdfreporte()
    {
      $this->fpdf("p","mm","Letter");
	  $this->arrp=array("no_vacio");
	  $this->cab = new cabecera();
	  $this->bd = new basedatosAdo();
      $this->ubides=H::GetPost("ubides");
      $this->ubihas=H::GetPost("ubihas");
      $this->maxaut=H::GetPost("maxaut");
      $this->jefuni=H::GetPost("jefuni");
      $this->resinv=H::GetPost("resinv");
      $this->dptest=H::GetPost("dptest");
      $this->fecha=H::GetPost("fecha");

      $this->objbm2 = new Bm1();
      $this->arrp = $this->objbm2->SQLp($this->ubides,$this->ubihas);

      $this->llenartitulosmaestro();
    }

    function Cabecerapropia($rep,$p="",$pagina)
    {
    	//configuro la pagina con Orientacion Vertical
			//busco la descripcion y direccion de la empresa
			$tb3=$this->bd->select("select * from empresa where codemp='001'");
			if(!$tb3->EOF)
			{
				$nombre=$tb3->fields["nomemp1"];
				$direccion=$tb3->fields["nomemp2"];
				$telef=$tb3->fields["nomemp3"];
				/*$fax=$tb3->fields["faxemp"];*/
			}
			$this->setFont("Arial","B",8);
			//Logo de la Empresa
			$this->Image("../../img/logo_1.jpg",11,11,21);
			//fecha actual
			$fecha=$this->fecha;
			$this->Cell(350,10,'Fecha: '.$fecha,0,0,'C');
			$this->ln(5);
			//Paginas
			if($pagina=="s")
			{
				$this->Cell(348,10,'Pagina '.$this->PageNo().' de {nb}',0,0,'C');
			}
	    	//Titulo Descripcion de la Empresa
              $this->setFont("Arial","B",6);
    		$this->Ln(-5);
              $this->SetX(31);
    		$this->Cell(180,5,$nombre,0,0,'L');

		$this->Ln(3);
              $this->SetX(31);
    		$this->Cell(180,5,$direccion,0,0,'L');

		$this->Ln(3);
              $this->SetX(31);
    		$this->Cell(180,5,$telef,0,0,'L');

    		$this->Ln(3);
              $this->SetX(31);
              //$this->setFont("Arial","B",6);
    	//	$this->Cell(180,5,"TESORERIA GENERAL DEL ESTADO",0,0,'L');

              $this->setFont("Arial","B",8);
		/*	$this->Ln(3);
    		$this->Cell(180,5,'Fax:'.$fax,0,0,'L');
    		$this->Ln(8);*/
			$this->Ln(-5);
    		$this->Cell(180,5,'',0,0,'C');
			$this->Ln(3);
    		$this->Cell(180,5,'',0,0,'C');
			$this->Ln(3);
    		$this->Cell(180,5,'',0,0,'C');
			$this->Ln(3);
    		$this->Cell(180,5,'',0,0,'C');
    		$this->Ln(5);
			//Titulo del Reporte
			$this->setFont("Arial","B",12);
			$this->Cell(180,10,$rep,0,0,'C',0);
			$this->ln(10);
			$this->Line(10,35,200,35);
			$this->setFont("Arial","",9);
    }

    function llenartitulosmaestro()
    {
    	$ancho=$this->w-$this->rMargin-$this->lMargin;
        $this->titulo[]="CLASIFICACION \nGrupo-SubGrupo-Secciones";
        $this->ancho[]=$ancho*0.15;
        $this->titulo[]="NRO. DEL BIEN.";
        $this->ancho[]=$ancho*0.06;
        $this->titulo[]="Cant.";
        $this->ancho[]=$ancho*0.06;
        $this->titulo[]="DESCRIPCION";
        $this->ancho[]=$ancho*0.40;
        $this->titulo[]="CONDICION DEL BIEN";
        $this->ancho[]=$ancho*0.11;
        $this->titulo[]="VALOR UNITARIO (Bs.F)";
        $this->ancho[]=$ancho*0.11;
        $this->titulo[]="VALOR TOTAL (Bs.F)";
        $this->ancho[]=$ancho*0.11;
    }

    function Header()
    {
      $this->cab->poner_cabecera($this,H::GetPost("titulo"),"p","s");
      $arrp = $this->objbm2->sqlestado2($this->arrp[$this->i]["codubi"]);
      $this->setFont("Arial","B",9);
     $this->MultiCell(200,5,"1.- UNIDAD PRIMARIA: ".$arrp[0]["nomunid"]);
   $this->MultiCell(200,5,"2.- UNIDAD DE TRABAJO: ".$arrp[0]["nomunit"]);
 //     $this->multicell(200,4,"ESTADO: ".$arrp[0]["nomest"]."   ".$arrp[0]["nommun"]."    ".$arrp[0]["nompar"]);
      $this->multicell(200,4,"ESTADO: MIRANDA");
      $this->MultiCell(200,5,"4.- DIRECCION O LUGAR: ".$arrp[0]["dirubi"]);
      $this->MultiCell(200,5,"5.- FECHA: ".$this->fecha);
      /*$this->MultiCell(0,5,"6.- JEFE DE LA UNIDAD: ".$this->jefuni."   7.- FECHA: ".$this->fecha);
      $parte=explode("-",$this->arrp[$this->indice]["codubi"]);
      $this->MultiCell(0,5,"8.- SECTOR: ".$parte[0]."   9.- PROGRAMA: ".$parte[0]."-".$parte[1]."    10.- UNIDAD: ".$parte[0]."-".$parte[1]."-".$parte[2]);*/
      $this->ln(2);
      $this->SetWidths($this->ancho);
      $this->SetBorder(true);
	  $this->SetAligns('C');
	  $this->RowM($this->titulo);
	  $this->SetAligns(array('C','C','C','J','R','R','R'));
    }

    function Footer()
    {
    	//$this->setxy(10,260);
    	//$this->multicell(180,4,"RESUMEN: \n N° TOTAL DE MUEBLES: $this->cont  \n MONTO TOTAL EN Bs.F:  ".H::FormatoMonto($this->totvaltot),0,'R',0);
    }

    function Cuerpo()
    {
    	$this->totvalest=0;
    	$this->totvaltot=0;
    	$this->cont=0;
    	foreach($this->arrp as $registro)
    	{
    		$this->rowm(array_slice($registro,2));
    		$this->totvalest+=H::formatonum($registro["valest"]);
    		$this->totvaltot+=H::formatonum($registro["valtot"]);
    		$this->cont++;
    		$this->i++;
    	}
    	$this->setAutoPageBreak(false);
    	$this->ln(3);
    	$this->line(10,$this->getY()+4,50,$this->getY()+4);
    	$this->line(55,$this->getY()+4,85,$this->getY()+4);
    	$this->line(90,$this->getY()+4,133,$this->getY()+4);
    	$this->line(137,$this->getY()+4,175,$this->getY()+4);
    	$Y = $this->gety();
		$this->multicell(40,4,$this->maxaut."\n Máxima Autoridad de la Dirección, Organismo o Fundación");
		$this->setXY(52,$Y);
		$this->multicell(40,4,$this->jefuni."\n Jefe de la Unidad Inventariada",0,'C');
		$this->setXY(90,$Y);
		$this->multicell(40,4,$this->resinv."\n Responsable del Levantamiento del Inventario",0,'C');
		$this->setXY(135,$Y);
		$this->multicell(40,4,$this->dptest."\n Dpto. de Bienes Estadales",0,'C');
        unset($this->objBm2);

    }
  }
?>