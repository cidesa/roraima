<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/Cabecera.php");
	require_once("../../lib/general/Herramientas.class.php");
	require_once("../../lib/modelo/sqls/tesoreria/Tsrcomtransbanc.class.php");

	class pdfreporte extends fpdf
	{

		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");
			$this->titulos=array();
			$this->anchos=array();
			$this->numcuedes=H::GetPost("numcuedes");
			$this->numcuehas=H::GetPost("numcuehas");
			$this->fecdes=H::GetPost("fecdes");
			$this->fechas=H::GetPost("fechas");
			$this->tesgen=H::GetPost("tesgen");
			$this->dirgen=H::GetPost("dirgen");
			$this->tsrcomtransbanc= new Tsrcomtransbanc();
		    $this->arrp=$this->tsrcomtransbanc->sqlp($this->numcuedes,$this->numcuehas,$this->fecdes,$this->fechas);
		    $this->LlenarVariables();
		}

		function Header()
		{
				//$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s");
				$this->getCabecera(H::GetPost("titulo"),"");
		}

		function LlenarVariables()
		{
			$this->conparte1="Es grato dirigirnos a usted, en la oportunidad de extenderle un cordial saludo y a la vez solicitarle se sirva debitar de la cuenta ";
            $this->conparte2=" para ser acreditado con fecha valor ";
            $this->conparte3=" a la cuenta que detallamos a continuación: ";
		}


		function Cuerpo()
		{
			$cont=1;
			foreach($this->arrp as $dato)
			{
				$this->setFont("Arial","",8);
				$arrctaori=$this->tsrcomtransbanc->sql_tsdefban($dato["ctaori"]);
				$arrctades=$this->tsrcomtransbanc->sql_tsdefban($dato["ctades"]);
				$parrafo_a="    ".$this->conparte1.$arrctaori[0]["destip"]. " N° ".$dato["ctaori"]. " a nombre de ".
				$arrctaori[0]["nomcue"]." la cantidad de bolívares: ".H::obtenermontoescrito($dato["montra"]).";(Bs.".
				H::FormatoMonto($dato["montra"]).")".$this->conparte2.$dato["fectra"].",  a nombre de ".$arrctades[0]["nomcue"]. $this->conparte3;
				$parrafo_b="Sin otro particular al que hacer referencia, nos suscribimos a usted,";
				$parrafo_c="Atentamente,";
				$firma_a="DIRECTOR(A) GRAL DE ADMINISTRACION Y FINANZAS";
				$firma_b="TESORERO(A) GRAL DEL ESTADO MIRANDA";
				$this->SetXY(130,50);
				$fecha= date("d/m/Y");
				$dia=substr($fecha,0,2);
				$ano=substr($fecha,6,4);
				$mes=substr($fecha,3,2);
				$mesletras=H::ObtenerMesenLetras($mes);
				$this->cell(25,5,'Los Teques,   '.$dia,0,0,'');
				$this->cell(20,5,'de  '.$mesletras,0,0,'');
				$this->cell(20,5,'de '.$ano,0,0,'');
				$this->ln(10);
				$this->SetX(30);
				$this->cell(20,5,$dato["reftra"]);
				$this->ln(6);
				$this->SetX(30);
				$this->cell(20,5,"Señores:");
				$this->ln(10);
				$this->SetX(30);
                $this->MultiCell(150,8,$parrafo_a,0,'J',0);

                /////////////////////////////////////////////////////
			    $this->setFont("Arial","B",8);
			    $this->ln(5);
				$y=$this->GetY();
				$this->SetX(40);
			    $this->MultiCell(60,3,"CTA  ".$arrctades[0]["destip"],0,'C',0);
			    $this->SetXY(120,$y);
			    $this->MultiCell(60,3,"Monto Bs.",0,'C',0);

                $this->setFont("Arial","",8);
			    $this->ln(5);
				$y=$this->GetY();
				$this->SetX(40);
			    $this->MultiCell(60,3,$dato["ctades"],0,'C',0);
			    $this->SetXY(120,$y);
			    $this->MultiCell(60,3,H::FormatoMonto($dato["montra"]),0,'C',0);

				$this->ln(10);
				$this->SetX(30);
			    $this->MultiCell(150,8,"    ".$dato["destra"],0,'J',0);
			    $this->ln(5);
				$this->SetX(30);
			    $this->MultiCell(150,8,$parrafo_b,0,'C',0);
			    $this->ln(3);
				$this->SetX(30);
			    $this->MultiCell(150,8,$parrafo_c,0,'C',0);
			    $this->ln(30);




				$this->setFont("Arial","B",8);
				$y=$this->GetY();
				$this->SetX(30);
			    $this->MultiCell(60,3,$this->dirgen,0,'C',0);
			    $this->SetXY(120,$y);
			    $this->MultiCell(60,3,$this->tesgen,0,'C',0);

			    /////////////////////////////////////////////////////
				$this->ln(3);
				$this->SetX(30);
				$y_pie=$this->GetY();
			    $this->MultiCell(60,3,$firma_a,0,'C',0);
			    $this->SetXY(120,$y_pie);
			    $this->MultiCell(60,3,$firma_b,0,'C',0);
			    if ($cont<count($this->arrp))
				{
					$this-> AddPage();
				}
  			    $cont++;
			}
			unset($this->tsrcomtransbanc);
		}
	}
?>