<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/general/funciones.php");
    require_once("../../lib/modelo/sqls/bienes/Bnractdes.class.php");

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
	        $this->coddisdes = H::GetPost("coddisdes");
			$this->coddishas = H::GetPost("coddishas");
			$this->codubides = H::GetPost("codubides");
			$this->codubihas = H::GetPost("codubihas");
			$this->codubides2 = H::GetPost("codubides2");
			$this->codubihas2 = H::GetPost("codubihas2");
			$this->codbiemin = H::GetPost("codmue1");
			$this->codbiemax = H::GetPost("codmue2");
			$this->respnom = H::GetPost("respnom");
			$this->respci = H::GetPost("respci");
			$this->presides = H::GetPost("presides");
			$this->presihas = H::GetPost("presihas");
			$this->dirgedes = H::GetPost("dirgedes");
			$this->dirgehas = H::GetPost("dirgehas");
			$this->dirdes = H::GetPost("dirdes");
			$this->dishas = H::GetPost("dishas");
			$this->abscrides = H::GetPost("abscrides");
			$this->abscrihas = H::GetPost("abscrihas");
			$this->cod = H::GetPost("cod");
			$this->bnractdes= new Bnractdes();
		    $this->arrp = $this->bnractdes->sqlp($this->coddisdes ,$this->coddishas,$this->codubides,$this->codubihas,$this->codubides2,$this->codubihas2,$this->codbiemin,$this->codbiemax,$this->cod);

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

		function Footer()
	{
		$this->SetY(-40);
		$this->SetX(15);
		$this->Cell(20,5,'',0,0,'L');
		$this->SetX(180);
		$this->Cell(20,5,'',0,0,'R');
		$this->SetX(100);
		$this->ln();

		$this->Cell(190,5,'',0,0,'C');
		$this->ln();
		$this->Cell(190,5,'',0,0,'C');
		$this->SetY(-20);
		$this->Line(15,$this->GetY(),200,$this->GetY());
	}

		function Header()
		{
		    $dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST[""],"l","s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			$this->ln();
			$this->MultiCell(190,5,"Caracas, ".date("d")." de ".$this->mes[date("m")]." de ".date("Y"),0,'R');

		}

		function Cuerpo()
		{
		     $total = count($this->arrp);
		     $in=0;

			 foreach($this->arrp as $registro)
			{
				$this->arrp2 = $this->bnractdes->sqlp2($this->arrp[$this->i]["tipo"]);
				$this->ln();
				$this->MultiCell(120,5,'ACTA DE '.$this->arrp2[0]["desdis"],0,0,'C');
				$this->tip=$this->arrp2[0]["desdis"];
				//if ($this->tip=='INCORPORACION'){ $this->tip=' entregados '; $in=1; }
				//if ($this->tip=='DESINCORPORACION'){ $this->tip=' retirados ';  $in=1; }
				if ($registro["tipo"]=='100002' OR $registro["tipo"]=='100011' OR $registro["tipo"]=='100012' OR $registro["tipo"]=='100016' OR $registro["tipo"]=='100018' OR $registro["tipo"]=='100019'){ $this->tip=' entregados ';  }
				if ($registro["tipo"]=='200051' OR $registro["tipo"]=='200061' OR $registro["tipo"]=='200062' OR $registro["tipo"]=='200063' OR $registro["tipo"]=='200065' OR $registro["tipo"]=='200067'){ $this->tip=' retirados ';   }

				$this->ln(10);
				//$this->arrp[$this->i]["tipo"]
			    $this->setFont("Arial","",9);

				$this->MCPlus(190,5,"\t\t\t".'Los que suscriben funcionarios, mayores de edad y de este domicilio: hacen constar que de acuerdo con lo previsto en el Artículo No. 140 de la ley Orgánica de la Hacienda Pública Nacional  y  la  Publicación No. 9  (rubro 51) de la Contraloria General de la República; los Bienes Nacionales que se citan en la presente Acta han sido '.$this->tip.' a la Dependencia Receptora: <@'.$this->arrp[$this->i]["desubi"].'<,>arial,B,9@>, a cargo de: <@'.$this->respnom.'<,>arial,B,9@> ,Titular  de la Cédula de Identidad Nº <@'.$this->respci.'<,>arial,B,9@>, situada en: <@'." la Ciudad de Caracas, Distrito Capital" .'<,>arial,B,9@> los cuales aparecen registrados en el inventario de la dependencia de Bienes Nacionales del: <@'.$this->Empresa(nombre).'<,>arial,B,9@> situada en la: ' .$this->Empresa(direccion).  'Caracas - Distrito Capital. ');
				$in=0;

				if ($in==3 ){ //si es traspaso
					$this->arrp3 = $this->bnractdes->sqlp3($registro["num"]);
					$this->ubides=$this->arrp3[0]["des"];
					$this->MCPlus(190,5,"\t\t\t".'Los que suscriben funcionarios, mayores de edad y de este domicilio: hacen constar que de acuerdo con lo previsto en el Artículo No. 140 de la ley Orgánica de la Hacienda Pública Nacional  y  la  Publicación  No.  9  (rubro 51)  de la Contraloria  General  de  la República; los Bienes Nacionales que se citan en la presente Acta han sido '.$this->tip.' de la Dependencia de origen: <@'.$this->arrp[$this->i]["desubi"].'<,>arial,B,9@>, a  la Dependencia receptora: <@'.$this->ubides.'<,>arial,B,9@>, a cargo de: <@'.$this->respnom.'<,>arial,B,9@> ,Titular  de la Cédula de Identidad Nº <@'.$this->respci.'<,>arial,B,9@>, situada en: <@'." la Ciudad de Caracas, Distrito Capital" .'<,>arial,B,9@> los cuales aparecen registrados en el inventario de la dependencia de Bienes Nacionales de la: <@'.$this->Empresa(nombre) .'<,>arial,B,9@> situada en la: ' .$this->Empresa(direccion).  ' Caracas - Distrito Capital. ');
					$this->ubides='';
					$in=0;
			     }

			$this->Ln(5);
            $eof=2;
			$x='00';
			$x1='50';
			$x2='140';
			$y='126';
			 $this->SetXY($x,$y);
			 $this->setFont("Arial","",7);
			 $this->i2=1;
			   $this->SetXY(25,$y);
				 $this->multiCell(20,4,$this->i2);
				 $this->SetXY(35,$y);
				 $this->multiCell(75,4,$registro["desmue"]);
				 $this->SetXY(110,$y);
				 $this->multiCell(30,4,$registro["marmue"]);
				 $this->SetXY(140,$y);
				 $this->multiCell(30,4,$registro["sermue"]);
				 $this->SetXY(170,$y);
				 $this->multiCell(30,4,$registro["codmue"]);
				 $y=$y+4;
				 $this->i2++;

			//superior
			$this->line(15, 115, 200, 115);
			//titulo
			$this->line(15, 125, 200, 125);
			//inferior
			$this->line(15, 129+($eof*4), 200, 129+($eof*4));
			//izquierda
			$this->line(15, 115, 15, 129+($eof*4));
			//derecha
			$this->line(200, 115, 200, 129+($eof*4));
			//medio 1
			$this->line(35, 115, 35, 129+($eof*4));
			//medio 2
			$this->line(110, 115, 110, 129+($eof*4));
			//medio 3
			$this->line(140, 115, 140, 129+($eof*4));
			//medio 4
			$this->line(170, 115, 170, 129+($eof*4));
			$this->setFont("Arial","",9);
            $this->SetXY(15,115);
		    $this->Cell(20,5,'Cant.',0,0,'C');
		    $this->Cell(75,5,'Descripción del Producto',0,0,'C');
		    $this->Cell(30,4,'Marca',0,0,'C');
		    $this->Cell(30,4,'Serial',0,0,'C');
		    $this->Cell(30,4,'Nro del Bien',0,0,'C');
		    $this->Ln(40+($eof*4));
            $this->line(15, $this->GetY(), 75, $this->GetY());
            $this->line(120, $this->GetY(), 180, $this->GetY());
			$this->setFont("Arial","",7);
			$this->SetX(15);
			$this->Cell(60,5,"FIRMA DEL JEFE DE LA DEPENDENCIA EMISORA",0,0,'C');
			$this->SetX(120);
			$this->Cell(60,5,"FIRMA DEL JEFE DE LA DEPENDENCIA EMISORA",0,0,'C');
			$this->Ln();
			$this->SetX(15);
			$this->setFont("Arial","B",8);
			$this->Cell(60,5,$this->presides,0,0,'C');
			$this->SetX(120);
			$this->Cell(60,5,$this->dirgedes,0,0,'C');
			$this->Ln();
			$this->setFont("Arial","B",7);
			$Y=$this->GetY();
			$this->SetX(15);
			$this->multiCell(60,5,$this->presihas,0,'C');
			$this->SetXY(120,$Y);
			$this->multiCell(60,5,$this->dirgehas,0,'C');
			$this->Ln();
			$this->Ln();
			$this->line(15, $this->GetY(), 75, $this->GetY());
            $this->line(120, $this->GetY(), 180, $this->GetY());
			$this->setFont("Arial","",7);
			$this->SetX(15);
			$this->Cell(60,5,"FIRMA DE LA DEPENDECIA RECEPTOR",0,0,'C');
			$this->SetX(120);
			$this->Cell(60,5,"FIRMA DE LA UNIDAD DE BIENES NACIONALES",0,0,'C');
			$this->Ln();
			$this->SetX(15);
			$this->setFont("Arial","B",8);
			$this->Cell(60,5,$this->dirdes,0,0,'C');
			$this->SetX(120);
			$this->Cell(60,5,$this->abscrides,0,0,'C');
			$this->Ln();
			$this->setFont("Arial","B",7);
			$Y=$this->GetY();
			$this->SetX(15);
			$this->multiCell(60,5,$this->dishas,0,'C');
			$this->SetXY(120,$Y);
			$this->multiCell(60,5,$this->abscrihas,0,'C');
			$this->i++;
			if($this->i < $total)
			{
				$this->AddPage();
			}
			}
		}
	}
?>