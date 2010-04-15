<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/modelo/sqls/ciudadanos/Atcasrem.class.php");
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
			$this->atcasrem = new Atcasrem();
		    $this->arrp = $this->atcasrem->Sqlp($this->iddes,$this->idhas,$this->fechades,$this->cedula);
			$this->setautoPagebreak(true,25);

/*print '<pre>';
						print_r(  $this->arrp);
						 print '</pre>';
					exit;*/
		}
		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s");
			//$this->getCabecera(H::GetPost("titulo"),"");
			$this->settextcolor(155,0,0);
			$this->setFont("Arial","B",9);
			$this->ln(5);
			$this->setX(170);
			$this->cell(50,8,"Fecha",1,0,"C");
			$this->cell(40,8,$this->fechades,1,0,"C");
			$this->setXY(10,50);
			$this->cell(20,8,"Expediente",1,0,"C");
			$this->cell(110,4,"Datos de Solicitante",1,0,"C");
			$this->setXY(30,54);
				$this->cell(60,4,"Apellidos y Nombres",1,0,"C");
				$this->cell(20,4,"C.I.",1,0,"C");
				$this->cell(30,4,"Tipo de Ayuda",1,0,"C");
			$this->setXY(140,50);
			$this->cell(30,8,"Procedencia",1,0,"C");
			$this->cell(50,8,"Trabajadora Social",1,0,"C");
			$this->cell(40,8,"Observaciones",1,0,"C");
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
			$y = 58;
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
					$this->cell(30,8,$dato["desayu"],1,0,"C");
					$this->cell(30,8,$dato["proayu"],1,0,"C");
					$this->cell(50,8,$dato["nombretra"],1,0,"C");
					$this->cell(40,8," ",1,0,"C");
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
				$this->cell(100,8,$dato["nombrecor"],1,0,"C");
				$this->cell(50,8," ",1,0,"C");
				$this->cell(40,8,$this->cedula,1,0,"C");
				$this->cell(60,8," ",1,0,"C");
		}
	}
?>