<?
  require_once("../../lib/general/fpdf/fpdf.php");
  require_once("../../lib/bd/basedatosAdo.php");
  require_once("../../lib/general/cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/modelo/sqls/nomina/Nprliqpressoc.class.php");
    //require_once("../../lib/general/mc_table.php");

  class pdfreporte extends fpdf
  {

//DECLARACION DE VARIABLES GLOBALES AQUI

    function pdfreporte()
    {
      $this->fpdf("l","mm","Letter");
      //CODIGO DE LAS CUENTAS
      $this->codempdes = H::GetPost("codempdes");
      $this->pres= new Nprliqpressoc();
      $this->cabecera = new cabecera ();
      $this->llenartitulosmaestro();
      $this->arrp=$this->pres->sqlp($this->codempdes);


        }// fin del pdf

function llenartitulosmaestro()
    {
       /* $this->titulos[0]="CÉDULA";
        $this->titulos[1]="NOMBRE";
        $this->titulos[2]="FECHA DE NACIMIENTO";
        $this->titulos[3]="EDAD";*/

  }




    function Header()
    {
      $this->SetTextColor(0,0,0);
	  $this->cabecera->poner_cabecera($this,$_POST["titulo"],"p","s");
	  $this->setFont("Arial","B",9);
	  $this->ln(5);

    }

    function Cuerpo()
    {

		$this->titulos = $this->pres->asignaciones($this->codempdes);
		$this->pagos = $this->pres->pagos($this->codempdes);
		$arrtitulos = array();
		$arrlinea = array();
        $anchos = array();
        $alinea = array();

		//primera linea
		$this->setFont("Arial","",8);
		$this->SetWidths(array(80,100,80));
		$this->SetAligns(array("L","L","L"));
		//$this->SetBorder(1);
		$this->Row(array("CEDULA: ".$this->arrp[0]['nacemp'].'-'.number_format($this->arrp[0]['codemp'],0,',','.'),"NOMBRES Y APELLIDOS: ".$this->arrp[0]['nomemp']," "));
		//$this->SetBorder(0);
		$this->SetFillTable(0);

		$this->setFont("Arial","",8);
		$this->SetWidths(array(70,70,30,60,30));
		$this->SetAligns(array("L","L","L","L","L"));
		//$this->SetBorder(1);
		
		$rs = $this->pres->sueldo($this->arrp[0]['codemp'],$this->arrp[0]['fechaegr']);
		$this->Row(array("CARGO: ".$this->arrp[0]['nomcar'],"UBICACION: ".$this->arrp[0]['nomcat'], "MOTIVO: ","SALARIO NORMAL: ".H::FormatoMonto(($rs[0]['ultsue']/30))."\n"."SUELDO MENSUAL NORMAL: ".H::FormatoMonto($rs[0]['ultsue']),"ANTIGUEDAD:\n".$this->arrp[0][anoefectivo]." Años ".$this->arrp[0][mesefectivo]. " Meses y ".$this->arrp[0][diasefectivo]." dìas"));
		//$this->SetBorder(0);
		$this->SetFillTable(0);

		$this->setFont("Arial","",8);
		$this->SetWidths(array(50,50));
		$this->SetAligns(array("L","L"));
		//$this->SetBorder(1);
		$this->Row(array("FECHA DE INGRESO: ".$this->arrp[0][fechaing],"FECHA DE EGRESO: ".$this->arrp[0][fechaegr]," "));
		//$this->SetBorder(0);
		$this->SetFillTable(0);
        $this->ln(10);

        //vamos a llenar parte del encabezado
        $this->arrptitulos = $this->titulos;
        $cuantost = count($this->arrptitulos);
        $arrtitulos[0]= "PERIODO";
        $ancho[0] = 15;
        $alinea[0] = "C";
        $arrtitulos[1]= "MES";
        $ancho[1] = 20;
        $alinea[1] = "C";

        $anchoresto = round (225/($cuantost+4));
        $arrtitulos[$cuantost+2] = "SUELDO/SALARIO INTEGRAL";
        $ancho[$cuantost+2] = $anchoresto;
        $alinea[$cuantost+2] = "C";

        $arrtitulos[$cuantost+3] = "SUELDO/DIARIO INTEGRAL";
        $ancho[$cuantost+3] = $anchoresto;
        $alinea[$cuantost+3] = "C";

		$arrtitulos[$cuantost+4] = "PRES. ANT";
		$ancho[$cuantost+4] = $anchoresto;
        $alinea[$cuantost+4] = "C";

		$arrtitulos[$cuantost+5] = "BOLIVARES";
		$ancho[$cuantost+5] = $anchoresto;
        $alinea[$cuantost+5] = "C";


        //llenamos el resto del encabezado con las asignaciones que tiene este trabajador

        $pos = 2;
        foreach ($this->arrptitulos as $tit)
        {
           $arrtitulos[$pos] = $tit["nomcon"];
           $ancho[$pos] = $anchoresto;
           $alinea[$pos] = "C";

           $pos++;
        }

        //IMPRIMOS EL ENCABEZADO
		$this->SetFillColor(230,230,230);
		$this->setFont("Arial","B",8);
		$this->SetWidths($ancho);
		$this->SetAligns($alinea);
		$this->SetBorder(1);
		$this->SetFillTable(1);
		$this->Rowm($arrtitulos);
		$this->SetBorder(0);
		$this->SetFillTable(0);


        foreach($this->pagos as $dato)
        {
			$arrlinea[0]= $dato["anio1"]."/".$dato["anio2"];
			$alinea[0]= "L";			
			$arrlinea[1]= H::ObtenerMesenLetras(date('m',strtotime($dato["fecinicon"])));
			$alinea[1]="L";
			$pos1 = 2;
			$acumes = 0;			
			foreach ($this->arrptitulos as $tit1)
	        {
	           $montasig = $this->pres->montos($this->codempdes,$dato["fecinicon"],$dato["fecfincon"],$tit1["codcpt"]);
	           $arrlinea[$pos1]= H::FormatoMonto($montasig[0]["monto"]);
	           $alinea[$pos1]= "R";
	           $acumes += $montasig[0]["monto"];
	           $pos1++;
	        }			
               $arrlinea[$pos1]= H::FormatoMonto($acumes);
	           $alinea[$pos1]= "R";
	           $arrlinea[$pos1+1]= H::FormatoMonto($acumes/30);
	           $alinea[$pos1+1]= "R";
	           $arrlinea[$pos1+2]= "";//por ahora en blanco no se sabe q va aqui
	           $alinea[$pos1+2]= "R";
	           $arrlinea[$pos1+3]= "";//por ahora en blanco no se sabe q va aqui
	           $alinea[$pos1+3]= "R";

	           //IMPRIMIMOS LAS ASIGNACIONES DE ESE MES
			
	            $this->setFont("Arial","",8);
				$this->SetWidths($ancho);
				$this->SetAligns($alinea);
				$this->SetBorder(1);
				$this->Row($arrlinea);
				$this->SetBorder(0);

        }









    }

 }
?>
