<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/modelo/sqls/ciudadanos/Atrecayu.class.php");


	class pdfreporte extends fpdf
	{

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->cab = new Cabecera();
			$this->desrubdes=H::GetPost("desrubdes");
			$this->desrubhas=H::GetPost("desrubhas");
			$this->atrecayu = new Atrecayu();


		    $this->arrp = $this->atrecayu->Sqlp($this->desrubdes,$this->desrubhas);
			$this->llenartitulosmaestro();
			$this->setautoPagebreak(true,25);

/*print '<pre>';
						print_r(  $this->arrp);
						 print '</pre>';
						exit;*/
		}

		function llenartitulosmaestro()
				{
				$this->titulosm[]="Descripcion del Rubro";
				$this->titulosm[]="Grupo de Rubro";
				$this->titulosm[]="Código del Recaudo";
				$this->titulosm[]="Descripción del Recaudo";
				$this->titulosm[]="Requerido";
				$this->anchosm=array(30,50,30,50,20);
				$this->alinem=array("C","L","C","L","C");
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
			$this->rowM(array($this->arrp[0]["desrub"],$this->arrp[0]["desgru"]));
			foreach($this->arrp as $dato)
			{
				if ($id!=$dato[id])
				 // titulos
				{
				$this->setFont("Arial","B",8);
				$this->setx(10);
				$this->rowM(array($dato["desrub"],$dato["desgru"]));
				}
				$this->setFont("Arial","",8);
				$this->setx(90);
				$this->rowM(array($dato["cod"],$dato["desrec"],$dato["req"]));
			    $id=$dato["id"];
			}

		}
	}
?>