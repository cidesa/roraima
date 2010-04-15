<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/Cabecera.php");
	require_once("../../lib/general/Herramientas.class.php");
	require_once("../../lib/modelo/sqls/presupuesto/Cprcompromiso.class.php");

	class pdfreporte extends fpdf
	{

		var $indice=0;
		var $cuantos=0;
		var $bd;
		var $tb=array();
		var $arrp=array();
		var $cuentas=array();
		var $titulos;
		var $titulos2;
		var $anchos;
		var $anchos2;
		var $campos;
		var $sql1;
		var $sql2;
		var $rep;
		var $numero;
		var $cab;
		var $compdes;
		var $comphas;
		var $fecpag1;
		var $fecpag2;
		var $tippag1;
		var $tippag2;
		var $stacom;
		var $codpre1;
		var $codpre2;
		var $comodin;
		var $posx;
		var $posy;
		var $elaborador;

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->compdes=str_replace('*',' ',H::GetPost("refcomdes"));
			$this->comphas=str_replace('*',' ',H::GetPost("refcomhas"));
			$this->bd=new Cprcompromiso();
			$this->arrp=$this->bd->sqlp($this->compdes,$this->comphas);
			$this->tb=$this->arrp;
			$this->cuantos=count($this->tb);
			$this->SetAutoPageBreak(false);
		}


		function Header()
		{
			if(H::GetPost("titulo")!="")
			{
				$this->getCabecera(H::GetPost("titulo"),"");
			}
			else
			{
				$this->getCabecera(H::GetPost("Comprobante de Compromiso"),"");
			}
			$this->Rect(10,10,196,260);
			$this->SetXY(170,30);
			$this->SetFont("arial","B",9);
			$this->Cell(30,4,"Fecha: ".date("d/m/Y"));
			$this->SetY(35);
			$this->SetFont("arial","B",11);
			$this->Cell(0,15,"AUTORIZACIÓN PRESUPUESTARIA",1,0,'C');
			$this->SetFont("arial","B",9);
			$this->Ln(18);
			$this->Cell(10);
			$this->Cell(88,4,"No. COMPROMISO: ".$this->tb[$this->indice]["refcom"],0,0,'L');
			$this->Cell(88,4,"FECHA COMPROMISO: ".$this->tb[$this->indice]["feccom"],0,0,'R');
			$this->Ln(9);
			$this->Line(10,$this->GetY()-1,206,$this->GetY()-1);
			$this->Cell(100,4,"BENEFICIARIO: ".$this->tb[$this->indice]["cedrif"]);
			$this->Ln(6);
			$this->Cell(10);
			$this->MultiCell(176,4,$this->tb[$this->indice]["nomben"],0,'C');
			$this->Ln(2);
			$this->Line(10,$this->GetY()-1,206,$this->GetY()-1);
			$this->Cell(30,4,"CONCEPTO:");
			$this->Ln(5);
			$this->Cell(10);
			$this->MultiCell(176,4,trim($this->tb[$this->indice]["descom"]));

			$this->Ln(2);
			$this->Line(10,$this->GetY(),206,$this->GetY());
			$this->SetFillColor(200,200,200);
			$this->Cell(146,5,"IMPUTACIÓN PRESUPUESTARIA",1,0,'C',1);
			$this->Cell(50,10,"MONTO",1,0,'C');
			$this->Ln(5);
			$this->Cell(12,5,"AÑO",1,0,'C');
			$this->SetFont("arial","",6);
			$niveles=$this->bd->sql_cpniveles();
			$ancho=134/count($niveles);
			foreach($niveles as $regniv)
			{
				$this->Cell($ancho,5,$regniv["nomabr"],1,0,'C');
			}
			$empieza=$this->GetY()+5;
			$this->Line(156,$this->GetY(),156,210);

			$this->SetFont("arial","B",9);
			$this->SetY(165);
			$this->Cell(146,5,"CÓDIGO CONTABLE",1,0,'C',1);
			$this->Cell(50,5,"MONTO",1,0,'C');

			$this->SetFont("arial","B",8);
			$this->Rect(10,210,65.3,30);
			$this->Rect(10+65.3,210,65.3,30);
			$this->Rect(10+(65.3*2),210,65.3,30);
			$this->SetY(210);
			$this->Cell(65.3,4,"PRESUPUESTO",0,0,'C');
			$this->Cell(65.3,4,"ADMINISTRACIÓN",0,0,'C');
			$this->Cell(65.3,4,"REVISADO",0,0,'C');
			$this->Ln(4);
			$this->Cell(65.3,4,"fecha:");
			$this->Cell(65.3,4,"fecha:");
			$this->Cell(65.3,4,"fecha:");
			$this->SetXY(10,232);
			$this->MultiCell(65.3,4,trim(H::GetPost("dirpre")).chr(10).chr(13)."COORDINACIÓN DE PRESUPUESTO",0,'C');
			$this->SetXY(10+65.3,232);
			$this->MultiCell(65.3,4,trim(H::GetPost("dirfin")).chr(10).chr(13)."COORDINACIÓN DE FINANZAS",0,'C');
			$this->SetXY(10+(65.3*2),232);
			$this->MultiCell(65.3,4,trim(H::GetPost("anapre")).chr(10).chr(13)."OFICINA DE AUDITORÍA INTERNA",0,'C');
			//-----------------------------//
			$this->Rect(10,240,98,30);
			$this->Rect(108,240,98,30);
			$this->SetY(240);
			$this->Cell(98,4,"CONFORMADO",0,0,'C');
			$this->SetXY(10,262);
			$this->MultiCell(98,4,trim(H::GetPost("diradm")).chr(10).chr(13)."OFICINA DE APOYO ADMINISTRATIVO",0,'C');
			$this->SetXY(10+98,262);
			$this->MultiCell(98,4,trim(H::GetPost("dirgen")).chr(10).chr(13)."PRESIDENTE",0,'C');
			$this->SetY($empieza);
		}
		function Cuerpo()
		{
			$ref=$this->tb[$this->indice]["refcom"];
			$posy1=$this->GetY();
			$empieza1=$this->GetY();
			$posy2=170;
			$empieza2=170;
			$totcom=0;
			//print $this->indice."***".$this->cuantos.chr(10).chr(13);//exit;
			while(($ref == $this->tb[$this->indice]["refcom"]) and ($this->indice < $this->cuantos))
			{
				$this->SetY($posy1);
				$this->SetFont("arial","",8);
				$this->Cell(12,4,$this->tb[$this->indice]["anopre"],0,0,'C');
				$niveles=$this->bd->sql_cpniveles();
				$ancho=134/count($niveles);
				$i=0;
				$partecodpre=explode("-",trim($this->tb[$this->indice]["codpre"]));
				foreach($niveles as $regniv)
				{
					$this->Cell($ancho,5,$partecodpre[$i],0,0,'C');
					$i++;
				}
				//$this->Cell(134,4,$this->tb[$this->indice]["codpre"],0,0,'C');
				$this->Cell(50,8,number_format($this->tb[$this->indice]["monimp"],2,'.',','),0,0,'R');
				$totcom+=$this->tb[$this->indice]["monimp"];
				$this->Ln(4);
				$this->Cell(12);
				$this->Cell(134,4,ucwords(strtolower($this->tb[$this->indice]["nompre"])),0,0,'L');
				$posy1+=$this->GetY()+4;

				$this->SetY($posy2);
				if(!in_array($this->tb[$this->indice]["codcta"],$this->cuentas))
				{
					$ctacont=$this->bd->sql_contabb($this->tb[$this->indice]["refcom"],$this->tb[$this->indice]["codcta"]);
					$this->Cell(146,4,$this->tb[$this->indice]["codcta"]." - ".$ctacont[0]["descta"],0,0,'L');
					$this->Cell(50,8,number_format($ctacont[0]["totcta"],2,'.',','),0,0,'R');
					$posy2+=$this->GetY()+4;
					array_unshift($this->cuentas,$this->tb[$this->indice]["codcta"]);
				}

				$this->indice++;
				if($posy1>=156 or $posy2>=206 or  $ref!=$this->tb[$this->indice]["refcom"])
				{
					$posy1=$empieza1;
					$posy2=$empieza2;
					if($ref!=$this->tb[$this->indice]["refcom"])
					{
						$this->SetFont("arial","",9);
						$this->SetFillColor(200,200,200);
						$this->SetY(160);
						$this->Cell(146,5,"TOTAL AUTORIZACIÓN",1,0,'C',1);
						$this->Cell(50,5,number_format($totcom,2,'.',','),1,0,'R');
						$ref=$this->tb[$this->indice]["refcom"];
						$totcom=0;
						$this->cuentas=array();

					}
					if($this->indice < $this->cuantos)
					{
						$this->AddPage();
					}
				}
				else
				{
					$this->line(10,$this->GetY(),206,$this->GetY());
				}
			}
			unset($this->bd);
		}
	}
?>