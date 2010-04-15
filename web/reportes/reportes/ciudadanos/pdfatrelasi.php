<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/modelo/sqls/ciudadanos/Atrelvis.class.php");
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
			$this->atrelvis = new Atrelvis();
		    $this->arrp = $this->atrelvis->Sqlp($this->iddes,$this->idhas,$this->fechades,$this->cedula);
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
			$this->setXY(10,42);
				$this->cell(30,4,"MUNICIPIO",1,0,"C");
				$this->cell(55,4," ",1,0,"C");
				$this->cell(25,4,"FECHA",1,0,"C");
				$this->cell(25,4," ",1,0,"C");
				$this->cell(32,4,"HORA DE SALIDA",1,0,"C");
				$this->cell(25,4," ",1,0,"C");
				$this->cell(33,4,"HORA DE LLEGADA",1,0,"C");
				$this->cell(25,4," ",1,0,"C");
				$this->setXY(40,46);
				$this->cell(220,4,"DATOS DEL SOLICITANTE",1,0,"C");
				$this->setY(46);
				$this->cell(10,12,"N",1,0,"C");
				$this->cell(20,12,"Expediente",1,0,"C");
				// DATOS DEL SOLICITANTE
				$this->setXY(40,50);
					$this->cell(50,8,"Apellidos y Nombres",1,0,"C");
					$this->cell(25,8,"C.I.",1,0,"C");
					$this->cell(75,8,"Dirección",1,0,"C");
					$this->cell(25,8,"Télefono",1,0,"C");
					$this->cell(25,8,"Firma",1,0,"C");
					$this->cell(20,8,"Huella",1,0,"C");
			$this->setY(58);
		}
		function Cuerpo()
		{
			$tot_obr=0;
			$tot_gen=0;
			$this->setwidths($this->anchosm);
			$this->setaligns($this->alinem);
			$id=$this->arrp[0]["id"]; //1
			$this->setFont("Arial","B",7);
			$y = 58;
			$cont = 0;
			foreach($this->arrp as $dato)
			{
				$cont ++;
				$this->setXY(10,$y);
				$this->cell(10,10,$cont,1,0,"C");
				$this->cell(20,10,$dato["nroexp"],1,0,"C");
				$this->cell(50,10,$dato["nombreciu"],1,0,"C");
				$this->cell(25,10,$dato["cedciu"],1,0,"C");
				$this->cell(75,10,$dato["dirhab"],1,0,"C");
				$this->cell(25,10,$dato["telhab"],1,0,"C");
				$this->cell(25,10," ",1,0,"C");
				$this->cell(20,10," ",1,0,"C");
				$y = $this->getY()+10;
			}
			$this->settextcolor(155,0,0);
			$this->setFont("Arial","B",9);
			// PARTE INFERIOR
			$q = $this->getY()+10;
				$this->setXY(10,$q);
				$this->setwidths($this->anchoss);
				$this->setaligns($this->alines);
				$this->cell(250,8,"DATOS DE LA TRABAJADORA SOCIAL",1,0,"C");
				// PARTE INFERIOR
				// APELLIDOS Y NOMBRES
				$y = $this->getY()+8;
					$this->setXY(10,$y);
					$this->cell(100,8,"Apellidos y Nombres",1,0,"C");
					$this->cell(40,8,"C.I.",1,0,"C");
					$this->cell(50,8,"CTS",1,0,"C");
				 	$this->cell(60,8,"Firma",1,0,"C");
			// PARTE INFERIOR CABECERA PIE
			// APELLIDOS Y NOMBRES
			$this->settextcolor(0,0,0);
			$this->setFont("Arial","B",7);
			$z = $this->getY()+8;
				$this->setXY(10,$z);
				$this->cell(100,8,$dato["nomtrasoc"],1,0,"C");
				$this->cell(40,8,$this->cedula,1,0,"C");
				$this->cell(50,8," ",1,0,"C");
				$this->cell(60,8," ",1,0,"C");
		}
	}
?>