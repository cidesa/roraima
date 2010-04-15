<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/modelo/sqls/ciudadanos/Atcasasi.class.php");
	class pdfreporte extends fpdf
	{
		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->cab = new Cabecera();
			$this->iddes=H::GetPost("iddes");
			$this->idhas=H::GetPost("idhas");
			$this->fechades=H::GetPost("fechades");
			$this->fechahas=H::GetPost("fechahas");
			$this->cedula=H::GetPost("cedula");
			$this->atcasasi = new Atcasasi();
		    $this->arrp = $this->atcasasi->Sqlp($this->iddes,$this->idhas,$this->fechades,$this->fechahas,$this->cedula);
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
			$this->setXY(10,40);
			$this->cell(15,8,"Oficio",1,0,"C");
			$this->cell(20,8,"Expediente",1,0,"C");
			$this->cell(100,4,"Datos del Solicitante",1,0,"C");
			$this->setXY(45,44);
				$this->cell(50,4,"Apellidos y Nombres",1,0,"C");
				$this->cell(20,4,"C.I.",1,0,"C");
				$this->cell(30,4,"Tipo de Ayuda",1,0,"C");
			$this->setXY(145,40);
				$this->cell(30,8,"Procedencia",1,0,"C");
				$this->cell(50,8,"Trabajor Social",1,0,"C");
				$this->cell(20,8,"Firma",1,0,"C");
				$this->cell(20,8,"Fecha",1,0,"C");
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
			$y = 48;
			foreach($this->arrp as $dato){
				$this->settextcolor(0,0,0);
				$this->setFont("Arial","B",7);
				$this->setXY(20,$y);
					$this->setFont("Arial","B",7);
					$this->setXY(10,$y);
					$this->cell(15,8,$dato["nroofi"],1,0,"C");
					$this->cell(20,8,$dato["nroexp"],1,0,"C");
					$this->cell(50,8,$dato["nombreciu"],1,0,"C");
					$this->cell(20,8,$dato["cedciu"],1,0,"C");
					$this->cell(30,8,$dato["desayu"],1,0,"C");
					$this->cell(30,8,$dato["proayu"],1,0,"C");
					$this->cell(50,8,$dato["nombretra"],1,0,"C");
					$this->cell(20,8," ",1,0,"C");
					$this->cell(20,8,$dato["fechaa"],1,0,"C");
				$y = $this->getY()+8;
			}
		}
	}
?>