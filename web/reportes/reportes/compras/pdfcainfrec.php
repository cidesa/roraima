<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/general/funciones.php");
    require_once("../../lib/modelo/sqls/compras/Cainfrec.class.php");

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

	        $this->arrp=array("no_vacio");
			$this->codrefdes = H::GetPost("codrefdes");
			$this->codrefhas = H::GetPost("codrefhas");
			$this->rifpromin = H::GetPost("rifpromin");
			$this->rifpromax = H::GetPost("rifpromax");
			$this->jefe = H::GetPost("jefe");
            $this->memo = H::GetPost("memo");
            $this->fecha = H::GetPost("fecreqdes");
            $this->objcainfrec= new Cainfrec();
		    $this->arrp = $this->objcainfrec->sqlp($this->codrefdes,$this->codrefhas,$this->rifpromin,$this->rifpromax);
$this->cab=new cabecera();
		}


		function Header()
		{
			$this->cab->poner_cabecera_f($this,$_POST["titulo"],$this->conf,"n","n");
		  /*  $this->Image("../../img/logo_1.jpg",10,8,18);
		    $this->SetXY(27,10);
		    $this->Cell(120,5,'República Bolivariana de Venezuela',0,0,'L');
		    $this->SetXY(27,$this->getY()+4);
		    $this->Cell(120,5,'Distrito Metropolitano de Caracas',0,0,'l');
		    $this->SetXY(27,$this->getY()+4);
		    $this->Cell(120,5,'Contraloría Metropolitana de Caracas',0,0,'l');
		    $this->SetXY(27,$this->getY()+4);
		    $this->Cell(120,5,'Dirección de Administración',0,0,'l');
		    $this->SetXY(27,$this->getY()+4);
		    $this->Cell(120,5,'División de Compras y Servicios Generales',0,0,'l');*/
			//$this->line(10, $this->getY()+10, 210, $this->getY()+10);
			$this->setFont("Arial","",9);
			$this->ln(5);
			$fecha=split("/",$this->fecha);
			$this->MultiCell(190,5,"Caracas, ".$fecha[0]." de ".$this->mes[$fecha[1]]." de ".$fecha[2],0,'R');
			//$this->MultiCell(190,5,"Caracas, ".date("d")." de ".$this->mes[date("m")]." de ".date("Y"),0,'R');
			$this->ln(5);
//			$this->MultiCell(120,5,'INFORME DE RECOMENDACIÓN',0,0,'C');
		//	$this->MultiCell(105,5,'ORDEN DIRECTA',0,0,'C');
			$this->ln(2);
			$this->setFont("Arial","",9);

			$this->MCPlus(190,5,"\t\t\t".'En aras de realizar un buen servicio en cuanto a la adquisición de: <@"'.$this->arrp[$this->i]["descot"].'"<,>arial,B,9@> ' .
					' de acuerdo con la solicitud realizada por <@"'.$this->arrp[$this->i]["nompre"].'"<,>arial,B,9@>  segun memo Nº <@"'.$this->memo.'"<,>arial,B,9@> '.
					',Esta División de Compras y Servicios Generales, procedió a solicitar consultas de precios a varias proveedores mediante la solicitud de cotización Nº <@"'.$this->arrp[$this->i]["refcot"].'"<,>arial,B,9@> ,' .
					'En tal sentido, se obtuvo como resultado la cotización de la Empresa,<@"'.$this->arrp[$this->i]["nompro"].'"<,>arial,B,9@> a la cual se le adjudica la presente adquisición en atención a lo previsto en el articulo Nº 74 De ley de Contrataciones.');
			$this->Ln(5);
				$this->MCPlus(190,5,"\t\t\t".'En tal sentido, se eleboró el Analisis Comparativo de Precios Identificado con el numero <@"'.$this->arrp[$this->i]["refsol"].'"<,>arial,B,9@>, obtenidas de las empresas <@"'.$this->arrp[$this->i]["nompro"].'"<,>arial,B,9@>; tomaron en cuenta el criterio de calidad y economía lo que  trajo como resultado la Adjudicación por rubros, según las asignaciones de prioridades que se detallan a acontinuación:');
			$this->Ln(30);
			$this->arrp2 = $this->objcainfrec->sqlp2($this->arrp[$this->i]["refcot"]);
            $eof=count($this->arrp2);
			$x='00';
			$x1='50';
			$x2='140';
			$y='165';
			$e=0;
			 $this->SetXY($x,$y);
			 $this->setFont("Arial","",7);

            $this->SetXY(22,$y);

			 foreach($this->arrp2 as $registro)
			{
				 $this->SetX(22);
				 $this->setwidths(array(65,65,40));
		         $this->setaligns(array("L","L","C"));
		         $this->Setborder(true);
				 $this->rowm(array($registro["nompro"],substr($registro["desart"],0,85),$registro["priori"]));
			/*	if (strlen($registro["desart"])>90 or strlen($registro["nompro"])>45 ){
					$y=$y+4;
                    $e=$e+4;
				}

				 $y=$y+4;*/
				 $yp=$this->Gety();

			}
			$this->Ln(5);
			$this->setFont("Arial","",9);
            $this->SetXY(22,160);
            $this->setwidths(array(65,65,40));
			$this->setaligns(array("C","C","C"));
		    $this->Setborder(true);
            $this->rowm(array('PROVEEDOR','ARTICULO','PRIORIDAD ASIGNADA'));


		//    $this->Ln(20+($eof*4));
		 $this->SetY($yp);
		    $this->Ln();
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