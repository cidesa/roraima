<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/modelo/sqls/nomina/Nprliqpresoc.class.php");

	class pdfreporte extends fpdf
	{

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->cab = new Cabecera();
			$this->bd=new basedatosAdo();
			$this->coddes=H::GetPost("codempdes");
			$this->codhas=H::GetPost("codemphas");
			$this->elab1=H::GetPost("elab1");
			$this->cielab1=H::GetPost("cielab1");
			$this->elab2=H::GetPost("elab2");
			$this->cielab2=H::GetPost("cielab2");
			$this->nomdirpla=H::GetPost("nomdirpla");
			$this->cidirpla=H::GetPost("cidirpla");
			$this->nomdirrec=H::GetPost("nomdirrec");
			$this->cidirrec=H::GetPost("cidirrec");
			$this->nomdiradm=H::GetPost("nomdiradm");
			$this->cidiradm=H::GetPost("cidiradm");
			$this->nomfunc=H::GetPost("nomfunc");
			$this->cifunc=H::GetPost("cifunc");

			$this->setautoPagebreak(true,10);
			$this->nprliqpresoc = new Nprliqpresoc();
		    $this->arrp = $this->nprliqpresoc->sqlp($this->coddes,$this->codhas);
			//H::printR($this->arrp);exit;

		}

		function Header()
		{

		$this->Image("../../img/logo_1.jpg",13,12,18);
		$this->setFont("Arial","",8);
		$this->setXY(30,13);
		$this->cell(50,4,"República Bolivariana de Venezuela",0,0,'L');
		$this->setXY(30,17);
		$this->cell(50,4,"Distrito Metropolitano de Caracas",0,0,'L');
		$this->setXY(30,21);
		$this->cell(50,4,"Contraloria Metropolitana",0,0,'L');
		$this->setXY(30,25);
		$this->cell(50,4,"Dirección de Recursos Humanos",0,0,'L');
		//PrimerCuadro
		$this->setXY(150,25);
		$this->setFont("Arial","B",6);
		$this->cell(60,5,"Fecha de Elaboración",1,0,'C');$this->ln();
		$this->setXY(150,30);
		$aux=split("/",date("d/m/Y"));
		$this->cell(20,4,"Dia",1,0,'C');$this->cell(20,4,"Mes",1,0,'C');$this->cell(20,4,"Año",1,0,'C');
		$this->ln();$this->setX(150);
		$this->setFont("Arial","",7);
		$this->cell(20,4,$aux[0],1,0,'C');$this->cell(20,4,$aux[1],1,0,'C');$this->cell(20,4,$aux[2],1,0,'C');
		$this->ln();$this->ln();
		$this->setFont("Arial","B",10);
		$this->cell(200,4,H::GetPost("titulo"),0,0,'C');

		}

		function Cuerpo()
		{
		$enter = "
		";
		$reg=1;
		$codemp="";
		$registro=count($this->arrp);

		foreach($this->arrp as $dato)
		{
			if($dato["codemp"]!=$codemp){


				$this->prestacion= $this->nprliqpresoc->asigna($dato["codemp"],"1");
				$this->asignaciones = $this->nprliqpresoc->asigna($dato["codemp"],"2");

				//H::PrintR($this->prestacion);exit;

				$this->anticipos = $this->nprliqpresoc->deduc($dato["codemp"],"1");
				$this->fide = $this->nprliqpresoc->deduc($dato["codemp"],"2");
				$this->dedt = $this->nprliqpresoc->deduc($dato["codemp"],"3");
				$this->salint = $this->nprliqpresoc->sqlsalint($dato["codemp"],$dato["codcar"],$dato["codnom"]);
				//Segundo Cuadro
				$reg++;
				$this->setXY(10,50);
				$this->setFont("Arial","B",8);
				$this->setwidths(array(200));
				$this->setaligns(array('C'));
				$this->setBorder(1);
				$this->row(array("DATOS PERSONALES"));
				$this->ln(2);
				$this->setFont("Arial","",6);
				$this->setwidths(array(150,50));
				$this->setaligns(array('L','L'));
				$this->setBorder(1);
				$this->row(array("Nombre: ".$dato["nombre"],"C.I: ".(int)$dato["cedemp"]));
				$this->setwidths(array(60,60,80));
				$this->setaligns(array('L','L','L'));
				$this->setBorder(1);
				$this->row(array("CARGO: ".$dato["nomcar"],"UBICACIÓN: ".$dato["ubicacion"],"MOTIVO: "));
				$this->setwidths(array(35,85,30,50));
				$this->setaligns(array('L','C','L','C'));
				$this->setBorder(1);
				$this->row(array("SALARIO MENSUAL NORMAL: ",H::FormatoMonto($this->salint[0]['campo']),"SALARIO DIARIO NORMAL: ",H::FormatoMonto($this->salint[0]['campo']/30)));
				$this->ln(2);
				$this->setwidths(array(120,20,20,40));
				$this->setaligns(array('C','C','C','C'));
				$this->setBorder(1);
				$this->setFont("Arial","B",6);
				$this->row(array("ORGANISMO O DEPENDENCIA","FECHA DE INGRESO","FECHA DE EGRESO","ANTIGUEDAD"));
				$this->setFont("Arial","",6);
				$this->row(array($dato["empresa"],$dato["fecing"],$dato["fecret"],$dato["ano"]." años ".$dato["mes"]." meses y ".$dato["dia"]." dias "));
				$this->cell(200,2,"",1,0);$this->ln();

				$this->setFont("Arial","B",8);
				$this->cell(200,4,"PRESTACIÓN DE ANTIGUEDAD",1,0,'C');$this->ln();
				$this->cell(200,0.5,"",1,0);$this->ln();
				$this->cell(200,1.5,"",1,0);$this->ln();
				$y=$this->getY();
				$this->rect(10,$y,35,8);
				$this->setXY(10,$y+2);
				$this->setwidths(array(35));
				$this->setaligns(array('C'));
				$this->setBorder(0);
				$this->setFont("Arial","B",7);
				$this->row(array($dato["ano"]." años ".$dato["mes"]." meses y ".$dato["dia"]." dias "));
				$this->setXY(45,$y);
				$this->setwidths(array(105,20,40));
				$this->setaligns(array('C','C','C'));
				$this->setBorder(1);
				$this->setFont("Arial","B",8);
				$this->arrm = $this->nprliqpresoc->sqlm($dato["codemp"]);
				//H::printR($tb3);exit;
				$this->row(array("CONCEPTO","DIAS","MONTO EN Bs."));
				$this->setX(45);
				$this->setaligns(array('L','C','R'));
				$this->setFont("Arial","B",6);
				//$this->row(array("Prestaciones de Antiguedad",$this->arrm[0]["diaart"],H::FormatoMonto($this->arrm[0]["monto108"])));
				$this->row(array("Prestaciones de Antiguedad",$this->prestacion[0]["dias"],H::FormatoMonto($this->prestacion[0]["monto"])));
				$this->ln(2);

				$this->setFont("Arial","B",8);
				$this->setwidths(array(200));
				$this->setaligns(array('C'));
				$this->setBorder(1);
				$this->total=0;
				$this->row(array("ASIGNACIONES"));
				$this->cell(200,1.5,"",1,0);$this->ln();
				$this->setwidths(array(60,80,60));
				$this->setaligns(array('C','C','C'));
				$this->setBorder(1);
				$this->setFont("Arial","B",6);
				$this->row(array("CONCEPTOS","DIAS A CANCELAR","MONTO Bs."));
				$this->setFont("Arial","",6);
				$this->setaligns(array('L','C','R'));
				#$this->row(array("PRESTACIÓN DE ANTIGUEDAD",$this->prestacion[0]["dias"],H::FormatoMonto($this->prestacion[0]["monto"])));
				$acumasig = 0;

				//$this->total=$this->arrm[0]["monto108"]+$this->arrm[0]["int108"];

				//$this->row(array("INTERES FIDEICOMISO","",""));
				//$this->cell(60,4,"Interés del Fideicomiso",1,0,'L');$this->cell(80,4,"",1,0,'L',1);$this->cell(60,4,H::FormatoMonto($this->arrm[0]["int108"]),1,0,'R');$this->ln();
				#$this->cell(60,4,"Interés del Fideicomiso",1,0,'L');$this->cell(80,4,"",1,0,'L',1);$this->cell(60,4,H::FormatoMonto(""),1,0,'R');$this->ln();
				$this->setwidths(array(60,80,60));
				$this->setaligns(array('C','C','C'));
				$this->setBorder(1);
				$this->setFont("Arial","",6);
				$diario=$dato["suecar"]/30;


				$this->setwidths(array(60,80,60));
				$this->setaligns(array('L','C','R'));
				$this->setBorder(1);
				foreach($this->asignaciones as $asig)

				{
					$acumasig = $acumasig + $asig["monto"];
					$this->row(array($asig["concepto"],$asig["dias"],H::FormatoMonto($asig["monto"])));
				}

				$this->total= $acumasig ;
				$this->arrvac = $this->nprliqpresoc->sqlvac($dato["codemp"]);




				}


				$this->setX(70);
				$this->setwidths(array(80,60));
				$this->setaligns(array('C','R'));
				$this->setBorder(1);
				$this->setFont("Arial","B",6);
				$this->row(array("TOTAL ASIGNACIONES",H::FormatoMonto($this->total)));
				$this->ln(3);
				$this->setFont("Arial","B",8);
				$this->setwidths(array(200));
				$this->setaligns(array('C'));
				$this->setBorder(1);
				$this->row(array("DEDUCCIONES"));
				$this->setwidths(array(160,40));
				$this->setaligns(array('R','R'));
				$this->setBorder(1);
				$totaldeduc=0;
				$this->setFont("Arial","B",6);
				//Query para calcular abonado al fideicomiso
				$fideicomiso=$this->bd->select("");
				$this->row(array("TOTAL ANTICIPOS DE PRESTACIONES SOCIALES  ",H::FormatoMonto($this->anticipos[0]["monto"])));
				$tototrasded = abs($this->dedt[0]["monto"]-($this->fide[0]["monto"]+$this->anticipos[0]["monto"]));
				$totaldeduc=$this->anticipos[0]["monto"]+$this->fide[0]["monto"]+$tototrasded;
				$this->row(array("Total abonado al Fideicomiso  ",H::FormatoMonto($this->fide[0]["monto"])));
				$this->row(array("Otras Deducciones  ",H::FormatoMonto($tototrasded)));
				$this->row(array("TOTAL A DEDUCIR EN LIQUIDACIÓN  ",H::FormatoMonto($totaldeduc)));
				$this->ln(2);
				$this->setwidths(array(140,60));
				$this->setaligns(array('R','R'));
				$this->setBorder(1);
				$this->row(array("TOTAL NETO A PAGAR POR LIQUIDACIÓN Bs.  ",H::FormatoMonto($this->total-$totaldeduc)));
				$this->ln(2);
				$this->setFont("Arial","B",6);
				$this->cell(200,5,"ELABORADO POR: ",1,0,'L');$this->ln();
				$this->cell(200,4,"NOMBRES Y APELLIDOS",1,0,'L');$this->ln();
				$y1=$this->getY();
				$this->setXY(10,$y1);
				$this->setFont("Arial","",7);
				$this->cell(100,3,$this->elab1,0,0,'L');
				$this->cell(100,3,$this->elab2,0,0,'L');$this->ln();
				$this->cell(100,3,$this->cielab1,0,0,'L');
				$this->cell(100,3,$this->cielab2,0,0,'L');
				$this->cell(100,3,"",0,0,'L');
				$this->cell(100,3,"",0,0,'L');$this->ln();
				$this->cell(100,3,"",0,0,'L');
				$this->cell(100,3,"",0,0,'L');$this->ln();
				$this->cell(100,3,"",0,0,'L');
				$this->cell(100,3,"",0,0,'L');$this->ln();
				$this->setFont("Arial","B",6);
				$this->cell(100,3,"Firma:",0,0,'L');
				$this->cell(100,3,"Firma",0,0,'L');$this->ln();
				$this->rect(10,$y1,200,15);
				$this->setY($y1+15);
				$this->cell(100,5,"DISPONIBILIDAD PRESUPUESTARIA: ",1,0,'L');
				$this->cell(100,5,"REVISADO POR: DIRECCIÓN DE PERSONAL",1,0,'L');$this->ln();
				$this->cell(100,4,"Directora de Planificación, Presupuesto y Control de Gestión",1,0,'L');
				$this->cell(100,4,"Directora de Recursos Humanos",1,0,'L');$this->ln();
				$y2=$this->getY();
				$this->setXY(10,$y2);
				$this->setFont("Arial","",7);
				$this->cell(100,3,$this->nomdirpla,0,0,'L');
				$this->cell(100,3,$this->nomdirrec,0,0,'L');$this->ln();
				$this->cell(100,3,$this->cidirpla,0,0,'L');
				$this->cell(100,3,$this->cidirrec,0,0,'L');
				$this->cell(100,3,"",0,0,'L');
				$this->cell(100,3,"",0,0,'L');$this->ln();
				$this->cell(100,3,"",0,0,'L');
				$this->cell(100,3,"",0,0,'L');$this->ln();
				$this->cell(100,3,"",0,0,'L');
				$this->cell(100,3,"",0,0,'L');$this->ln();
				$this->setFont("Arial","B",6);
				$this->cell(100,3,"Firma y Sello:",0,0,'L');
				$this->cell(100,3,"Firma y Sello",0,0,'L');$this->ln();
				$this->rect(10,$y2,100,15);$this->rect(110,$y2,100,15);
				$this->setY($y2+15);
				$this->cell(100,4,"CONFORME: DIRECTOR DE ADMINISTRACIÓN ",1,0,'L');
				$this->cell(100,4,"NOMBRE Y APELLIDO DEL FUNCIONARIO (A)",1,0,'L');$this->ln();
				$y3=$this->getY();
				$this->setXY(10,$y3);
				$this->setFont("Arial","",7);
				$this->cell(100,3,$this->nomdiradm,0,0,'L');
				$this->cell(100,3,$this->nomfunc,0,0,'L');$this->ln();
				$this->cell(100,3,$this->cidiradm,0,0,'L');
				$this->cell(100,3,$this->cifunc,0,0,'L');
				$this->cell(100,3,"",0,0,'L');
				$this->cell(100,3,"",0,0,'L');$this->ln();
				$this->cell(100,3,"",0,0,'L');
				$this->cell(100,3,"",0,0,'L');$this->ln();
				$this->cell(100,3,"",0,0,'L');
				$this->cell(100,3,"",0,0,'L');$this->ln();
				$this->setFont("Arial","B",6);
				$this->cell(100,3,"Firma y Sello:",0,0,'L');
				$this->cell(100,3,"",0,0,'L');$this->ln();
				$this->rect(10,$y3,100,15);$this->rect(110,$y3,100,15);
				$this->setY($y3+15);
				$this->cell(100,4,"FIRMA DEL FUNCIONARIO (A): ",1,0,'L');
				$this->cell(100,4,"OBSERVACIONES",1,0,'L');$this->ln();
				$this->rect(10,$this->getY(),100,10);$this->rect(110,$this->getY(),100,10);
				$this->setY($this->getY()+12);
				$this->setFont("Arial","",6);
				$this->cell(50,3,"cc. Funcionario (a) ",0,0,'L');$this->ln();
				$this->cell(50,3,"Expediente",0,0,'L');$this->ln();
				$this->cell(50,3,"Dirección de Administracion",0,0,'L');

				if ($reg<=$registro)
		   		{
		   		$this->addpage();
		   		}

		}


		}

		}//Fin cuerpo

	   //Fin de la Clase
?>