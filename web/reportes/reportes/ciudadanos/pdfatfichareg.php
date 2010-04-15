<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/modelo/sqls/ciudadanos/Atfichareg.class.php");
	class pdfreporte extends fpdf
	{
		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->cab = new Cabecera();
			$this->numexpdes=H::GetPost("numexpdes");
			$this->numexphas=H::GetPost("numexphas");
			$this->fechades=H::GetPost("fechades");
			$this->fechahas=H::GetPost("fechahas");
			$this->atfichareg = new Atfichareg();
		    $this->arrp = $this->atfichareg->Sqlp($this->numexpdes,$this->numexphas,$this->fechades,$this->fechahas);
			$this->llenartitulosmaestro();
			$this->setautoPagebreak(true,5);

		}

		function ponermicabecera()
		{
			$this->setFont("Arial","B",8);
			//Logo de la Empresa
			$this->Image("../../img/logo_1.jpg",10,4,190);
			//fecha actual
			$fecha=date("d/m/Y");
			$this->Cell(470,10,'Fecha: '.$fecha,0,0,'C');
			$this->ln(5);
			$this->Cell(470,10,'Pagina '.$this->PageNo().' de {nb}',0,0,'C');
			$this->Ln(-5);
    		$this->Cell(270,5,'',0,0,'C');
			$this->Ln(3);
    		$this->Cell(270,5,'',0,0,'C');
			$this->Ln(3);
    		$this->Cell(270,5,'',0,0,'C');
			$this->Ln(3);
    		$this->Cell(270,5,'',0,0,'C');
    		$this->Ln(4);
			//Titulo del Reporte
			$this->setFont("Arial","B",10);
			$this->setX(64);
			$this->Cell(70,6,"OFICINA DE GESTIÓN Y ACCIÓN SOCIAL",0,0,'L',0);
			$this->ln(6);
			$this->setFont("Arial","",9);
			$this->setX(80);
			$this->Cell(70,6,$_POST["titulo"],0,0,'L',0);
			$this->ln(10);
		}

		function llenartitulosmaestro(){
				$this->titulosben[]="Datos del Beneficiario";
			    $this->titulossol[]="Datos del Solicitante";
			    $this->titulosdia[]="Diagnostico y Resumen del Caso";

				$this->anchoss=array(200);
				$this->alines=array("C");
		}

		function Header()
		{
			$this->ponermicabecera();
			//$this->getCabecera(H::GetPost("titulo"),"");
			$this->ln(10);
			$this->settextcolor(155,0,0);

		}

		function Cuerpo()
		{
			$tot_obr=0;
			$tot_gen=0;
			$z=0;
			$q=0;
			$this->setwidths($this->anchoss);
			$this->setaligns($this->alines);
			$this->setFont("Arial","B",8);
      $last_item = end($this->arrp); 

			foreach($this->arrp as $dato)
			{
			        $this->arrtrasoc = $this->atfichareg->Sqltrabajadorsocial($dato["attrasoc_id"]);
                    $this->arrsolici = $this->atfichareg->Sqlbenefi_solici($dato["atsolici"]);
                    $this->arrbenefi = $this->atfichareg->Sqlbenefi_solici($dato["atbenefi"]);
                    $this->arrmedico =$this->atfichareg->Sqlmedicotratante($dato["atmedico_id"]);
                    $solici=$this->arrsolici[0];
                    $benefi=$this->arrbenefi[0];
                    $medico=$this->arrmedico[0];
			        $this->setXY(160,25);
       			    $this->cell(50,5,"Expediente:     ".$dato["nroexp"],1,0,"L");
       			    $this->setXY(160,30);
			        $fecsol=date("d/m/Y",strtotime($dato["fecsol"]));
       			    $this->cell(50,5,"Fecha:          ".$fecsol,1,0,"L");
                    $this->setX(10);
                    $this->ln(10);
                    $this->setFont("Arial","B",8);
                    $this->setBorder(true);
					$this->setFillTable(1);
					$this->SetTextColor(255,255,255);
			        $this->rowm($this->titulossol);
			        $this->ln(4);
			        $this->setaligns(array("L","L","L"));
			        $this->setwidths(array(71,71,58));
			        $this->setBorder(false);
					$this->setFillTable(0);
					$this->SetTextColor(0,0,0);
					$this->setFont("Arial","",10);
					$espacios="         ";
					$fecnac=date("d/m/Y",strtotime($solici["fecnac"]));
                    $this->row(array(" <@Nombres:<,>arial,B,10,0,0,0@> ".$solici["nomciu"]," <@Apellidos:<,>arial,B,10,0,0,0@> ".$solici["apeciu"]," <@C.I.:<,>arial,B,10,0,0,0@> ".$solici["cedciu"]));
                    $this->row(array(" <@Fecha de Nacimiento:<,>arial,B,10,0,0,0@> ".$fecnac," <@Edad:<,>arial,B,10,0,0,0@> ".$solici["edad"].$espacios." <@Edo. Civil:<,>arial,B,10,0,0,0@> ".H::ObtenerEstadoCivil($solici["estciv"])," <@Parentesco.:<,>arial,B,10,0,0,0@> ".H::ObtenerParentesco($dato["parentesco"])));
                    $this->row(array(" <@Grado de Instrucción:<,>arial,B,10,0,0,0@> ".$solici["grains"]," <@Nacionalidad:<,>arial,B,10,0,0,0@> ".$solici["nacciu"]," <@Procedencia.:<,>arial,B,10,0,0,0@> ".$solici["ciudad"]));
                    $this->setaligns(array("L"));
			        $this->setwidths(array(200));
			        $this->ln(-2);
			        $this->row(array(" <@Dirección de Habitación:<,>arial,B,10,0,0,0@> ".$solici["dirhab"]));
				    $this->setaligns(array("L","L","L"));
			        $this->setwidths(array(71,71,58));
			        $this->ln(6);
			        $this->row(array(" <@Telf. Habitación:<,>arial,B,10,0,0,0@> ".$solici["telhab"]," <@Telf. Oficina:<,>arial,B,10,0,0,0@> ".$solici["telemp"]," <@Celular:<,>arial,B,10,0,0,0@> ".$solici["teladihab"]));
			        if ($solici["traciu"]) $trabaja="Si"; else $trabaja="No";
			        $this->row(array(" <@Ocupación:<,>arial,B,10,0,0,0@> ".$solici["prociu"]," <@Trabaja:<,>arial,B,10,0,0,0@> ".$trabaja," <@Empresa:<,>arial,B,10,0,0,0@> ".$solici["nomemp"]));
			        $this->setaligns(array("L"));
			        $this->setwidths(array(200));
			        $this->ln(-2);
			        $this->row(array(" <@Dirección de Oficina:<,>arial,B,10,0,0,0@> ".$solici["diremp"]));
				    $this->ln(4);
			        $this->row(array(" <@Ingreso Mensual:<,>arial,B,10,0,0,0@> ".$solici["moning"]));
			        //beneficiario
			        $this->setFont("Arial","B",8);
                    $this->setBorder(true);
			        $this->setFillTable(1);
					$this->SetTextColor(255,255,255);
					$this->setaligns(array("C"));
					$this->ln(4);
			        $this->rowm($this->titulosben);
			        $this->ln(4);
			        $this->setaligns(array("L","L","L"));
			        $this->setwidths(array(71,71,58));
			        $this->setBorder(false);
					$this->setFillTable(0);
					$this->SetTextColor(0,0,0);
					$this->setFont("Arial","",10);
					$espacios="         ";
					$fecnac=date("d/m/Y",strtotime($benefi["fecnac"]));
                    $this->row(array(" <@Nombres:<,>arial,B,10,0,0,0@> ".$benefi["nomciu"]," <@Apellidos:<,>arial,B,10,0,0,0@> ".$benefi["apeciu"]," <@C.I.:<,>arial,B,10,0,0,0@> ".$benefi["cedciu"]));
                    $this->row(array(" <@Fecha de Nacimiento:<,>arial,B,10,0,0,0@> ".$fecnac," <@Edad:<,>arial,B,10,0,0,0@> ".$benefi["edad"].$espacios." <@Edo. Civil:<,>arial,B,10,0,0,0@> ".H::ObtenerEstadoCivil($benefi["estciv"])));
                    $this->row(array(" <@Grado de Instrucción:<,>arial,B,10,0,0,0@> ".$benefi["grains"]," <@Nacionalidad:<,>arial,B,10,0,0,0@> ".$benefi["nacciu"]," <@Procedencia.:<,>arial,B,10,0,0,0@> ".$benefi["ciudad"]));
                    $this->setaligns(array("L"));
			        $this->setwidths(array(200));
			        $this->ln(-2);
			        $this->row(array(" <@Dirección de Habitación:<,>arial,B,10,0,0,0@> ".$benefi["dirhab"]));
				    $this->setaligns(array("L","L","L"));
			        $this->setwidths(array(71,71,58));
			        $this->ln(4);
			        $this->row(array(" <@Telf. Habitación:<,>arial,B,10,0,0,0@> ".$benefi["telhab"]," <@Telf. Oficina:<,>arial,B,10,0,0,0@> ".$benefi["telemp"]," <@Celular:<,>arial,B,10,0,0,0@> ".$benefi["teladihab"]));
			        if ($benefi["traciu"]) $trabaja="Si"; else $trabaja="No";
			        $this->row(array(" <@Ocupación:<,>arial,B,10,0,0,0@> ".$benefi["prociu"]," <@Trabaja:<,>arial,B,10,0,0,0@> ".$trabaja," <@Empresa:<,>arial,B,10,0,0,0@> ".$benefi["nomemp"]));
			        $this->setaligns(array("L"));
			        $this->setwidths(array(200));
			        $this->ln(-2);
			        $this->row(array(" <@Dirección de Oficina:<,>arial,B,10,0,0,0@> ".$benefi["diremp"]));
			        $this->ln(4);
			        $this->row(array(" <@Ingreso Mensual:<,>arial,B,10,0,0,0@> ".$benefi["moning"]));
			        //beneficiario
			        $this->setFont("Arial","B",8);
                    $this->setBorder(true);
			        $this->setFillTable(1);
					$this->SetTextColor(255,255,255);
					$this->setaligns(array("C"));
					$this->ln(4);
			        $this->rowm($this->titulosdia);
			        $this->ln(4);
			        $this->setaligns(array("L","L","L"));
			        $this->setwidths(array(71,71,58));
			        $this->setBorder(false);
					$this->setFillTable(0);
					$this->SetTextColor(0,0,0);
					$this->setFont("Arial","",10);
					$espacios="         ";
					$this->row(array(" <@Medico Tratante:<,>arial,B,10,0,0,0@> ".$medico["nombremed"]." ".$medico["apellimed"]," <@Teléfono:<,>arial,B,10,0,0,0@> ".$medico["telunomed"]. " ".$medico["teldosmed"],""));
					$this->setaligns(array("L"));
			        $this->setwidths(array(200));
			        $this->ln(-1);
			        $this->row(array(" <@Diagnostico Médico:<,>arial,B,10,0,0,0@> ".$dato["infmed"]));
			        $this->ln(2);
			        $this->row(array(" <@Tipo de Ayuda:<,>arial,B,10,0,0,0@> ".$dato["desayu"]));
			        $this->ln(2);
			        $this->row(array(" <@Diagnostico Social:<,>arial,B,8,0,0,0@> <@".$dato["resdiasoc"]."<,>arial,B,8,0,0,0@>"));
      if($last_item!=$dato) $this->AddPage();
		}
	 }
	}
?>