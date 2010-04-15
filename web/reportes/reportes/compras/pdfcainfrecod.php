<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
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
		var $codrefdes = '';
		var $codrefhas = '';
		var $rifpromin = '';
		var $rifpromax = '';


		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
$this->cab=new cabecera();
	        $this->arrp=array("no_vacio");
			$this->codrefdes = H::GetPost("codrefdes");
			$this->codrefhas = H::GetPost("codrefhas");
			$this->rifpromin = H::GetPost("rifpromin");
			$this->rifpromax = H::GetPost("rifpromax");
			$this->jefe = H::GetPost("jefe");
            $this->memo = H::GetPost("memo");
            $this->fecha = H::GetPost("fecreqdes");//print $this->fecha;exit;
            $this->objcainfrecod= new Cainfrecod();
		    $this->arrp = $this->objcainfrecod->sqlp($this->codrefdes,$this->codrefhas,$this->rifpromin,$this->rifpromax);

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
		    	$this->cab->poner_cabecera_f($this,$_POST["titulo"],$this->conf,"n","n");
			$this->setFont("Arial","",9);
			$this->ln(10);
			$fecha=split("/",$this->fecha);

			//to_date('".$this->fecdesde."','dd/mm/yyyy')
			$this->MultiCell(190,5,"Caracas, ".$fecha[0]." de ".$this->mes[$fecha[1]]." de ".$fecha[2],0,'R');
			//$this->MultiCell(190,5,"Caracas, ".date("d")." de ".$this->mes[date("m")]." de ".date("Y"),0,'R');
			$this->ln(5);
			//$this->MultiCell(120,5,'INFORME DE RECOMENDACIÓN',0,0,'C');
			//$this->MultiCell(105,5,'ORDEN DIRECTA',0,0,'C');
			$this->ln(2);
			$this->setFont("Arial","",9);

			$this->MCPlus(190,5,"\t\t\t".'En aras de realizar un buen servicio en cuanto a la adquisición de: <@"'.$this->arrp[$this->i]["descot"].'"<,>arial,B,9@> ' .
					' de acuerdo con la solicitud realizada por <@"'.$this->arrp[$this->i]["nompre"].'"<,>arial,B,9@>  segun memo Nº <@"'.$this->memo.'"<,>arial,B,9@> '.
					',Esta División de Compras y Servicios Generales, procedió a solicitar consultas de precios a varias proveedores mediante la solicitud de cotización Nº <@"'.$this->arrp[$this->i]["refcot"].'"<,>arial,B,9@> ,' .
					'En tal sentido, se obtuvo como resultado la cotización de la Empresa,<@"'.$this->arrp[$this->i]["nompro"].'"<,>arial,B,9@> a la cual se le adjudica la presente adquisición en atención a lo previsto en el articulo Nº 74 De ley de Contrataciones.');
			$this->Ln(5);
			$this->MCPlus(190,5,"\t\t\t".'Esto de Confromidad con lo establecido en los Artículos Nº 73 Numeral 1, y los articulos 74 y 75 de la ley de contrataciones publicas' .
					' y previa autorización de la Directora de Administración de conformidad con lo establecido en el Manual de Normas y Procedimientos para la elaboración ' .
					'de Ordenes de Compras y/o Servicios');
			$this->Ln(21);
			$this->setFont("Arial","B",9);
			$this->MultiCell(0,5,$this->jefe,0,'C');
			$this->setFont("Arial","",9);
			$this->MultiCell(0,5,"Dirección de Administración y Finanzas",0,'C');
			$this->Ln(21);





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