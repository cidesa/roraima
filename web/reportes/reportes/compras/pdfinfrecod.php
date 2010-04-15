<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/Cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/general/funciones.php");
    require_once("../../lib/modelo/sqls/compras/Cainfrecod.class.php");

	class pdfreporte extends fpdf
	{
		var $mes = array(
						 "01"=>"ENERO",
						 "02"=>"FEBRERO",
						 "03"=>"MARZO",
						 "04"=>"ABRIL",
						 "05"=>"MAYO",
						 "06"=>"JUNIO",
						 "07"=>"JULIO",
						 "08"=>"AGOSTO",
						 "09"=>"SEPTIEMBRE",
						 "10"=>"OCTUBRE",
						 "11"=>"NOVIEMBRE",
						 "12"=>"DICIEMBRE"
						 );
		var $i = 0;
		var $reftrades = '';
		var $reftrahas = '';
		var $fectrades = '';
		var $fectrahas = '';
		var $statra = '';
		var $director = '';
		var $de = '';
		var $para = '';
		var $asunto = '';

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");

	$this->arrp=array("no_vacio");
				$this->reqartdes = H::GetPost("reqartdes");
			$this->reqarthas = H::GetPost("reqarthas");
			$this->jefe = H::GetPost("jefe");

			$this->objcainfrecod= new Cainfrecod();
		    $this->arrp = $this->objcainfrecod->sqlp($this->reqartdes,$this->reqarthas);
		}

		function suma_fechas($fecha,$ndias)
		{
			if (preg_match("/[0-9]{1,2}\/[0-9]{1,2}\/([0-9][0-9]){1,2}/",$fecha))
            	list($dia,$mes,$año)=split("/", $fecha);
            if (preg_match("/[0-9]{1,2}-[0-9]{1,2}-([0-9][0-9]){1,2}/",$fecha))
            	list($dia,$mes,$año)=split("-",$fecha);
            $nueva = mktime(0,0,0, $mes,$dia,$año) + $ndias * 24 * 60 * 60;
            $nuevafecha=date("d-m-Y",$nueva);

            return ($nuevafecha);
		}

		function Header()
		{
			$this->cabecera= new cabecera();
			$this->cabecera->poner_cabecera($this,'',"p","n",'','M');
			$this->setFont("Arial","",9);
			$this->ln(2);
			$this->MultiCell(190,5,"La Asuncion, ".date("d")." de ".$this->mes[date("m")]." de ".date("Y"),0,'R');
			$this->ln();
			$this->MCPlus(160,5,"Senores\n<@Presente.<,>arial,BUI,9@>");
			$this->ln();
			$this->setFont("Arial","",9);
			$this->MCPlus(190,5,"\t\t\t".'Me dirijo a Usted, en la oportunidad de informarle que de conformidad con lo previsto en el articulo ' .
					'N'.chr(186).' 74, de la <@ "Ley de Contrataciones Publicas"<,>arial,B,9@>, publicado en Gaceta Oficial N'.chr(186).' 5.877 del 14-03-2008, ' .
					'para la Adquisicion de Bienes y/o Contratacion de Servicios por Consulta de Precios, se invita a la Empresa ' .
					'participar en el proceso de Adjudicacion Directa por el mecanismo de Consulta de Precios, ' .
					'del memorando '.$this->arrp[$this->i]["reqart"].' cuyo objeto es la adquisicion de <@"'.$this->arrp[$this->i]["desreq"].'"<,>arial,B,9@> ' .
					'segun especificaciones tecnicas contenidas en el <@Memorando de Pedido N'.chr(186).' '.$this->arrp[$this->i]["reqart"].' ' .
					'GOBIERNO DEL ESTADO NUEVA ESPARTA - '.$this->objcarinvpro->unidad($this->arrp[$this->i]["unires"]).'<,>arial,B,9@>');
			$fechahasta = $this->suma_fechas(date("d/m/Y"),3);
			$partefechahasta=explode("-",$fechahasta);
			$this->MultiCell(0,5,"\t\t\tEl Sobre se recibira hasta el dia ".$partefechahasta[0]." de ".$this->mes[$partefechahasta[1]]." de ".$partefechahasta[2]." a las 4:00 pm.");
			$this->Ln();
			$this->Cell(20);
			$this->MultiCell(150,5,"La Cotizacion o Presupuesto debera indicar lo siguiente:\n" .
								   "\t\t\t".chr(127)." Debe estar impreso el Nombre y RIF de la empresa que realiza la cotizacion.\n" .
								   "\t\t".chr(127)." La cotizacion debe estar dirigida a la Gobernacion del Estado Nueva Esparta - Jefatura " .
								   "de Compras y Suministro \t\t\t\t\t\t\t\t\tBienes y Servicios.\n" .
								   "\t\t\t".chr(127)." La cotizacion debe hacer mencion solo a lo solicitado en el memorando de pedido.\n" .
								   "\t\t\t".chr(127)." Deben indicar el precio unitario y totalizado, prestando atencion a los decimales (Centimos).\n" .
								   "\t\t\t".chr(127)." El Impuesto al Valor Agregado (IVA), debe estar desglosado.\n" .
								   "\t\t\t".chr(127)." Las cotizaciones deben estar firmadas y selladas por el representante legal de la Empresa  \n" .
								   "\t\t\t".chr(127)." Las Cotizaciones deben prestarse sin tachaduras ni enmendaduras.");
			$this->Ln();
			$this->MultiCell(0,5,"\t\t\tSin otro particular se suscribe de Usted,");
			$this->Ln();
			$this->MultiCell(0,5,"Atentamente,",0,'C');
			$this->Ln(20);
			$this->setFont("Arial","B",9);
			$this->MultiCell(0,5,$this->jefe,0,'C');
			$this->setFont("Arial","",9);
			$this->MultiCell(0,5,"Jefatura Compras y Suministros",0,'C');
			//$this->MultiCell(0,5,"Adquisicion de Bienes y Servicios",0,'C');




		}

		function Cuerpo()
		{
			$total = count($this->arrp);
			while($this->i < $total)
			{
				$this->i++;
				if($this->i < $total)
				{
					$this->AddPage();
				}
			}
		}
	}
?>