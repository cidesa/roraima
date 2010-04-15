<?
  require_once("../../lib/general/fpdf/fpdf.php");
  require_once("../../lib/bd/basedatosAdo.php");
  require_once("../../lib/general/Cabecera.php");
  require_once("../../lib/general/Herramientas.class.php");
  require_once("../../lib/modelo/sqls/bienes/Bm3.class.php");

  class pdfreporte extends fpdf
  {
    var $indice = 0;

    function pdfreporte()
    {
      $this->fpdf("l","mm","Letter");

	  $this->arrp=array("no_vacio");
	  $this->cab = new cabecera();
      $this->ubiorides=H::GetPost("ubiorides");
      $this->ubiorihas=H::GetPost("ubiorihas");
      $this->codactmin=H::GetPost("codactmin");
      $this->codactmax=H::GetPost("codactmax");
      $this->codmuemin=H::GetPost("codmuemin");
      $this->codmuemax=H::GetPost("codmuemax");
      $this->coddisdes=H::GetPost("coddisdes");
      $this->coddishas=H::GetPost("coddishas");
      $this->nrodismuemin=H::GetPost("nrodismuemin");
      $this->nrodismuemax=H::GetPost("nrodismuemax");
      $this->fecdes=H::GetPost("fecdes");
      $this->fechas=H::GetPost("fechas");
      $this->mun=H::GetPost("mun");
      $this->par=H::GetPost("par");
      $this->dirlug=H::GetPost("dirlug");
      $this->jefuni=H::GetPost("jefuni");
      $this->elab=H::GetPost("elab");
	  $this->prepardes = H::GetPost("prepardes");
      $this->preparhas = H::GetPost("preparhas");
	  $this->confordes = H::GetPost("confordes");
	  $this->conforhas = H::GetPost("conforhas");
      $this->aprobades = H::GetPost("aprobades");
	  $this->aprobahas = H::GetPost("aprobahas");

      $this->objBm3 = new Bm3();
      $this->arrp = $this->objBm3->sqlp($this->ubiorides,$this->ubiorihas,$this->fecdes,$this->fechas,$this->codactmin,$this->codactmax, $this->codmuemin, $this->codmuemax,$this->coddisdes,$this->coddishas,$this->nrodismuemin,$this->nrodismuemax);
      $this->llenartitulosmaestro();
      $this->SetWidths($this->ancho);
    }

    function llenartitulosmaestro()
    {
    	$ancho=$this->w-$this->rMargin-$this->lMargin;
        $this->titulo[]="CLASIFICACION";
        $this->ancho[]=$ancho*0.15;
        $this->titulo[]="CONCEPTO DE MOVIMIENTO";
        $this->ancho[]=$ancho*0.15;
        $this->titulo[]="CANT";
        $this->ancho[]=20;
        $this->titulo[]="NUMERO DE BIEN MUNICIPAL ";
        $this->ancho[]=$ancho*0.15;
        $this->titulo[]="NOMBRE y DESCRIPCION DE LOS BIENES";
        $this->ancho[]=$ancho*0.25;
        $this->titulo[]="CODIGO";
        $this->ancho[]=$ancho*0.15;
        $this->titulo[]="INCORPORACION";
        $this->ancho[]=$ancho*0.15;
        $this->titulo[]="DESINCORPORACION";
        $this->ancho[]=$ancho*0.15;
    }
function Footer()
		{
			 $this->sety(177);
			$this->Line(10,$this->GetY(),270,$this->GetY());
			$this->Line(10,$this->GetY(),10,$this->GetY()+25);
			$this->Line(100,$this->GetY(),100,$this->GetY()+25);
			$this->Line(180,$this->GetY(),180,$this->GetY()+25);
			$this->Line(270,$this->GetY(),270,$this->GetY()+25);
			$this->SetTextColor(150,0,0);
			$this->setFont("Arial","",11);
			$this->cell(90,5,"Responsable de los Bienes Muebles");
			$this->cell(80,5,"Firma y Sello del jefe de la unidad de trabajo");
			$this->cell(90,5,"Registrador de Bienes");
			$this->ln();
			$this->SetTextColor(0,0,0);
			$this->setFont("Arial","",10);
			$this->cell(90,5,"Nombre:     ".$this->prepardes);
			$this->cell(80,5,$this->confordes,0,0,'L');
			$this->cell(90,5,$this->aprobades,0,0,'L');
			$this->ln();
			$this->Line(10,$this->GetY(),270,$this->GetY());
			$this->cell(90,7,"Cargo:      ".$this->preparhas);
			$this->cell(80,7,$this->conforhas,0,0,'L');
			$this->cell(90,7,$this->aprobahas,0,0,'L');
			$this->ln();
			$this->Line(10,$this->GetY(),270,$this->GetY());
			$this->cell(0,8,"Firma:");
			$this->ln();
			$this->Line(10,$this->GetY(),270,$this->GetY());
		}

    function Header()
    {
      $this->SetXY(150,10);
	  $this->Cell(120,5,'FORMULARIO BM-II',0,0,'R');
	  $this->ln();
      $this->getCabecera(H::GetPost("titulo"));
      $this->setFont("Arial","B",8);
      $this->setFont("Arial","B",9);
      $arrp1 = $this->objBm3->sqldatos();
      $this->setFont("Arial","",8);
      $this->ln();
		      $this->MultiCell(200,2,"1.- ESTADO: ".$arrp1[0]["edoins"]);$this->ln();
		      $this->MultiCell(200,2,"2.- MUNICIPIO: ".$arrp1[0]["munins"]);$this->ln();
			  $this->MultiCell(200,2,"3.- PARROQUIA: ".$arrp1[0]["paqins"]);$this->ln();
			  $this->MultiCell(200,2,"4.- DIRECCION O LUGAR: ".$arrp1[0]["dirins"]);$this->ln();
		      $this->MultiCell(200,2,"5.- DEPENDENCIA O UNIDAD PRIMARIA: ".$arrp1[0]["nomins"]);$this->ln();
		      $this->MultiCell(200,2,"6.- SERVICIO: ");$this->ln();
		      $this->MultiCell(200,2,"7.- UNIDAD DE TRABAJO O DEPENDENCIA: ");$this->ln();
		      $this->MultiCell(200,2,"8.- PERIODO DE LA CUENTA: ".H::ObtenerMesenLetras(substr(date('d/m/Y'),3,2))." ".substr(date('d/m/Y'),6,4));$this->ln();
			  $this->setFont("Arial","",8);
	  $this->ln();
	  $this->setFont("Arial","B",8);
      $this->cell(250,5,"TIPO DE ELEMENTO, ACCESORIO Y BIENES",0,0,"C");
      $this->ln();
      $this->cell(250,5,"Desde:  ".$this->fecdes."  Hasta:  ".$this->fechas,0,0,"R");
      $this->ln();
      $this->setFont("Arial","B",8);
      $this->SetWidths(array(30,40,15,20,60,15,40,40));
      $this->SetBorder(true);
	  $this->SetAligns(array('C','C','C','C','C','C','C','C'));
	  $this->RowM($this->titulo);
    }

    function Cuerpo()
    {
    	$ref=$this->arrp[$this->indice]["codubiori"];
    	$this->totalinc=0;
    	$this->totaldes=0;
    		$acodubi="";
    		$bdesubi="";
			$dirubi2="";
    	foreach($this->arrp as $registro)
    	{
    		if ($acodubi!=$registro["codubiori"])
				{
					$this->SetTextColor(0,0,0);
					if ($acodubi)   //Fin de la linea del tipo del Mueble
					{
						 $this->AddPage();
					}


					$this->arrp2=$this->objBm3->sqlp2($registro["codubiori"]);
				 	foreach($this->arrp2 as $arrp2){
				 		//DESUBI
				 		 $desubi=$arrp2["desubi"];
                         $dirubi2= $arrp2["dirubi"];
				 	}
				 			 $acodubi    = $registro["codubiori"];
				 	     $this->SetTextColor(0,0,0);
						 $yp=$this->GetY();
						 $xp=$this->GetX();
						 $this->SetXY(70,69.5);
						 $this->setFont("Arial","",8);
		    			 $this->Cell(120,5,$desubi,0,0,'L');
		    		     $this->SetXY(95,58);
						 $this->setFont("Arial","",8);
		    			// $this->Cell(120,5,$dirubi2,0,0,'L');
		    			 $this->SetXY($xp,$yp);

				}
    		$this->SetWidths(array(30,40,15,20,60,15,40,40));
      		$this->SetBorder(true);
	  		$this->SetAligns(array('C','L','C','C','L','C','R','R'));
    		$this->RowM(array($registro["codact"],$registro["desdis"],"1",$registro["codmue"],$registro["desmue"],$registro["tip"],H::FormatoMonto($registro["incorp"]),H::FormatoMonto($registro["desinc"])));
	  		$this->indice++;
	  		$this->totalinc=$this->totalinc+$registro["incorp"];
	  		$this->totaldes=$this->totaldes+$registro["desinc"];



    		if($this->getY()>=170)
    		{
    			$this->AddPage();
    			 $yp=$this->GetY();
						 $xp=$this->GetX();
						 $this->SetXY(65,61.5);
						 $this->setFont("Arial","",8);
		    			 $this->Cell(120,5,$desubi,0,0,'L');
		    		     $this->SetXY(95,58);
						 $this->setFont("Arial","",8);
		    			 $this->Cell(120,5,$dirubi2,0,0,'L');
		    			 $this->SetXY($xp,$yp);
    		}
    	}
    	$this->ln(1);
    	$this->setFont("Arial","B",9);
    	$this->cell(180,5,"TOTAL INCORPORACIÓN",0,0,"R");
    	$this->cell(40,5,H::FormatoMonto($this->totalinc),0,0,"R");
    	$this->ln();
    	$this->cell(180,5,"TOTAL DESINCORPORACIÓN",0,0,"R");
    	$this->cell(40,5,"");
    	$this->cell(40,5,H::FormatoMonto($this->totaldes),0,0,"R");


    }
  }
?>