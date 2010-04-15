<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/modelo/sqls/ciudadanos/Atplatra.class.php");
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
			$this->atplatra = new Atplatra();
		    $this->arrp = $this->atplatra->Sqlp($this->numexpdes,$this->numexphas,$this->fechades,$this->fechahas);
			$this->llenartitulosmaestro();
			$this->setautoPagebreak(true,25);

		}

		function ponermicabecera()
		{
			$this->setFont("Arial","B",8);
			//Logo de la Empresa
			$this->Image("../../img/logo_1.jpg",10,8,18);
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
    		$this->Ln(14);
			//Titulo del Reporte
			$this->setFont("Arial","B",10);
			$this->setX(44);
			$this->Cell(70,6,"OFICINA DE GESTIÓN Y ACCIÓN SOCIAL",0,0,'L',0);
			$this->ln(6);
			$this->setFont("Arial","",9);
			$this->setX(40);
			$this->Cell(70,6,$_POST["titulo"],0,0,'L',0);
			$this->ln(10);
		}

		function llenartitulosmaestro(){
				$this->tituloss[]="Datos del Beneficiario";
			    $this->tituloss[]="Datos del Solicitante";
			    $this->titulosr[]="Referido Por";
			    $this->titulosr[]="Nota de Remisión Interna";
			    $this->titulosp[]="Presupuesto Consignado";
			    $this->titulosp[]="Presupuesto por OGAS";
                $this->titulosn[]="Nota de Remisión Interna";
			    $this->titulosn[]="Nota de Remisión Interna";

				$this->anchoss=array(100,100);
				$this->alines=array("C","C");
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


			foreach($this->arrp as $dato)
			{
			        $this->arrtrasoc = $this->atplatra->Sqltrabajadorsocial($dato["attrasoc_id"]);
                    $this->arrsolici = $this->atplatra->Sqlbenefi_solici($dato["atsolici"]);
                    $this->arrbenefi = $this->atplatra->Sqlbenefi_solici($dato["atbenefi"]);
					$this->arrpresupuesto = $this->atplatra->Sqlpresupuesto($dato["id"]);

                    $solici=$this->arrsolici[0];
                    $benefi=$this->arrbenefi[0];
					$presupuesto = array();
					if(count($this->arrpresupuesto)>0) $presupuesto = $this->arrpresupuesto[0];
			        $this->setXY(130,28);
			        $fecsol=date("d/m/Y",strtotime($dato["fecsol"]));
       			    $this->cell(80,5,"Fecha:          ".$fecsol,1,0,"L");
       			    $this->setXY(130,33);
       			    $this->cell(80,5,"Expediente:     ".$dato["nroexp"],1,0,"L");
       			    $this->setXY(130,38);
       			    $this->cell(80,5,"Trab. Social:   ".$this->arrtrasoc[0]["nomtra"]." ".$this->arrtrasoc[0]["apetra"],1,0,"L");
       			    $this->setXY(130,43);
                    $this->cell(80,5,"Tipo Solicitud:   ".$dato["desayu"],1,0,"L");
                    $this->setX(10);
                    $this->ln(10);
                    $this->setFont("Arial","B",8);
                    $this->setBorder(true);
					$this->setFillTable(1);
					$this->SetTextColor(255,255,255);
			        $this->rowm($this->tituloss);
			        $this->ln(4);
			        $this->setaligns(array("L","L"));
			        $this->setBorder(false);
					$this->setFillTable(0);
					$this->SetTextColor(0,0,0);
					$this->setFont("Arial","",10);
                    $this->row(array(" <@Nombres:<,>arial,B,10,0,0,0@> ".$benefi["nomciu"]," <@Nombres:<,>arial,B,10,0,0,0@> ".$solici["nomciu"]));
                    $this->row(array(" <@Apellidos:<,>arial,B,10,0,0,0@> ".$benefi["apeciu"]," <@Apellidos:<,>arial,B,10,0,0,0@> ".$solici["apeciu"]));
                    $this->row(array(" <@C.I.:<,>arial,B,10,0,0,0@> ".$benefi["cedciu"]."<@                    Edad.:<,>arial,B,10,0,0,0@> ".$benefi["edad"]," <@C.I.:<,>arial,B,10,0,0,0@> ".$solici["cedciu"]."<@                    Edad.:<,>arial,B,10,0,0,0@> ".$solici["edad"]));
                    $this->row(array(" <@Telf. Habitación:<,>arial,B,10,0,0,0@> ".$benefi["telhab"]," <@Telf. Habitación:<,>arial,B,10,0,0,0@> ".$solici["telhab"]));
                    $this->row(array(" <@Celular:<,>arial,B,10,0,0,0@> ".$benefi["teladihab"]," <@Celular:<,>arial,B,10,0,0,0@> ".$solici["teladihab"]));

                    $this->ln(10);
                    $this->setFont("Arial","B",10);
                    $this->setBorder(true);
					$this->setFillTable(1);
					$this->SetTextColor(255,255,255);
					$this->setaligns($this->alines);
			        $this->rowm($this->titulosr);
			        $this->ln(4);
			        $this->setaligns(array("L","L"));
			        $this->setBorder(false);
					$this->setFillTable(0);
					$this->SetTextColor(0,0,0);
					$this->setFont("Arial","",10);
                    $this->row(array(" <@Nombre:<,>arial,B,10,0,0,0@> ".$benefi["desinsref"]," <@Despacho del Ministro:<,>arial,B,10,0,0,0@> "));
                    $this->row(array(""," <@Dirección del Despacho:<,>arial,B,10,0,0,0@> "));
                    $this->row(array(""," <@Otro:<,>arial,B,10,0,0,0@> "));

                    $this->ln(10);
                    $this->setFont("Arial","B",10);
                    $this->setBorder(true);
					$this->setFillTable(1);
					$this->SetTextColor(255,255,255);
					$this->setaligns($this->alines);
			        $this->rowm($this->titulosp);
			        $this->ln(4);
			        $this->setaligns(array("L","L"));
			        $this->setBorder(false);
					$this->setFillTable(0);
					$this->SetTextColor(0,0,0);
					$this->setFont("Arial","",10);

					if(count($presupuesto)>0){
						$org1 = $presupuesto['nompro1'];
						$telf1 = $presupuesto['telpro1'];
						$monto1 = $presupuesto['monto1'];
						$org2 = $presupuesto['nompro2'];
						$telf2 = $presupuesto['telpro2'];
						$monto2 = $presupuesto['monto2'];
						$org3 = $presupuesto['nompro3'];
						$telf3 = $presupuesto['telpro3'];
						$monto3 = $presupuesto['monto3'];
						$org4 = $presupuesto['nompro4'];
						$telf4 = $presupuesto['telpro4'];
						$monto4 = $presupuesto['monto4'];
						$org5 = $presupuesto['nompro5'];
						$telf5 = $presupuesto['telpro5'];
						$monto5 = $presupuesto['monto5'];
						$org6 = $presupuesto['nompro6'];
						$telf6 = $presupuesto['telpro6'];
						$monto6 = $presupuesto['monto6'];
					}
                    $this->row(array(" <@Organismo:<,>arial,B,10,0,0,0@> ".$org1," <@Organismo:<,>arial,B,10,0,0,0@> ".$org4));
                    $this->row(array(" <@Teléfono:<,>arial,B,10,0,0,0@> ".$telf1," <@Teléfono:<,>arial,B,10,0,0,0@> ".$telf4));
                    $this->row(array(" <@Monto Bs. F.:<,>arial,B,10,0,0,0@> ".$monto1," <@Monto Bs. F.:<,>arial,B,10,0,0,0@> ".$monto4));
                    $this->row(array(" <@Organismo:<,>arial,B,10,0,0,0@> ".$org2," <@Organismo:<,>arial,B,10,0,0,0@> ".$org5));
                    $this->row(array(" <@Teléfono:<,>arial,B,10,0,0,0@> ".$telf2," <@Teléfono:<,>arial,B,10,0,0,0@> ".$telf5));
                    $this->row(array(" <@Monto Bs. F.:<,>arial,B,10,0,0,0@> ".$monto2," <@Monto Bs. F.:<,>arial,B,10,0,0,0@> ".$monto5));
                    $this->row(array(" <@Organismo:<,>arial,B,10,0,0,0@> ".$org3," <@Organismo:<,>arial,B,10,0,0,0@> ".$org6));
                    $this->row(array(" <@Teléfono:<,>arial,B,10,0,0,0@> ".$telf3," <@Teléfono:<,>arial,B,10,0,0,0@> ".$telf6));
                    $this->row(array(" <@Monto Bs. F.:<,>arial,B,10,0,0,0@> ".$monto3," <@Monto Bs. F.:<,>arial,B,10,0,0,0@> ".$monto6));

					$this->ln(10);
                    $this->setFont("Arial","B",10);
                    $this->setBorder(true);
					$this->setFillTable(1);
					$this->SetTextColor(255,255,255);
					$this->setaligns($this->alines);
			        $this->rowm($this->titulosn);
			        $this->ln(4);
			        $this->setaligns(array("L","L"));
			        $this->setBorder(false);
					$this->setFillTable(0);
					$this->SetTextColor(0,0,0);
					$this->setFont("Arial","",10);
                    $this->row(array(" <@Aprobado:<,>arial,B,10,0,0,0@>                             "." <@Monto:<,>arial,B,10,0,0,0@> "," <@Caso en Tramite:<,>arial,B,10,0,0,0@>                             "." <@Fecha:<,>arial,B,10,0,0,0@> "));
                    $this->row(array(" <@Negado:<,>arial,B,10,0,0,0@>                               "." <@Fecha:<,>arial,B,10,0,0,0@> "," <@Caso Cerrado:<,>arial,B,10,0,0,0@>                                "." <@Fecha:<,>arial,B,10,0,0,0@> "));
                    $this->row(array(" <@Remitir:<,>arial,B,10,0,0,0@>                               "." <@Firma:<,>arial,B,10,0,0,0@> "," <@Caso Cerrado:<,>arial,B,10,0,0,0@>                                "." <@Fecha:<,>arial,B,10,0,0,0@> "));			
					
					$this->AddPage();
                   //$this->ln(10);
					$this->setaligns(array("C"));
					$this->setwidths(array(200));
                    $this->setFont("Arial","B",10);
                    $this->setBorder(true);
					$this->setFillTable(1);
					$this->SetTextColor(255,255,255);
			        $this->rowm(array("Observaciones"));
			        $this->ln(2);
					$this->SetTextColor(0,0,0);
					$this->MultiCell(200,5,$dato['obsayu']);
					$this->setwidths($this->anchoss);
					$this->setaligns($this->alines);
					$this->setFont("Arial","B",8);
					
					$this->AddPage();
					
					
					}

		}
	}
?>