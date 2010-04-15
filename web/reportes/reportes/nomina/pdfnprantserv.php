<?
  require_once("../../lib/general/fpdf/fpdf.php");
  require_once("../../lib/bd/basedatosAdo.php");
  require_once("../../lib/general/cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/modelo/sqls/nomina/Nprantserv.class.php");
    //require_once("../../lib/general/mc_table.php");

  class pdfreporte extends fpdf
  {

//DECLARACION DE VARIABLES GLOBALES AQUI

    function pdfreporte()
    {
      $this->fpdf("l","mm","Letter");
      //CODIGO DE LAS CUENTAS
      $this->cedula = H::GetPost("cedula");
      $this->motivo = H::GetPost("motmin");
      $this->fecsol = H::GetPost("fecsol");
      $this->observ = H::GetPost("observ");
      $this->nomdirec = H::GetPost("nomdirrec");
      $this->cardirec = H::GetPost("cardirrec");
      $this->antserv= new Nprantserv();
      $this->cabecera = new cabecera ();
      $this->llenartitulosmaestro();
      $this->arrp=$this->antserv->sqlp($this->cedula);
      //$this->SetAutoPageBreak(true);

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

		$this->SetX(180);
		$this->setFont("Arial","",8);
		$this->SetWidths(array(90));
		$this->SetAligns(array("C"));
		$this->SetBorder(1);
		$this->Row(array("FECHA DE SOLICITUD"));
		$this->SetBorder(0);
    	$this->SetFillTable(0);


		$this->SetX(180);
    	$this->setFont("Arial","",8);
		$this->SetWidths(array(30,30,30));
		$this->SetAligns(array("C","C","C"));
		$this->SetBorder(1);
		$this->Row(array("DIA","MES","AÑO"));
		$this->SetBorder(0);
		$this->SetFillTable(0);


		$this->SetX(180);
		$this->setFont("Arial","",8);
		$this->SetWidths(array(30,30,30));
		$this->SetAligns(array("C","C","C"));
		$this->SetBorder(1);
		$this->Row(array(substr($this->fecsol,0,2),substr($this->fecsol,3,2),substr($this->fecsol,6,4)));
		$this->SetBorder(0);
		$this->SetFillTable(0);

		$this->SetFillColor(230,230,230);
		$this->setFont("Arial","B",8);
		$this->SetWidths(array(260));
		$this->SetAligns(array("C"));
		$this->SetFillTable(1);
		$this->SetBorder(1);
		$this->Row(array("DATOS PERSONALES"));
		$this->SetBorder(0);
    	$this->SetFillTable(0);

        $this->setFont("Arial","",8);
		$this->SetWidths(array(130,130));
		$this->SetAligns(array("L","L"));
		//$this->SetFillTable(1);
		$this->SetBorder(1);
		$this->Row(array("NOMBRES Y APELLIDOS:\n".$this->arrp[0][nombre],"Nº DE CÉDULA DE IDENTIDAD:\n".$this->arrp[0][codigo]));
		//$this->SetBorder(0);
    	$this->SetFillTable(0);

    	$this->SetFillColor(230,230,230);
		$this->setFont("Arial","B",8);
		$this->SetWidths(array(260));
		$this->SetAligns(array("C"));
		$this->SetFillTable(1);
		$this->SetBorder(1);
		$this->Row(array("INGRESO"));
		$this->SetBorder(0);
    	$this->SetFillTable(0);

		$this->arring = $this->antserv->sqldatos($this->cedula,'I');

    	$this->setFont("Arial","",8);
		$this->SetWidths(array(60,40,40,40,40,40));
		$this->SetAligns(array("C","C","C","C","C","C"));
		//$this->SetFillTable(1);
		$this->SetBorder(1);
		$this->Row(array("FECHA","TITULO DEL CARGO","CODIGO DE CLASE","GRADO", "HORARIO DE TRABAJO\n"."","HORAS SEMANALES\n".""));
		//$this->SetBorder(0);
    	$this->SetFillTable(0);

    	$this->setFont("Arial","",8);
		$this->SetWidths(array(20,20,20,40,40,40,40,40));
		$this->SetAligns(array("C","C","C","C","C","C","C","C"));
		//$this->SetFillTable(1);
		$this->SetBorder(1);
		$this->Row(array("DIA\n".("_____________")."\n".substr($this->arring[0][fechaing],0,2),"MES\n".("_______________")."\n".substr($this->arring[0][fechaing],3,2),"AÑO\n".("_____________")."\n".substr($this->arring[0][fechaing],6,4),$this->arring[0][nomcar],"","","",""));//LOS DATOS DE CODIGO DE CLASE Y GRADO POR AHORA EN VACIO
		//$this->SetBorder(0);
    	$this->SetFillTable(0);

    	$this->arrpsal1 = $this->antserv->pagos($this->cedula,'I');

    	foreach ($this->arrpsal1 as $dato)
    	{
    		$this->setFont("Arial","",8);
			$this->SetWidths(array(100,160));
			$this->SetAligns(array("C","C"));
			//$this->SetFillTable(1);
			$this->SetBorder(1);
			$this->Row(array($dato["nomcon"],H::FormatoMonto($dato["monto"])));
			$this->SetBorder(0);
	    	//$this->SetFillTable(0);

    	}

		$this->SetFillColor(230,230,230);
		$this->setFont("Arial","B",8);
		$this->SetWidths(array(260));
		$this->SetAligns(array("C"));
		$this->SetFillTable(1);
		$this->SetBorder(1);
		$this->Row(array("EGRESO"));
		$this->SetBorder(0);
    	$this->SetFillTable(0);

		$this->arregr = $this->antserv->sqldatos($this->cedula,'E');

    	$this->setFont("Arial","",8);
		$this->SetWidths(array(60,40,40,40,40,40));
		$this->SetAligns(array("C","C","C","C","C","C"));
		//$this->SetFillTable(1);
		$this->SetBorder(1);
		$this->Row(array("FECHA","TITULO DEL CARGO","CODIGO DE CLASE","GRADO", "HORARIO DE TRABAJO\n"."","HORAS SEMANALES\n".""));
		//$this->SetBorder(0);
    	$this->SetFillTable(0);

    	$this->setFont("Arial","",8);
		$this->SetWidths(array(20,20,20,40,40,40,40,40));
		$this->SetAligns(array("C","C","C","C","C","C","C","C"));
		//$this->SetFillTable(1);
		$this->SetBorder(1);
		$this->Row(array("DIA\n".("_____________")."\n".substr($this->arrp[0][fecret],0,2),"MES\n".("_______________")."\n".substr($this->arregr[0][fechaegr],3,2),"AÑO\n".("_____________")."\n".substr($this->arregr[0][fechaegr],6,4),$this->arregr[0][nomcar],"","","",""));//LOS DATOS DE CODIGO DE CLASE Y GRADO POR AHORA EN VACIO
		//$this->SetBorder(0);
    	$this->SetFillTable(0);

    	$this->arrpsal2 = $this->antserv->pagos($this->cedula,'E');

    	foreach ($this->arrpsal2 as $dato1)
    	{
    		$this->setFont("Arial","",8);
			$this->SetWidths(array(100,160));
			$this->SetAligns(array("C","C"));
			//$this->SetFillTable(1);
			$this->SetBorder(1);
			$this->Row(array($dato1["nomcon"],H::FormatoMonto($dato1["monto"])));
			$this->SetBorder(0);
	    	//$this->SetFillTable(0);

    	}

    	$this->setFont("Arial","",8);
		$this->SetWidths(array(30,50,180));
		$this->SetAligns(array("C","C","C"));
		//$this->SetFillTable(1);
		$this->SetBorder(1);
		$this->Row(array("TIPO DE EGRESO","PAGO DE PRESTACIONES","FUNDAMENTO LEGAL"));
		//$this->SetBorder(0);
    	$this->SetFillTable(0);

    	$arrppresta = $this->antserv->prespag($this->cedula);
    	if($arrppresta[0][numord]<>"")
    	{
    		$pagada = "CANCELADO";
    	}
    	else
    	{
    		$pagada = "EN TRAMITE";
    	}
    	$cadenafund = "Art. 19 último aparte, 20 en su encabezamiento  y 21 de la Ley del Estatuto de la Función Pública";


    	$this->setFont("Arial","",8);
		$this->SetWidths(array(30,50,180));
		$this->SetAligns(array("C","C","L"));
		//$this->SetFillTable(1);
		$this->SetBorder(1);
		$this->Row(array($this->motivo,$pagada,$cadenafund));
		//$this->SetBorder(0);
    	$this->SetFillTable(0);

    	$this->setFont("Arial","",8);
		$this->SetWidths(array(260));
		$this->SetAligns(array("L"));
		//$this->SetFillTable(1);
		$this->SetBorder(1);
		$this->Row(array("OBSERVACIONES:\n".$this->observ));
		//$this->SetBorder(0);
    	//$this->SetFillTable(0);

        $this->setFont("Arial","",8);
		$this->SetWidths(array(60,200));
		$this->SetAligns(array("C","C"));
		//$this->SetFillTable(1);
		$this->SetBorder(1);
		$this->Row(array("FECHA DE EMISION",""));
		//$this->SetBorder(0);
    	//$this->SetFillTable(0);

    	$this->setFont("Arial","",8);
		$this->SetWidths(array(20,20,20,100,60,40));
		$this->SetAligns(array("C","C","C","C","C","C"));
		$this->SetBorder(1);
		$this->Row(array("DIA","MES","AÑO","APELLIDOS Y NOMBRES","CARGO","FIRMA Y SELLO"));

		//print date('d').'-'.date('m').'-'.date('y');exit;
		$this->setFont("Arial","",8);
		$this->SetWidths(array(20,20,20,100,60,40));
		$this->SetAligns(array("C","C","C","C","C","C"));
		$this->SetBorder(1);
		$this->Row(array(date('d'),date('m'),date('Y'),$this->nomdirec,$this->cardirec,""));














		/*$this->titulos = $this->pres->asignaciones($this->cedula);
		$this->pagos = $this->pres->pagos($this->cedula);
		$arrtitulos = array();
		$arrlinea = array();
        $anchos = array();
        $alinea = array();

		//primera linea
		$this->setFont("Arial","",8);
		$this->SetWidths(array(80,100,80));
		$this->SetAligns(array("L","L","L"));
		//$this->SetBorder(1);
		$this->Row(array("CEDULA: ".$this->arrp[0][cedula],"NOMBRES Y APELLIDOS: ".$this->arrp[0][nombre]," "));
		//$this->SetBorder(0);
		$this->SetFillTable(0);

		$this->setFont("Arial","",8);
		$this->SetWidths(array(70,70,30,60,30));
		$this->SetAligns(array("L","L","L","L","L"));
		//$this->SetBorder(1);
		$this->Row(array("CARGO: ".$this->arrp[0][nomcar],"UBICACION: ".$this->arrp[0][nomcat], "MOTIVO: ","SALARIO NORMAL: ".H::FormatoMonto(($this->arrp[0][suecar]/30))."\n"."SUELDO MENSUAL NORMAL: ".H::FormatoMonto($this->arrp[0][suecar]),"ANTIGUEDAD:\n".$this->arrp[0][anoefectivo]." Años ".$this->arrp[0][mesefectivo]. " Meses y ".$this->arrp[0][diasefectivo]." dìas"));
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

        $cuantost = count($this->titulos);
        $arrtitulos[0]= "PERIODO";
        $ancho[0] = 15;
        $alinea[0] = "C";
        $arrtitulos[1]= "MES";
        $ancho[1] = 20;
        $alinea[1] = "C";

        $anchoresto = round (225/($cuantost+4));
        $arrtitulos[$cuantost+2] = "SUELDO/\nSALARIO INTEGRAL";
        $ancho[$cuantost+2] = $anchoresto;
        $alinea[$cuantost+2] = "C";

        $arrtitulos[$cuantost+3] = "SUELDO/\nDIARIO INTEGRAL";
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
        foreach ($this->titulos as $tit)
        {
           $arrtitulos[$pos] = $tit["nomcon"];
           $ancho[$pos] = $anchoresto;
           $alinea[$pos] = "C";

           $pos++;
        }

        //IMPRIMOS EL ENCABEZADO
		$this->SetFillColor(230,230,230);
		$this->setFont("Arial","B",6);
		$this->SetWidths($ancho);
		$this->SetAligns($alinea);
		$this->SetBorder(1);
		$this->SetFillTable(1);
		$this->Row($arrtitulos);
		$this->SetBorder(0);
		$this->SetFillTable(0);


        foreach($this->pagos as $dato)
        {
			$arrlinea[0]= $dato["anio1"]."/".$dato["anio2"];
			$alinea[0]= "L";
			//print substr($dato["fecinicon"],5,2);exit;
			$arrlinea[1]= H::ObtenerMesenLetras(substr($dato["fecinicon"],5,2));
			$alinea[1]="L";
			$pos1 = 2;
			$acumes = 0;
			foreach ($this->titulos as $tit1)
	        {
	           $montasig = $this->pres->montos($this->cedula,$dato["fecinicon"],$dato["fecfincon"],$tit1["codcpt"]);
	           $arrlinea[$pos1]= H::FormatoMonto($montasig[0]["monto"]);
	           $alinea[$pos1]= "R";
	           $acumes = $acumes+$montasig[0]["monto"];
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

	            $this->setFont("Arial","",6);
				$this->SetWidths($ancho);
				$this->SetAligns($alinea);
				$this->SetBorder(1);
				$this->Row($arrlinea);
				$this->SetBorder(0);
				if($this->gety()==200)
		        {
		        	$this->addpage();
		        }

        }

        $this->ln(3);

        $anticipos = $this->pres->anticipos($this->cedula);

        $this->setFont("Arial","B",6);
		$this->SetFillColor(230,230,230);
		$this->SetWidths(array(260));
		$this->SetAligns(array("C"));
		$this->SetBorder(1);
		$this->SetFillTable(1);
		$this->Row(array("DESCUENTOS"));
		$this->SetBorder(0);
        $this->SetFillTable(0);

        $acumant = 0;
        foreach ($anticipos as $ant)
        {
        	$this->setFont("Arial","",6);
			//$this->SetFillColors(230,230,230);
			$this->SetWidths(array(180,80));
			$this->SetAligns(array("L","R"));
			$this->SetBorder(1);
			//$this->SetFillTable(1);
			$this->Row(array("ANTICIPO ".H::ObtenerMesenLetras(substr($ant["fecant"],5,2))."/".substr($ant["fecant"],0,4),H::FormatoMonto($ant["monant"])));
			$this->SetBorder(0);
	        //$this->SetFillTable(0);
	        $acumant = $acumant + $ant["monant"];
        }
            $this->setFont("Arial","",6);
			//$this->SetFillColors(230,230,230);
			$this->SetWidths(array(180,80));
			$this->SetAligns(array("L","R"));
			$this->SetBorder(1);
			//$this->SetFillTable(1);
			$this->Row(array("TOTAL ANTICIPOS DE PRESTACIONES SOCIALES",H::FormatoMonto($acumant)));
			$this->SetBorder(0);
	        //$this->SetFillTable(0);
	        //monto108

            $this->setFont("Arial","B",6);
			//$this->SetFillColors(230,230,230);
			$this->SetWidths(array(180,80));
			$this->SetAligns(array("L","R"));
			$this->SetBorder(1);
			//$this->SetFillTable(1);
			$this->Row(array("TOTAL NETO A PAGAR POR ANTIGUEDAD",H::FormatoMonto($this->arrp[0][monto108])));
			$this->SetBorder(0);
	        //$this->SetFillTable(0);
	        $this->ln(3);

	        $this->setFont("Arial","B",6);
			$this->SetFillColor(230,230,230);
			$this->SetWidths(array(260));
			$this->SetAligns(array("C"));
			$this->SetBorder(1);
			$this->SetFillTable(1);
			$this->Row(array("ASIGNACIONES POR PAGAR"));
			$this->SetBorder(0);
	        //$this->SetFillTable(0);

            $this->setFont("Arial","B",6);
			//$this->SetFillColors(230,230,230);
			$this->SetWidths(array(180,26.6,26.6,26.7));
			$this->SetAligns(array("C","C","C","C"));
			$this->SetBorder(1);
			//$this->SetFillTable(1);
			$this->Row(array("CONCEPTOS","DIAS A CANCELAR","SALARIO BASE","MONTO"));
			//$this->SetBorder(0);

			$this->setFont("Arial","",6);
			//$this->SetFillColors(230,230,230);
			$this->SetWidths(array(180,26.6,26.6,26.7));
			$this->SetAligns(array("L","C","C","R"));
			$this->SetBorder(1);
			//$this->SetFillTable(1);
			$this->Row(array("TOTAL EN PRESTACIONES DE ANTIGUEDAD","---------","---------",H::FormatoMonto($this->arrp[0][monto108])));
			//$this->SetBorder(0);

			$this->setFont("Arial","",6);
			//$this->SetFillColors(230,230,230);
			$this->SetWidths(array(180,26.6,26.6,26.7));
			$this->SetAligns(array("L","C","C","R"));
			$this->SetBorder(1);
			//$this->SetFillTable(1);
			$this->Row(array("INTERESES DEL FIDEICOMISO","---------","---------",H::FormatoMonto($this->arrp[0][int108])));
			//$this->SetBorder(0);

            $vaca = $this->pres->vacaciones($this->cedula);

            foreach ($vaca as $vac)
	        {

	        	if($vac["dias"]==0)
	        	{
	        		$cadena= "VACACIONES PENDIENTES PERIODO ".$vac["desde"]."-".$vac["hasta"]." (Fraccionado)";
	        		$dias = $vac["disfrutados"];
	        	}
	        	else
	        	{
	        		$cadena= "VACACIONES PENDIENTES PERIODO ".$vac["desde"]."-".$vac["hasta"];
	        		$dias = $vac["dias"];
	        	}

	        	if ($vac["fracciondia"]<> 0)
	        	{
					$cadena= "BONO VACACIONAL PERIODO ".$vac["desde"]."-".$vac["hasta"]."( ".$vac["corresponde"]." días)";
                    $dias = $vac["fracciondia"];
	        	}

	        	$sueldo = ($this->arrp[0][suecar]/30);
	        	$this->setFont("Arial","",6);
				//$this->SetFillColors(230,230,230);
				$this->SetWidths(array(180,26.6,26.6,26.7));
				$this->SetAligns(array("L","C","R","R"));
				$this->SetBorder(1);
				//$this->SetFillTable(1);
				$this->Row(array($cadena,$dias,H::FormatoMonto($sueldo),H::FormatoMonto($sueldo*$dias)));
				$this->SetBorder(0);
		        //$this->SetFillTable(0);
		        $acuvac = $acuvac + ($dias*$sueldo);
	        }
          		$totasig = $acuvac + $this->arrp[0][monto108]+$this->arrp[0][int0108];

                $this->setFont("Arial","B",6);
				//$this->SetFillColors(230,230,230);
				$this->SetWidths(array(233.3,26.7));
				$this->SetAligns(array("L","R"));
				$this->SetBorder(1);
				//$this->SetFillTable(1);
				$this->Row(array("TOTAL ASIGNACIONES POR PAGAR ",H::FormatoMonto($totasig)));
				$this->SetBorder(0);
		        //$this->SetFillTable(0);
                $this->ln(3);

                $this->setFont("Arial","",6);
				//$this->SetFillColors(230,230,230);
				$this->SetWidths(array(233.3,26.7));
				$this->SetAligns(array("L","R"));
				$this->SetBorder(1);
				//$this->SetFillTable(1);
				$this->Row(array("TOTAL ABONADO AL FIDEICOMISO ",H::FormatoMonto($this->arrp[0][monto108]-$this->arrp[0][int0108])));
				$this->SetBorder(0);
		        //$this->SetFillTable(0);

                $this->setFont("Arial","B",6);
				//$this->SetFillColors(230,230,230);
				$this->SetWidths(array(233.3,26.7));
				$this->SetAligns(array("L","R"));
				$this->SetBorder(1);
				//$this->SetFillTable(1);
				$this->Row(array("TOTAL NETO A PAGAR POR PRESTACIONES SOCIALES ",H::FormatoMonto($totasig-($this->arrp[0][monto108]-$this->arrp[0][int0108]))));
				$this->SetBorder(0);
		        //$this->SetFillTable(0);*/
    }

 }
?>
