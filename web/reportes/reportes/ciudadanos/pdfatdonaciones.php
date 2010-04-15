<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/modelo/sqls/ciudadanos/Atdonaciones.class.php");


	class pdfreporte extends fpdf
	{

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->cab = new Cabecera();
			$this->coddondes=H::GetPost("coddondes");
			$this->coddonhas=H::GetPost("coddonhas");
			$this->codiddes=H::GetPost("codiddes");
			$this->codidhas=H::GetPost("codidhas");



			$this->atdonaciones = new Atdonaciones();


		    $this->arrp = $this->atdonaciones->Sqlp($this->coddondes,$this->coddonhas,$this->codiddes,$this->codidhas);
			$this->llenartitulosmaestro();
			$this->setautoPagebreak(true,25);

/*print '<pre>';
						print_r(  $this->arrp);
						 print '</pre>';
						exit;*/
		}

		function llenartitulosmaestro()
				{
				$this->titulosm[]="Cod. Grupo";
				$this->titulosm[]="Grupo";
				$this->titulosm[]="Código";
				$this->titulosm[]="Descripción";
				$this->anchosm=array(20,30,30,70);
				$this->alinem=array("C","L","C","L");
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

			$id=$this->arrp[0]["id"]; //1
			// el primero
			$this->setFont("Arial","B",8);
			$this->rowM(array($this->arrp[0]["id"],$this->arrp[0]["des"]));
			foreach($this->arrp as $dato)
			{
				if ($id!=$dato[id])
				 // titulos
				{
				$this->setFont("Arial","B",8);
				$this->setx(10);
				$this->rowM(array($dato["id"],$dato["des"]));
				}
				$this->setFont("Arial","",8);
				$this->setx(70);
				$this->rowM(array($dato["cod"],$dato["desdon"]));
			$id=$dato["id"];
			}

		}
	}
?>