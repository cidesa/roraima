<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/modelo/sqls/ciudadanos/Attipayu.class.php");


	class pdfreporte extends fpdf
	{

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->cab = new Cabecera();
			$this->codayudes=H::GetPost("codayudes");
			$this->codayuhas=H::GetPost("codayuhas");
			$this->codpredes=H::GetPost("codpredes");
			$this->codprehas=H::GetPost("codprehas");
			$this->attipayu = new Attipayu();
		    $this->arrp = $this->attipayu->Sqlp($this->codayudes,$this->codayuhas,$this->codpredes,$this->codprehas);
			$this->llenartitulosmaestro();
			$this->setautoPagebreak(true,25);

		}

		function llenartitulosmaestro()
				{
				$this->titulosm[]="Código";
				$this->titulosm[]="Descripción de la Donacion";
				$this->titulosm[]="Codigo Presupuestario";
				$this->anchosm=array(30,100,40);
				$this->alinem=array("C","L","R");
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
			$this->ln(2);
			$this->Line(10,$this->getY(),200,$this->getY());
			$this->ln();
			$this->setFont("Arial","",8);
			$this->settextcolor(0,0,0);
		//	if($this->maedet=='M')
			//{
				$this->setwidths($this->anchosm);
				$this->setaligns($this->alinem);
			//}
		}

		function Cuerpo()
		{
			$tot_obr=0;
			$tot_gen=0;
			$this->setwidths($this->anchosm);
			$this->setaligns($this->alinem);
			foreach($this->arrp as $dato)
			{
				$this->row($dato);
			}

		}
	}
?>