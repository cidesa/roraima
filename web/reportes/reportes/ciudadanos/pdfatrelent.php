<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/modelo/sqls/ciudadanos/Atrelent.class.php");
	class pdfreporte extends fpdf
	{
		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->cab = new Cabecera();
			$this->iddes=H::GetPost("iddes");
			$this->idhas=H::GetPost("idhas");
			$this->fechades=H::GetPost("fechades");
			$this->cedula=H::GetPost("cedula");
			$this->atrelent = new Atrelent();
		    $this->arrp = $this->atrelent->Sqlp($this->iddes,$this->idhas,$this->fechades,$this->cedula);
			$this->llenartitulosmaestro();
			$this->setautoPagebreak(true,25);

/*print '<pre>';
						print_r(  $this->arrp);
						 print '</pre>';
					exit;*/
		}
		function llenartitulosmaestro(){
			// PARTE INFERIOR
				$this->titulosm[]="Apellidos y Nombres";
				$this->titulosm[]="Cédula";
				$this->titulosm[]="Apellidos y Nombres";
				$this->titulosm[]="Cédula";
				// PARTE SUPERIOR
					$this->tituloss[]="Datos del Solicitante";
					$this->tituloss[]="Datos del Beneficiario";
					$this->anchoss=array(80,80);
					$this->alines=array("C","C");
				$this->anchosm=array(60,20,60,20);
				$this->alinem=array("L","L","L","L",);
		}
		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s");
			//$this->getCabecera(H::GetPost("titulo"),"");
			$this->ln(10);
			$this->settextcolor(155,0,0);
			$this->setFont("Arial","B",9);
			$this->cell(20,8,"Expediente",1,0,"C");
			$pos = $this->getY();
				$this->setwidths($this->anchoss);
				$this->setaligns($this->alines);
				$this->setBorder(true);
				$this->setX(30);
				$this->row($this->tituloss);
			$this->setwidths($this->anchosm);
			$this->setaligns($this->alinem);
			$this->setBorder(true);
			$this->setX(30);
			$this->row($this->titulosm);
			$this->setXY(190,42);
			$this->cell(30,5,"Fecha",1,0,"C");
			$this->setXY(220,42);
			$this->cell(40,5,$this->fechades,1,0,"C");
			$this->setXY(190,$pos);
			$this->cell(30,8,"Tipo Ayuda",1,0,"C");
			$this->cell(40,8,"Procedencia",1,0,"C");
			$this->setFont("Arial","B",8);
			$this->settextcolor(0,0,0);
			$this->setY(55);
		}
		function Cuerpo()
		{
			$tot_obr=0;
			$tot_gen=0;
			$z=0;
			$q=0;
			$this->setwidths($this->anchosm);
			$this->setaligns($this->alinem);
			$id=$this->arrp[0]["id"]; //1
			$this->setFont("Arial","B",7);
			$y = 55;
			foreach($this->arrp as $dato)
			{
				$this->settextcolor(0,0,0);
				$this->setFont("Arial","B",7);
				$this->setXY(20,$y);
					$this->setFont("Arial","B",7);
					$this->setXY(10,$y);
					$this->cell(20,8,$dato["nroexp"],1,0,"C");
					$this->cell(60,8,$dato["nombreciu"],1,0,"C");
					$this->cell(20,8,$dato["cedciu"],1,0,"C");
					$this->cell(60,8,$dato["nombreben"],1,0,"C");
					$this->cell(20,8,$dato["cedciu"],1,0,"C");
					$this->cell(30,8,$dato["desayu"],1,0,"C");
					$this->cell(40,8,$dato["proayu"],1,0,"C");
				$y = $this->getY()+8;
			}
			$this->settextcolor(155,0,0);
			$this->setFont("Arial","B",9);
			// PARTE INFERIOR
			$q = $this->getY()+8;
				$this->setXY(10,$q);
				$this->setwidths($this->anchoss);
				$this->setaligns($this->alines);
				$this->cell(250,8,"RECIBIDO POR:",1,0,"C");
				// PARTE INFERIOR
				// APELLIDOS Y NOMBRES
				$y = $this->getY()+8;
					$this->setXY(10,$y);
					$this->cell(100,8,"Apellidos y Nombres",1,0,"C");
					$this->cell(50,8,"Cargos",1,0,"C");
					$this->cell(40,8,"Cedula",1,0,"C");
					$this->cell(60,8,"Firma",1,0,"C");
			// PARTE INFERIOR CABECERA PIE
			// APELLIDOS Y NOMBRES
			$this->settextcolor(0,0,0);
			$this->setFont("Arial","B",7);
			$z = $this->getY()+8;
				$this->setXY(10,$z);
				$this->cell(100,8,$dato["nomtrasoc"],1,0,"C");
				$this->cell(50,8," ",1,0,"C");
				$this->cell(40,8,$this->cedula,1,0,"C");
				$this->cell(60,8," ",1,0,"C");
		}
	}
?>