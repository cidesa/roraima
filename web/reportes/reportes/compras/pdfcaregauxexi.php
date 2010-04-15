<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/Cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/modelo/sqls/compras/Caregauxexi.class.php");

	class pdfreporte extends fpdf
	{
		var $iddes = '';
		var $idhas = '';

		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->codartdes=H::GetPost("codartdes");
			$this->codarthas=H::GetPost("codarthas");
			$this->fecdes=H::GetPost("fecdes");
			$this->fechas=H::GetPost("fechas");
			$this->almdes=H::GetPost("almdes");
			$this->almhas=H::GetPost("almhas");
			$this->caregauxexi= new Caregauxexi();
			$this->llenarTitulosAnchos();
			$this->SetAutoPageBreak(true,25);

		    $this->arrp = $this->caregauxexi->sqlp($this->almdes,$this->almhas);
		    //$this->reg=count($this->arrp);


		}

		function llenarTitulosAnchos()
		{
			$this->titulos[0]="Unidad Administradora";      $this->anchos[0] = 260;
			$this->titulos[1]="Almacen";      $this->anchos[1] = 260;
			$this->titulos[2]="Responsable:";     $this->anchos[2] = 50;
			$this->titulos[3]="Nombre y Apellido:";      $this->anchos[3] = 150;
			$this->titulos[4]="C.I:";      $this->anchos[4] = 50;
			$this->titulos[5]="Fecha";     $this->anchos[5] = 20;
			$this->titulos[6]="Catálogo";      $this->anchos[6] = 60;
			$this->titulos[7]="Tipo de Movimiento";      $this->anchos[7] = 45;
			$this->titulos[8]="Entradas";     $this->anchos[8] = 45;
			//$this->titulos[9]="Modalidad";      $this->anchos[9] = 90;
			$this->titulos[10]="Salidas";      $this->anchos[10] = 45;
			$this->titulos[11]="Existencias";      $this->anchos[11] = 45;
			$this->titulos[12]="Código";     $this->anchos[12] = 17;
			$this->titulos[13]="Denominación";      $this->anchos[13] = 30;
			$this->titulos[14]="Unidad de Medida";      $this->anchos[14] = 13;
			$this->titulos[15]="Código";     $this->anchos[15] = 15;
			$this->titulos[16]="Concepto";      $this->anchos[16] = 30;
			$this->titulos[17]="Cantidad";      $this->anchos[17] = 15;
			$this->titulos[18]="Valor Unitario";     $this->anchos[18] = 15;
			$this->titulos[19]="Valor Total";      $this->anchos[19] = 15;
			$this->titulos[20]="Cantidad";      $this->anchos[20] = 15;
			$this->titulos[21]="Valor Unitario";     $this->anchos[21] = 15;
			$this->titulos[22]="Valor Total";      $this->anchos[22] = 15;
			$this->titulos[23]="Cantidad";      $this->anchos[23] = 15;
			$this->titulos[24]="Valor Unitario";     $this->anchos[24] = 15;
			$this->titulos[25]="Valor Total";      $this->anchos[25] = 15;


		}


		function Header()
		{
			$this->getCabecera(H::GetPost("titulo"),"");
			$this->setFont("Arial","B",9);
				//Título Unidad Administradora
    			$this->setFont("Arial","B",10);
			    $this->SetWidths(array($this->anchos[0]));
				$this->SetAligns(array("C"));
			    $this->SetBorder(1);
				$this->Row(array($this->titulos[0]));
				$this->SetFillTable(0);
				$this->SetBorder(0);
				//Titulos Almacen
				$this->setFont("Arial","B",10);
			    $this->SetWidths(array($this->anchos[1]));
				$this->SetAligns(array("C"));
			    $this->SetBorder("TL");
				$this->Row(array(""));
				$this->SetBorder(0);
				//Detalles Responsable, Nombre y Apellido, CI
				$this->setFont("Arial","",8);
			    $this->SetWidths(array($this->anchos[2], $this->anchos[3], $this->anchos[4]));
				$this->SetAligns(array("L","L","L"));
				//$this->SetBorder("TLR");
				$this->Row(array($this->titulos[2], $this->titulos[3],$this->titulos[4]));
				$this->SetBorder(0);
				$this->rect(10,49,20,12);
				$this->setXY(10,53);
				$this->cell(20,3,"Fecha",0,0,'C');
				//Titulos Catalogo,Tipo Movimiento,Entradas,Salidas,Existencias
				$this->setFont("Arial","B",8);
			    $this->SetWidths(array($this->anchos[6], $this->anchos[7],$this->anchos[8],$this->anchos[10],$this->anchos[11]));
				$this->SetAligns(array("C","C","C","C","C"));
			    $this->SetBorder("TLR");
			    $this->setXY(30,49);
				$this->Row(array($this->titulos[6], $this->titulos[7],$this->titulos[8],$this->titulos[10],$this->titulos[11]));
				$this->SetBorder(0);
				//Titulos Código,Tipo Movimiento,Entradas,Salidas,Existencias
				$this->setFont("Arial","B",6);
			    $this->SetWidths(array($this->anchos[12], $this->anchos[13],$this->anchos[14],$this->anchos[15],$this->anchos[16],$this->anchos[17], $this->anchos[18],$this->anchos[19],$this->anchos[20],$this->anchos[21],$this->anchos[22], $this->anchos[23],$this->anchos[24],$this->anchos[25]));
				$this->SetAligns(array("C","C","C","C","C","C","C","C","C","C","C","C","C","C"));
			    $this->SetBorder("TLR");
			    $this->setX(30);
				$this->Row(array($this->titulos[12], $this->titulos[13],$this->titulos[14],$this->titulos[15],$this->titulos[16],$this->titulos[17], $this->titulos[18],$this->titulos[19],$this->titulos[20],$this->titulos[21],$this->titulos[22], $this->titulos[23],$this->titulos[24],$this->titulos[25]));
				$this->SetBorder(0);
				$this->Line(10,45,10,50);
				$this->Line(270,45,270,50);

		}


		function Cuerpo()
		{
				$almacen="";
				$reg=1;
				$registro=count($this->arrp);
				foreach ($this->arrp as $datalm){

				$reg++;
				$alm=$datalm["codalm"];

				//Detalle de Entradas
				$this->arrent = $this->caregauxexi->sqlentradas($this->codartdes,$this->codarthas,$this->fecdes,$this->fechas,$alm);
				foreach ($this->arrent as $datent){
				$this->setFont("Arial","",6);
			    $this->SetWidths(array($this->anchos[5],$this->anchos[12], $this->anchos[13],$this->anchos[14],$this->anchos[15],$this->anchos[16],$this->anchos[17], $this->anchos[18],$this->anchos[19],$this->anchos[20],$this->anchos[21],$this->anchos[22], $this->anchos[23],$this->anchos[24],$this->anchos[25]));
				$this->SetAligns(array("C","C","C","C","C","C","C","R","R","C","R","R","C","R","R"));
			    $this->SetBorder(1);
			    $this->setX(10);
				$this->Row(array($datent["fecha"],$datent["codigo"],$datent["descod"],$datent["unimed"],$datent["tipmov"],$datent["desmov"],number_format($datent["cantidad"],0,"",""),H::FormatoMonto($datent["costo"]),H::FormatoMonto($datent["montot"]),"","","",number_format($datent["existencia"],0,"",""),H::FormatoMonto($datent["cospro"]),H::FormatoMonto($datent["existencia"]*$datent["cospro"])));
				$this->SetBorder(0);

				}

				//Detalle de Recepciones
				$this->arrrec = $this->caregauxexi->sqlrecepcion($this->codartdes,$this->codarthas,$this->fecdes,$this->fechas,$alm);
				foreach ($this->arrrec as $datrec){
				$this->setFont("Arial","",6);
			    $this->SetWidths(array($this->anchos[5],$this->anchos[12], $this->anchos[13],$this->anchos[14],$this->anchos[15],$this->anchos[16],$this->anchos[17], $this->anchos[18],$this->anchos[19],$this->anchos[20],$this->anchos[21],$this->anchos[22], $this->anchos[23],$this->anchos[24],$this->anchos[25]));
				$this->SetAligns(array("C","C","C","C","C","C","C","R","R","C","R","R","C","R","R"));
			    $this->SetBorder(1);
			    $this->setX(10);
				$this->Row(array($datrec["fecha"],$datrec["codigo"],$datrec["descod"],$datrec["unimed"],"","Recepción",number_format($datrec["cantidad"],0,"",""),H::FormatoMonto($datrec["costo"]),H::FormatoMonto($datrec["montot"]),"","","",number_format($datrec["existencia"],0,"",""),H::FormatoMonto($datrec["costo"]),H::FormatoMonto($datrec["existencia"]*$datrec["costo"])));
				$this->SetBorder(0);
				}

				//Detalle de Salidas
				$this->arrsal = $this->caregauxexi->sqlsalidas($this->codartdes,$this->codarthas,$this->fecdes,$this->fechas,$alm);
				foreach ($this->arrsal as $datsal){
				$this->setFont("Arial","",6);
			    $this->SetWidths(array($this->anchos[5],$this->anchos[12], $this->anchos[13],$this->anchos[14],$this->anchos[15],$this->anchos[16],$this->anchos[17], $this->anchos[18],$this->anchos[19],$this->anchos[20],$this->anchos[21],$this->anchos[22], $this->anchos[23],$this->anchos[24],$this->anchos[25]));
				$this->SetAligns(array("C","C","C","C","C","C","C","R","R","C","R","R","C","R","R"));
			    $this->SetBorder(1);
			    $this->setX(10);
				$this->Row(array($datsal["fecha"],$datsal["codigo"],$datsal["descod"],$datsal["unimed"],$datsal["tipmov"],$datsal["desmov"],"","","",number_format($datsal["cantidad"],0,"",""),H::FormatoMonto($datsal["costo"]),H::FormatoMonto($datsal["cantidad"]*$datsal[costo]),number_format($datsal["existencia"],0,"",""),H::FormatoMonto($datsal["costo"]),H::FormatoMonto($datsal["existencia"]*$datsal["costo"])));
				$this->SetBorder(0);
				}

				//Detalle de Despachos
				$this->arrdes = $this->caregauxexi->sqldespachos($this->codartdes,$this->codarthas,$this->fecdes,$this->fechas,$alm);
				foreach ($this->arrdes as $datdes){
				$this->setFont("Arial","",6);
			    $this->SetWidths(array($this->anchos[5],$this->anchos[12], $this->anchos[13],$this->anchos[14],$this->anchos[15],$this->anchos[16],$this->anchos[17], $this->anchos[18],$this->anchos[19],$this->anchos[20],$this->anchos[21],$this->anchos[22], $this->anchos[23],$this->anchos[24],$this->anchos[25]));
				$this->SetAligns(array("C","C","C","C","C","C","C","R","R","C","R","R","C","R","R"));
			    $this->SetBorder(1);
			    $this->setX(10);
				$this->Row(array($datdes["fecha"],$datdes["codigo"],$datdes["descod"],$datdes["unimed"],"","Despacho","","","",number_format($datdes["cantidad"],0,"",""),H::FormatoMonto($datdes["costo"]),H::FormatoMonto($datdes["cantidad"]*$datdes[costo]),number_format($datdes["existencia"],0,"",""),H::FormatoMonto($datdes["costo"]),H::FormatoMonto($datdes["existencia"]*$datdes["costo"])));
				$this->SetBorder(0);
				}

				$this->setXY(10,41);
				$this->setFont("Arial","B",9);
				$this->cell(115,5,"Almacen: ",0,0,'R');
				$this->setFont("Arial","",8);
				$this->cell(130,5,$datalm["codalm"]."-".$datalm["nomalm"],0,0,'L');
				if ($reg<=$registro){
					$this->addPage();
				}

				}

               unset($this->caregauxexi);
            }
	}
