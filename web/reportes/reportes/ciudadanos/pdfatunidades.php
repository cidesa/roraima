<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/modelo/sqls/ciudadanos/Atunidades.class.php");


	class pdfreporte extends fpdf
	{

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->cab = new Cabecera();
			$this->codunides=H::GetPost("codunides");
			$this->codunihas=H::GetPost("codunihas");
			$this->atunidades = new Atunidades();


		    $this->arrp = $this->atunidades->Sqlp($this->codunides,$this->codunihas);
			$this->llenartitulosmaestro();
			$this->setautoPagebreak(true,25);

		}

		function llenartitulosmaestro()
				{
				$this->titulosm[]="Código";
				$this->titulosm[]="Descripción";
				$this->titulosm[]="Dirección";
				$this->titulosm[]="Telefono";
				$this->titulosm[]="Contacto";
				$this->titulosm[]="Telefono del Contacto";
				$this->titulosm[]="Email";
				$this->titulosm[]="Horario";
				$this->anchosm=array(13,30,30,20,30,20,30,10);
				$this->alinem=array("C","L","L","L","L","L","L","L");
				}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			//$this->getCabecera(H::GetPost("titulo"),"");
			$this->settextcolor(155,0,0);
			$this->setFont("Arial","B",9);
			$this->setwidths($this->anchosm);
			$this->setaligns($this->alinem);

			$this->row($this->titulosm);
			$this->Line(10,$this->getY(),200,$this->getY());
			$this->ln();
			$this->setFont("Arial","",8);
			$this->settextcolor(0,0,0);
				$this->setwidths($this->anchosm);
				$this->setaligns($this->alinem);

		}

		function Cuerpo()
		{
			$tot_obr=0;
			$tot_gen=0;
			$this->setwidths($this->anchosm);
			$this->setaligns($this->alinem);
			foreach($this->arrp as $dato)
			{
				$this->rowM($dato);
			}

		}
	}
?>