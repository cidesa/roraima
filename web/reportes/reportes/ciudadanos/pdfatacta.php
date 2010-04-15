<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/Herramientas.class.php");
	require_once("../../lib/modelo/sqls/ciudadanos/Atacta.class.php");


	class pdfreporte extends fpdf
	{
		//created_at fecha

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->cab = new cabecera();
			$this->codexpdes=H::GetPost("codexpdes");
			$this->codexphas=H::GetPost("codexphas");
			$this->dire=H::GetPost("dire");

			$this->acta = new Atacta();
		    $this->arrp = $this->acta->Sqlp($this->codexpdes,$this->codexphas);
		    $this->cal = $this->acta->Sqlp($this->codexpdes,$this->codexphas);
			$this->llenartitulosmaestro();
			$this->setAutopagebreak(true,15);
			$this->detalle= true;
			$tipo='MEDICAMENTOS';
			$this->cabeza= true;
			$this->fir=true;
			$this->tipo=$this->arrp[0]["tipo"]; // la primera vez
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

	$j=$this->gety();
	$this->Sety($j);
	// columna 1
	$this->setFont("Arial","BI",8);
	$this->cell(200,7,"SENORES: ",1,1,"L");
	$this->ln(2);
	$j=$this->gety();
	$this->Sety($j);
	$this->setFont("Arial","B",7);
	$this->cell(200,5," DATOS DEL BENEFICIARIO ",1,1,"C",1);
	//
	$this->cell(110,7,"SIRVASE ENTREGAR AL CIUDADANO(A): ",1,0,"L");
	$this->cell(90,7,"TITULAR DE LA C.I.Nro.: ",1,1,"L");
	$this->ln(7);
	$this->cell(200,5,"CONCEPTO  ",1,1,"C",1);
	$this->Rect(10,$j,200,50);
	/*$this->ln(30);
	$j=$this->gety();
	$this->Sety($j);
	$this->cell(200,7," COLABORACION Q SE CONCEDE POR UN MONTO DE" ,0,1,"L");
	$this->Rect(10,$j,200,25);*/
	}
	}// fin pain

	function firmas($recibe,$ci,$fecha,$dirciu,$telciu)
	{
	if ($this->fir==true)
	{
	$j=$this->gety();
	$this->Sety($j);
	$this->setFont("Arial","BI",8);
	$this->cell(200,7," FIRMA AUTORIZADA:" ,0,1,"L");

	$this->ln(10);
	$j=$this->gety();

	$this->Setxy(80,$j-5);
	$this->setFont("Arial","BI",8);
	$this->cell(50,7,$this->dire,0,0,"C");

	$this->Setxy(80,$j);
	$this->setFont("Arial","I",8);
	$this->multicell(50,4," Directora de la Secretaria del Despacho del Gobernador",0,"C");

	$this->ln(15);
	$j=$this->gety();
	$this->Setxy(10,$j);
	$this->setFont("Arial","BI",8);
	$this->cell(200,7," RECIBE CONFORME:  ".$recibe ,0,0,"L"); $this->line(45,$j+6,200,$j+6);
	$this->ln(5);
	$this->Setxy(10,$j+12);
	$this->cell(10,7," C.I. Nro.: ".$ci ,0,0,"L"); $this->line(25,$j+17,90,$j+17);
	$this->Setx(90);
	$this->cell(10,7,"FECHA:  ".$fecha ,0,0,"L"); $this->line(100,$j+17,140,$j+17);
	$this->Setx(139);
	$this->cell(10,7," HUELLAS:" ,0,0,"L"); $this->line(155,$j+17,200,$j+17);

	$this->ln(10);

	$this->setFont("Arial","BI",6);
	$this->cell(10,7," Nota: Esta orden va sin enmienda y caduca a los 15 dias despues de la fecha de emision" ,0,0,"L");
	$this->setFont("Arial","I",8);
	$this->ln(7);
	$this->cell(10,7,"Direccion:    " .$dirciu ,0,0,"L");
	$this->ln(7);
	$this->cell(10,7,"Telefono:   " .$telciu,0,0,"L");

	}


	}
	function medicamentos()
	{
		//$this->titulosme array();
		$this->titulosme[]="CODIGO";
		$this->titulosme[]="DESCRIPCION";
		$this->titulosme[]="UNIDAD";
		$this->titulosme[]="CANTIDAD";
		$this->anchosme=array(20,120,30,30,);
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
//-----------------Validacion para los tipos de beneficiarios------------------------------------------------------------------
				if ($dato["soli"]!=$dato["bene"]){
				$this->benefi = $this->acta->Sqlbenefi($dato["bene"]);
				$this->setFont("Arial","B",7);
				$this->setxy(10,71);
				$this->cell(100,7,"PARA EL BENEFICIARIO :      ".$this->benefi[0]["nomciu"] ,1,0,"L");
				if ($this->benefi[0]["cedciu"]==" ") // si es un menor
				{
				$this->setxy(110,71);
				$this->cell(100,7,"NO POSEE" ,1,0,"L");
				}
				else{
				$this->setxy(110,71);
				$this->cell(100,7,"TITULAR DE LA C.I.Nro.:        ".$this->benefi[0]["cedciu"] ,1,0,"L");
				}

				} else// si es el mismo solicitante = beneficiario
				{
				$this->setxy(10,71);
				$this->cell(100,7,"PARA EL BENEFICIARIO :      EL MISMO" ,1,0,"L");
				}
// -----------------------------------------------------------------------------------------------------------------------------------------

				$this->tipo=$dato["tipo"]; // para la segunda vez en adelante
				$acum=0;
				$this->setFont("Arial","B",10);
				$this->setxy(180,37);
				$this->cell(10,5,$dato["nroexp"] ,0,0,"L");
				$this->setFont("Arial","B",7);
				$this->setxy(30,51);
				$this->cell(10,5,$dato["proveedor"]."-R.I.F-".$dato["rif"],0,0,"L");
				$this->setxy(63,65);
				$this->cell(50,5,$dato["nombreciu"] ,0,0,"L");
//				$this->setxy(67,73);
				$this->setxy(145,65);
				$this->cell(50,5,"       ".$dato["cedciu"] ,0,0,"L");
				$this->setxy(10,84);
				$this->setFont("Arial","I",6);
				// calculo pa la platica a patica
				foreach($this->cal as $cal){
				$acum+=$cal["totart"];
				}
				$escrito=H::obtenermontoescrito($acum);
				$this->multicell(200,3.5," COLABORACION Q SE CONCEDE POR UN MONTO DE ".$escrito." (Bs.".$acum.")". " SEGUN PRESUESTO ANEXO, POR CONCEPTO DE " .strtoupper($dato["motayu"]) ,0,"J");
				//$this->ln(5);
				//$j=$this->gety();
				//$this->Sety($j);
				$this->sety(105);
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
			//$this->firmas("amanda","16899391","15/07/2006");
			$this->firmas(" "," "," ",$dir,$tel);


			$this->setxy(10,255);
			$this->cell(10,5,$usuario,0,0,"L"); // aqui va el usuario q creo el reporte


		}
	}
?>