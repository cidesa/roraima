<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/Herramientas.class.php");
	require_once("../../lib/modelo/sqls/ciudadanos/Atactacom.class.php");
	class pdfreporte extends fpdf{
		//created_at fecha

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->cab = new cabecera();
			$this->codexpdes=H::GetPost("codexpdes");
			$this->dire=H::GetPost("dire");
			$this->cedula=H::GetPost("cedula");
			$this->actacom = new Atactacom();
		    $this->arrp = $this->actacom->Sqlp($this->codexpdes);
		    $id=$this->arrp[0]["atbenefi"];
		    $this->cal = $this->actacom->Sqlbenefi($id);
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
	$this->sety(50);
	//$j=$this->gety();
	//$this->Sety($j);
	// columna 1
	$this->setFont("Arial","BI",7);

	}
	}// fin pain

	function firmas($recibe,$ci,$fecha,$dirciu,$telciu)
	{
	if ($this->fir==true)
	{
		$this->setFont("Arial","BI",8);
		$this->ln(90);
		$j=$this->gety();
		$this->setXY(13,$j-20);
		$this->cell(52,5,"Entrega:",0,0,"L");
		$this->setXY(13,$j-5);
		$this->cell(52,5,$this->dire,0,0,"L");
		$this->setXY(13,$j);
		$this->setFont("Arial","I",8);
		$this->cell(52,5,"Directora de la Secretaria del Despacho del Gobernador",0,0,"L");
		$this->setFont("Arial","BI",8);
		$this->setXY(140,$j-20);
		$this->cell(52,5,"Recibe:",0,0,"L");
		$this->setXY(140,$j-5);
		$this->cell(52,5,$this->arrp[0]["nombreben"],0,0,"L");
		$this->setFont("Arial","I",8);
		$this->setXY(140,$j);
		$this->cell(52,5,"C.I: ".$this->cedula,0,0,"L");
		$this->setFont("Arial","BI",8);
		//--------------------------------------------------------------------------------
		$this->Setxy(130,$j);
		$this->setFont("Arial","I",8);
	}
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
		$this->anchosme=array(20,120,30,30);
		$this->alineme=array("C","L","C","C");
		$this->setFont("Arial","I",12);
		$this->setwidths($this->anchosme);
		$this->setaligns($this->alineme);
			$nroexp='';
			$this->setFont("Arial","B",8);
			$i=0;
		foreach($this->arrp as $dato)
			{
			 if ($nroexp!=$dato["nroexp"]){
				$acum=0;
				$this->setFont("Arial","I",9);
				$this->setxy(86,55);
				foreach($this->cal as $cal){
				$acum+=$cal["totart"];
				}
				$escrito=H::obtenermontoescrito($acum);
				$this->setXY(103,69);
				$this->sety(80);
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
				$nroexp=$dato["nroexp"];
				$this->fir= false;
				$gra=true;

			}
		$this->setXY(5,45);
		$this->setFont("Arial","",12);
		$this->ln(10);
		$this->multicell(190,8,"    En San Cristobal, Parroquia San Sebastian, Municipio San Cristobal, " .
		"del Estado Tachira, reunidos la ".$this->dire.", Directora de la Secretaria del Despacho del " .
		"Gobernador y la Ciudadana: ".$this->arrp[0]["nombresol"].", a quien se le dona la cantidad de:" .
		"".$escrito." (Bs.".$acum."), por concepto de ayuda economica para gastos de manutencio, segun " .
		"la solicitud N° ".$nroexp." a favor de: ".$this->arrp[0]["nombreben"].", comprometiendose en " .
		"este acto a consignar ante este que debe traer Despacho las respectivas facturas de rendicion " .
		"del gastos, las cuales deben contener: el Rif del Establecimiento, nombre del establecimiento," .
	    " sello de la empresa, monto y debe decir pagado, cabe destacar que todas las facturas deben " .
	    "venir a nombre del solicitante.",0,"J",0);
			if ($gra==true)
			{
				$this->ln(5);
				$j=$this->gety();
				$this->Sety($j);
			}
			else
			{
				$this->ln(60);
				$j=$this->gety();
				$this->Sety($j);
			}
			$this->fir= true;
			$this->firmas(" "," "," ",$dir,$tel);
			$this->setxy(10,255);
			$this->cell(10,5,$usuario,0,0,"L");
		}
	}
?>