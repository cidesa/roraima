<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/Herramientas.class.php");
	require_once("../../lib/modelo/sqls/ciudadanos/Atactamat.class.php");


	class pdfreporte extends fpdf{
		//created_at fecha

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->cab = new cabecera();
			$this->codexpdes=H::GetPost("codexpdes");
			$this->dire=H::GetPost("dire");
			$this->coor=H::GetPost("coor");
			$this->actamat = new Atactamat();
		    $this->arrp = $this->actamat->Sqlp($this->codexpdes);
		    $this->cal = $this->actamat->Sqlp($this->codexpdes,$this->codexphas);
			$this->llenartitulosmaestro();
			$this->setAutopagebreak(true,15);
			$this->detalle= true;
			$this->cabeza= true;
			$this->fir=true;
/*print '<pre>';
						print_r(  $this->arrp);
						 print '</pre>';
						exit;*/
		}

		function llenartitulosmaestro()
				{
				$this->anchosm=array(20,30,30,70);
				$this->alinem=array("C","L","C","L");
				}


function Pain(){
if ($this->cabeza==true)
	{
	$this->SetFillColor(200,200,200);
	$j=$this->gety();
	$this->Setxy(165,$j);
	$this->cell(35,5," EXP. ",0,0,"L",1);
	$this->sety(50);
	//$j=$this->gety();
	//$this->Sety($j);
	// columna 1
	$this->setFont("Arial","BI",7);
	$this->cell(112,5,"Por medio de la presente acta se deja constancia de la donacion efecutada al ciudadano (a):",0,0,"L");
				$this->ln(4);
				$this->setXY(10,55);
					$this->cell(33,5,"Cedula de Identidad Nro:",0,0,"L");
					$this->setxy(63,55);
					$this->cell(23,5,"Residenciada en:",0,0,"L");
						$this->setxy(156,55);
						$this->cell(15,5,"MCPIO:",0,0,"L");
					$this->setXY(10,60);
						$this->cell(105,5,"De los materiales de construccion que se especifican a continuacion, por un monto de:",0,0,"L");
						$this->setXY(10,65);
						$this->cell(12,5,"Para el:",0,0,"L");
							$this->setXY(67,65);
							$this->cell(8,5,"TLF:",0,0,"L");
				$this->ln(7);
			$this->Line(10,$this->getY(),200,$this->getY());

	}
	}// fin pain

	function firmas($recibe,$ci,$fecha,$dirciu,$telciu)
	{
	if ($this->fir==true)
	{
		$j=$this->gety();
		$this->Sety($j);
		$this->setFont("Arial","BI",8);
		$this->ln(10);
		$j=$this->gety();
		$this->setXY(10,$j-5);
		$this->cell(52,5,$this->coor,0,0,"L");
		$this->setXY(10,$j);
		$this->setFont("Arial","I",8);
		$this->cell(52,5,"Coordinador de Autoconstruccion",0,0,"L");
		$this->Setxy(130,$j-5);
		$this->setFont("Arial","BI",8);
		//--------------------------------------------------------------------------------
		$this->cell(52,5,$this->dire,0,0,"L");
		$this->Setxy(130,$j);
		$this->setFont("Arial","I",8);
		// --------------------------------------------------------------------------------
		$this->cell(78,4," Directora de la Secretaria del Despacho del Gobernador (E)",0,0,"L");
		$this->Setxy(130,$j+7);
		$this->setFont("Arial","I",7);
		$this->Line(10,$this->getY(),200,$this->getY());
		$this->Setxy(10,$j+7);
		$this->cell(78,4," El Beneficiario:",0,0,"L");
		$this->Setxy(15,$j+11);
		$this->cell(185,4,"1.- Se compromete a aportar la mano de obra y empezar " .
				"la ejecución de los trabajos en un lapso no mayor de (15) días " .
				"continuos contados a partir de la fecha de",0,0,"L");
		$this->Setxy(10,$j+15);
		$this->cell(185,4,"entrega del material.",0,0,"L");
		$this->Setxy(15,$j+19);
		$this->cell(185,4,"2.- En caso de que el beneficiario no ejecute los trabajos" .
				 " en el lapso indicado en la cláusula anterior, o dé un destino contrario al" .
				 "indicado en el presente acta, dichos",0,0,"L");
		$this->Setxy(10,$j+23);
		$this->cell(185,4,"materiales deberán ser devueltos en su totalidad a la Secretaría" .
				 "del Despacho del Gobernador, salvo en el caso de que el beneficiario haya " .
				 "alegado alguna eventualidad",0,0,"L");
		$this->setFont("Arial","I",7);
		$this->Setxy(10,$j+27);
		$this->cell(185,4,"por escrito y de manera inmediata a esta dependencia.",0,0,"L");
		$this->Setxy(15,$j+31);
		$this->cell(185,4,"3.- Los trabajadores de ejecución de la obra estarán bajo la" .
				 "inspección y supervisión del personal autorizado de la Secretaría del " .
				 "Despacho del Gobernador.",0,0,"L");
	}
	}
	function medicamentos()
	{
		//$this->titulosme array();
		$this->titulosme[]="CODIGO";
		$this->titulosme[]="DESCRIPCION";
		$this->titulosme[]="UNIDAD";
		$this->titulosme[]="CANTIDAD";
		$this->anchosme=array(20,120,30,20);
		$this->alineme=array("C","L","C","C");
		$this->setwidths($this->anchosme);
		$this->setaligns($this->alineme);
		$this->setBorder(true);
		$this->SetFillColor(200,200,200);
		$this->SetFillTable(1);
		$this->row($this->titulosme);
		//$this->ln(10);
	}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"]." ".$this->tipo,"p","s","n");
			$this->Pain();
			$this->settextcolor(155,0,0);
			$this->setFont("Arial","B",9);
			$this->settextcolor(0,0,0);
			$this->sety(50);
		}
		function Cuerpo()
		{
		$gra=false;
		$this->anchosme=array(20,120,30,30,);
		$this->alineme=array("C","L","C","C");
		$this->setwidths($this->anchosme);
		$this->setaligns($this->alineme);
			$tot_obr=0;
			$tot_gen=0;
			$nroexp='';
			$this->setFont("Arial","B",8);
			$i=0;
		foreach($this->arrp as $dato)
			{ //$i++;
				//print "cuantas".$i;

			 if ($nroexp!=$dato["nroexp"])
			 //titulos del acta
				{
// -----------------------------------------------------------------------------------------------------------------------------------------
				$acum=0;
				$this->setFont("Arial","B",7);
				$this->setxy(180,37);
				$this->cell(10,5,$dato["nroexp"] ,0,0,"L");
				$this->setFont("Arial","I",7);
				$this->setxy(30,51);
				//$this->cell(10,5,$dato["proveedor"]."-R.I.F-".$dato["rif"],0,0,"L");
				$this->setxy(122,50);
				$this->cell(45,5,$dato["nombresol"] ,0,0,"L");
//				$this->setxy(67,73);
				$this->setxy(43,55);
				$this->cell(20,5,$dato["cedciu"] ,0,0,"L");
				$this->setxy(86,55);
				$this->cell(70,5,$dato["direccion"] ,0,0,"L");
				$this->setxy(171,55);
				$this->cell(30,5,$dato["desmun"] ,0,0,"L");
				$this->setxy(22,65);
				$this->cell(45,5,$dato["proveedor"] ,0,0,"L");
				$this->setxy(75,65);
				$this->cell(30,5,$dato["telprov"] ,0,0,"L");
				// calculo pa la platica a patica
				foreach($this->cal as $cal){
					$acum+=$cal["totart"];
				}
				$escrito=H::obtenermontoescrito($acum);
				$this->setXY(115,60);
				$this->cell(85,5,"".$escrito." (Bs.".$acum.")" ,0,0,"L");
				//$this->ln(5);
				//$j=$this->gety();
				//$this->Sety($j);
				$this->sety(80);
				$this->medicamentos();
				$j=$this->gety();
				$this->Sety($j);
				$usuario=$dato["usuario"];
				$dir=$dato["dir"];
				$tel=$dato["tel"];
				}
//-----------------------detalle------------------------------------------------------------------------------------------------------//
				$this->setFont("Arial","",8);
				$this->setBorder(true);
				$this->SetFillTable(0);
				$this->rowM(array($dato["coddon"],$dato["desdon"],$dato["unidad"],$dato["canapr"]));// agregar monto y totalizar e iva
				$nroexp=$dato["nroexp"];
			//	$this->detalle= true;
				$this->fir= false;
				$gra=true;

			}

// ---------------VALIDACION IMPORTANTE POR QUE PUEDE BRINCAR LA PAGINA--------------------
//			if ($this->gety()>=300 )  //and $this->detallle==false debo preguntar si el detalla ya termino
//			{
//			$this->cabeza= false;
//			$this->fir= false;
//			} else
//			{
//			$this->cabeza= true;
//			$this->fir= true;
//			}
			if ($gra==true)
			{$this->ln(5);
			$j=$this->gety();
			$this->Sety($j);}
			else
			{
			$this->ln(60);
			$j=$this->gety();
			$this->Sety($j);
			}
			$this->fir= true;
			$this->firmas(" "," "," ",$dir,$tel);
			$this->setxy(10,255);
			$this->cell(10,5,$usuario,0,0,"L"); // aqui va el usuario q creo el reporte

		}
	}
?>