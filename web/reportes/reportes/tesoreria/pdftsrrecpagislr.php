<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/Cabecera.php");
	require_once("../../lib/general/funciones.php");
	require_once("../../lib/general/Herramientas.class.php");
	require_once("../../lib/modelo/sqls/tesoreria/Tsrrecpagislr.class.php");

	class pdfreporte extends fpdf
	{

		function pdfreporte()
		{
			parent::FPDF("P");
			$this->año='2008';
			$this->index=0;
			$this->numorddes=H::GetPost("numorddes");
			$this->numordhas=H::GetPost("numordhas");
			$this->bendes=H::GetPost("bendes");
			$this->benhas=H::GetPost("benhas");
			$this->fecdes=H::GetPost("fecdes");
			$this->fechas=H::GetPost("fechas");
			$this->stades=H::GetPost("stades");
			$this->dircom = H::GetPost("dircom");
			$this->tesgen = H::GetPost("tesgen");
			$this->diradm = H::GetPost("diradm");
			$this->dirser = H::GetPost("dirser");
			$this->stades = H::GetPost("stades");
			$this->iva=9;
			$this->status=$this->CalculaEstatus();
			$this->tsrrecpagislr = new Tsrrecpagislr();
			$this->arrp=$this->tsrrecpagislr->SQLp($this->numorddes,$this->numordhas,$this->bendes,$this->benhas,$this->fecdes,$this->fechas,$this->status);
		}

		function CalculaEstatus()
		{
			$sta=array();
			if (strtoupper($this->stades)=='ANULADAS')
			{
				$sta[0]='A';
				$sta[1]='A';
				$sta[2]='A';
			}
			if (strtoupper($this->stades)=='PAGADAS')
			{
				$sta[0]='P';
				$sta[1]='P';
				$sta[2]='P';
			}
			if (strtoupper($this->stades)=='EMITIDAS')
			{
				$sta[0]='E';
				$sta[1]='E';
				$sta[2]='E';
			}
			if (strtoupper($this->stades)=='TODAS')
			{
				$sta[0]='A';
				$sta[1]='P';
				$sta[2]='E';
			}
			return $sta;
		}

	 	function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->getCabecera(H::GetPost("titulo"),"");
		}

		function Cuerpo()
		{
			$i=0;
			foreach($this->arrp as $obj)
			{
				$this->index=$i;
				$this->setFont("Arial","",9);
				$this->setXY(20,50);
				$this->MCplus(170,9,"          YO,       <@   ".$obj["nomben"]."<,>arial,B,9  @>   C.I.N°  <@ ".$obj["cedrif"]."<,>arial,B,9 @>
				He Recibido del Ciudadano Tesorero del Estado Miranda la suma de
				<@ ".H::Obtenermontoescrito($obj["monord"])."  (Bs.      ".H::FormatoMonto($obj["monord"]).")  <,>arial,B,9 @>       por el concepto siguiente:
				<@  ".$obj["desord"]." <,>arial,B,9 @>",0,"J");
				$this->setX(20);
				$this->setFont("arial","BU",10);
				$this->cell(80,9,"Servicio Básico: Bs. ".H::FormatoMonto($obj["monord"]-($obj["monord"]*($this->iva/100))));
				$this->ln(9);
				$this->setX(20);
				$this->cell(80,9,"IVA: Bs. ".H::FormatoMonto($obj["monord"]*($this->iva/100)));
				$this->ln(9);
				$this->setX(20);
				$this->setFont("arial","BU",11);
				$this->cell(80,9,"Se Anexa Factura No. ".$obj["numord"],0,"C");
				$this->ln(10);
				$this->setX(40);
				$this->setFont("arial","B",9);
				$this->cell(30,4,"Localidad");
				$this->setFont("arial","B",11);
				$this->cell(80,4,"Los Teques  ".date("d")."   de   ".H::ObtenerMesenLetras(date("m"))."  del  ".date("Y"));
				$this->ln(20);
				$this->cell(16,4,"");
				$this->line(10,$this->GetY()+3,80,$this->GetY()+3);
				$this->ln(4);
				$this->cell(19,4);
				$this->setFont("arial","B",9);
				$this->cell(50,4,"Firma del Beneficiario");
				$this->ln(5);
				$this->setFont("arial","B",12);
				$this->cell(12,4);
				$this->cell(50,4,$obj["nomben"]);
				$i++;
				$this->addPage();
			}
		}
		function Footer()
		{
			$this->ln(16);
			$this->setFont("arial","",7);
			$this->setWidths(array(38,38,38,38,38));
			$this->setAligns(array("C","C","C","C","C"));
			$this->setBorder(true);
			$this->Row(array("Dirección de Compras y Servicios ","Tesorería General del Estado",
			                 "Dirección General de Administración y Servicios","Procurador General del Estado",
			                 "Dirección General de Contraloría Interna"));
			$this->Row(array(chr(10).chr(13).chr(10).chr(13).chr(10).chr(13).chr(10).chr(13).chr(10).chr(13).chr(10).chr(13),
							 "",
			                 "",
							 "",
			                 ""));
			$this->setBorder(false);
			$this->setY($this->GetY()-15);
			/*$this->Row(array($this->dircom."                                       	Director",
							 $this->tesgen."                                      Tesoreria",
			                 $this->diradm."                                      Directora General",
							 "Firma y Sello",
			                 "Firma y Sello"));*/
			$y=$this->GetY()+5;
			$this->setXY(10,$y);
			$this->MCplus(30,3,$this->dircom."  ".chr(10).chr(13)."           Director",0,"C");
			$this->setXY(48,$y);
			$this->MCplus(30,3,$this->tesgen."  ".chr(10).chr(13)."           Tesorera",0,"C");
			$this->setXY(90,$y);
			$this->MCplus(30,3,$this->diradm."  ".chr(10).chr(13)."           Directora General",0,"C");
			$this->setXY(128,$y+5);
			$this->MCplus(30,3,"Firma y Sello",0,"C");
			$this->setXY(165,$y+5);
			$this->MCplus(30,3,"Firma y Sello",0,"C");
			$this->rect(10,$this->GetY()+5,76,40);
			$this->line(10,$this->GetY()+15,86,$this->GetY()+15);
			$this->line(48,$this->GetY()+5,48,$this->GetY()+45);
			$this->setXY(48,$this->GetY()+5);
			$this->MCplus(38,4,"Direción de Servicios ".chr(10).chr(13)."  Financiero/Contabilidad",0,"C");
			$this->setXY(48,$this->GetY()+22);
			$this->multicell(38,4,$this->dirser.chr(10).chr(13)."Directora",0,"C");
			$this->setFont("arial","B",9);
			$this->setXY(86,$this->GetY()-38);
			$this->setWidths(array(114));
			$this->setAligns(array("C"));
			$this->setBorder(true);
			$this->Row(array("P R E S U P U E S T O    A Ñ O ".chr(10).chr(13).$this->año));
			$this->setXY(86,$this->GetY());
			$this->setFont("arial","B",5);
			$this->setWidths(array(22,11,12,12,13,22,11,11));
			$this->setAligns(array("C","C","C","C","C","C","C","C"));
			$this->setBorder(true);
			$this->Row(array("Sector Programa","Sub Prog","Act. Proy","Otras","Partida","Sub partida","Sub","Sub"));
			#CICLO VA AQUI
			$this->arropdetord=$this->tsrrecpagislr->SQLopdetord($this->arrp[$this->index]["numord"]);
			foreach($this->arropdetord as $ob)
			{
				$aux = split("-",trim($ob["codpre"]));
				$this->setXY(86,$this->GetY());
				$this->setFont("arial","",5);
				$this->setWidths(array(11,11,11,12,12,13,11,11,11,11));
				$this->setAligns(array("C","C","C","C","C","C","C","C","C","C"));
				$this->setBorder(true);
				$this->Row(array($aux[0],$aux[1],$aux[2],$aux[3],$aux[4],$aux[5],$aux[6],$aux[7],$aux[8],$aux[9]));
			}

			#HASTA AQUI EL CICLO

			$this->setXY(86,$this->GetY());
			$this->setFont("arial","",5);
			$this->setWidths(array(22,11,12,36,33));
			$this->setAligns(array("C","C","C","C","C"));
			$this->setBorder(true);
			$this->Row(array("Código de Operaciones","C.T","Consecutivo","Analista de Presupuesto","Crédito Adicional  ".chr(10).chr(13)."  No."));


			/*$this->line(48,$this->GetY()+5,48,$this->GetY()+45);
			$this->line(86,$this->GetY()+5,86,$this->GetY()+45);
			$this->line(86,$this->GetY()+5,86,$this->GetY()+45);
			$this->line(86,$this->GetY()+5,86,$this->GetY()+45);
			$this->line(86,$this->GetY()+5,86,$this->GetY()+45);*/

			/*$y=$this->GetY();
			$this->multicell(35,4,"Dirección de Compras ".chr(10).chr(13)."y Servicios ",1,"C");
			$this->setXY(45,$y);
			$this->multicell(35,4,"Dirección de Compras ".chr(10).chr(13)."y Servicios ",1,"C");
			$this->setXY(80,$y);
			$this->multicell(35,4,"Dirección de Compras ".chr(10).chr(13)."y Servicios ",1,"C");
			$this->setXY(115,$y);
			$this->multicell(35,4,"Dirección de Compras ".chr(10).chr(13)."y Servicios ",1,"C");
			$this->setXY(150,$y);
			$this->multicell(35,4,"Dirección de Compras ".chr(10).chr(13)."y Servicios ",1,"C");*/
		}
	}
