<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/Cabecera.php");
	require_once("../../lib/general/funciones.php");
	require_once("../../lib/general/Herramientas.class.php");
	require_once("../../lib/modelo/sqls/tesoreria/Tsrplaliqislr.class.php");

	class pdfreporte extends fpdf
	{

		function pdfreporte()
		{
			parent::FPDF("P");
			$this->numorddes=H::GetPost("numorddes");
			$this->numordhas=H::GetPost("numordhas");
			$this->bendes=H::GetPost("bendes");
			$this->benhas=H::GetPost("benhas");
			$this->fecdes=H::GetPost("fecdes");
			$this->fechas=H::GetPost("fechas");
			$this->stades=H::GetPost("stades");
			$this->liqdes = H::GetPost("liqdes");
			$this->tesdes = H::GetPost("tesdes");
			$this->dirdes = H::GetPost("dirdes");
			$this->recdes = H::GetPost("recdes");
			$this->status=$this->CalculaEstatus();
			$this->trsplaliqislr = new Tsrplaliqislr();
			$this->arrp=$this->trsplaliqislr->SQLp($this->numorddes,$this->numordhas,$this->bendes,$this->benhas,$this->fecdes,$this->fechas,$this->status);
			
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
			$this->setlinewidth(0.2);
			$this->rect(9.5,5,190.5,220);
			//$this->cab->getCabecera($this,H::GetPost("titulo"),$parte[$ubica]);
			$this->getCabecera(H::GetPost("titulo"),"");
		}

		function Cuerpo()
		{
			$i=0;
			$ref=$this->arrp[$i]["numord"];
			$obj = $this->arrp[$i];
			$this->setFont("Arial","B",8);
			$this->texto(169,8,"Planilla:    ".$obj["numord"]);
			$this->setFont("Arial","",9);
			$this->setXY(12,40);
			$this->MCplus(80,4,"EL CIUDADANO:   <@".$obj["nomben"]."<,>arial,B,9@>");
			$this->setFont("arial","",9);
			$this->line(10,$this->GetY()+4,200,$this->GetY()+4);
			$this->setXY(12,55);
			$this->MCplus(160,4,"Pagara en la Tesoreria General del  Estado, La cantidad:   <@".H::obtenermontoescrito($obj["monret"])."<,>arial,B,9@>");
			$this->setFont("arial","",9);
			$this->setX(130);
			$this->MCplus(160,4,"bolivares(<@Bs.:  ".H::FormatoMonto($obj["monret"])."<,>arial,B,9 @>)");
			$this->line(10,$this->GetY()+4,200,$this->GetY()+4);
			$this->setXY(12,75);
			$this->cell(20,4,"Concepto:");
			$this->ln(4);
			$this->MCplus(140,4,"
						Deducción tasa de Impuesto ".number_format($obj["porret"],0)."% correspondiente a la contratación de:
			<@".$obj["desord"]."<,>arial,B,9@>");
			$this->ln(8);

			$this->MCplus(130,4," <@Según Gaceta Oficial N° 36203 del 12 de Mayo de 1997<,>arial,B,7 @>");
			$this->setFont("Arial","",7);
			$this->ln(6);
			$this->cell(100,4,"Total General                        Bs.:");
			$this->cell(30,0,H::FormatoMonto($obj["monord"]),0,0,"R");
			$this->cell(30,0,H::FormatoMonto($obj["monord"]),0,0,"R");
			$this->ln(6);
			$tot_neto=$obj["monord"];
			foreach($this->arrp as $obj)
			{
				if ($ref!=$obj["numord"])
				{
					$this->cell(130,4,"NETO  A PAGAR                        Bs.:");
					$this->cell(30,0,H::FormatoMonto($tot_neto),0,0,"R");
					$tot_neto=0;
					$this->ln(6);
					$this->cell(70,4,"ORDEN DE PAGO N°:    ".$ref);
					$this->ln(8);
					$this->addPage();
					$this->setFont("Arial","B",8);
					$this->texto(169,8,"Planilla:    ".$obj["numord"]);
					$this->setFont("Arial","",9);
					$this->setXY(12,40);
					$this->MCplus(80,4,"EL CIUDADANO:   <@".$obj["nomben"]."<,>arial,B,9@>");
					$this->setFont("arial","",9);
					$this->line(10,$this->GetY()+4,200,$this->GetY()+4);
					$this->setXY(12,55);
					$this->MCplus(160,4,"Pagara en la Tesoreria General del  Estado, La cantidad:   <@".H::obtenermontoescrito($obj["monret"])."<,>arial,B,9@>");
					$this->setFont("arial","",9);
					$this->setX(130);
					$this->MCplus(160,4,"bolivares(<@Bs.:  ".H::FormatoMonto($obj["monret"])."<,>arial,B,9 @>)");
					$this->line(10,$this->GetY()+4,200,$this->GetY()+4);
					$this->setXY(12,75);
					$this->cell(20,4,"Concepto:");
					$this->ln(4);
					$this->MCplus(140,4,"
								Deducción tasa de Impuesto ".number_format($obj["porret"],0)."% correspondiente a la contratación de:
					<@".$obj["desord"]."<,>arial,B,9@>");
					$this->ln(8);
					$this->MCplus(130,4," <@Según Gaceta Oficial N° 36203 del 12 de Mayo de 1997<,>arial,B,7 @>");

					$this->setFont("Arial","",7);
					$this->ln(6);
					$this->cell(100,4,"Total General                        Bs.:");
					$this->cell(30,0,H::FormatoMonto($obj["monord"]),0,0,"R");
					$this->cell(30,0,H::FormatoMonto($obj["monord"]),0,0,"R");
					$tot_neto=$obj["monord"];
					$this->ln(6);
				}#Detalle impuestos
				$this->cell(100,4,$obj["destip"]."   Bs.:");
				$this->cell(30,0,H::FormatoMonto($obj["monret"]),0,0,"R");
				$tot_neto -=$obj["monret"];
				$this->cell(30,0,H::FormatoMonto($tot_neto),0,0,"R");
				$this->ln(6);
				$ref=$obj["numord"];
			}
		}
		function Footer()
		{
			$this->ln(16);
			$y=50;
			$this->cell($y,4,"El Liquidador");
			$this->cell($y,4,"Tesorero");
			$this->cell($y,4,"Director");
			$this->cell($y,4,"Recibido");
			$this->ln(4);
			$this->cell($y,4,$this->liqdes);
			$this->cell($y,4,$this->tesdes);
			$this->cell($y,4,$this->dirdes);
			$this->cell($y,4,$this->recdes);
			$this->ln(8);
			$this->cell($y,4,"Firma_______________");
			$this->cell($y,4,"Firma_______________");
			$this->cell($y,4,"Firma_______________");
			$this->cell($y,4,"Firma_______________");
			$this->ln(4);
			$this->cell($y,4,"Fecha:___/___/_____");
			$this->cell($y,4,"Fecha:___/___/_____");
			$this->cell($y,4,"Fecha:___/___/_____");
			$this->cell($y,4,"Fecha:___/___/_____");
		}
	}
