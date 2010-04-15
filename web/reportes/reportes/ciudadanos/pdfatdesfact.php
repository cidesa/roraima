<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/modelo/sqls/ciudadanos/Atdesfact.class.php");

	class pdfreporte extends fpdf
	{
		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->cab = new Cabecera();
			$this->iddes=H::GetPost("iddes");
			$this->idhas=H::GetPost("idhas");
			$this->atdesfact = new Atdesfact();
		    $this->arrp = $this->atdesfact->Sqlp($this->iddes,$this->idhas);
			$this->setautoPagebreak(true,25);

/*print '<pre>';
						print_r(  $this->arrp);
						 print '</pre>';
					exit;*/
		}
		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s");
			$this->settextcolor(155,0,0);
			$this->setFont("Arial","B",9);
			$this->ln(5);
			$this->cell(12,8,"N° EXP",1,0,"C");
			$this->cell(20,8,"N° S.P.D.",1,0,"C");
			$this->cell(50,8,"PROVEEDOR O BENEFICIARIO",1,0,"C");
			$this->cell(20,8,"MES",1,0,"C");
			$this->cell(40,8,"NUMERO FACTURA",1,0,"C");
			$this->cell(50,8,"BASE IMPONIBLE PARA EL IVA",1,0,"C");
			$this->cell(20,8,"IVA",1,0,"C");
			$this->cell(30,8,"TOTAL FACTURA",1,0,"C");
			$this->cell(20,8,"EXENTOS",1,0,"C");
		}
		function Cuerpo()
		{
			foreach($this->arrp as $dato)
			{
				$this->ln();
				if($dato["nrospd"]!=$anterior){
					$this->setFont("Arial","",8);
					$this->cell(12,8,$dato["nroexp"],1,0,"C");
					$this->cell(20,8,$dato["nrospd"],1,0,"C");
					$this->cell(50,8,$dato["nompro"],1,0,"C");
					$this->cell(20,8,"",1,0,"C");
					$this->cell(40,8,$dato["numfac"],1,0,"C");
					$this->setFont("Arial","B",8);
					$this->cell(50,8,$dato["basimp"],1,0,"C");
					$this->setFont("Arial","",8);
					$this->cell(20,8,$dato["iva"],1,0,"C");
					$this->setFont("Arial","B",8);
					$this->cell(30,8,$dato["total"],1,0,"C");
					$this->setFont("Arial","",8);
					$this->cell(20,8,$dato["exentos"],1,0,"C");
				}else{
					$this->cell(12,8,"",1,0,"C");
					$this->cell(20,8,"",1,0,"C");
					$this->cell(50,8,"",1,0,"C");
					$this->cell(20,8,"",1,0,"C");
					$this->cell(40,8,$dato["numfac"],1,0,"C");
					$this->setFont("Arial","B",8);
					$this->cell(50,8,$dato["basimp"],1,0,"C");
					$this->setFont("Arial","",8);
					$this->cell(20,8,$dato["iva"],1,0,"C");
					$this->setFont("Arial","B",8);
					$this->cell(30,8,$dato["total"],1,0,"C");
					$this->setFont("Arial","",8);
					$this->cell(20,8,$dato["exentos"],1,0,"C");

				}
			$anterior = $dato["nrospd"];
			}
		 }
	}
?>