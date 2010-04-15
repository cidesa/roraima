<?
require_once ("../../lib/general/fpdf/fpdf.php");
require_once ("../../lib/bd/basedatosAdo.php");
require_once ("../../lib/general/cabecera.php");

class pdfreporte extends fpdf {

	var $acum1 = 0;
	var $acum2 = 0;
	var $acum3 = 0;
	var $acum4 = 0;
	var $acum1t = 0;
	var $acum2t = 0;
	var $acum3t = 0;
	var $acum4t = 0;
	var $cont = 0;
	var $cont1 = 0;
	var $result = 0;
	var $bd;
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
	var $rcpart1;
	var $rcpart2;
	var $codpro1;
	var $codpro2;
	var $codart1;
	var $codart2;
	var $fecreg1;
	var $fecreg2;
	var $status;

	function pdfreporte() {
		$this->fpdf("l", "mm", "Letter");

	$this->arrp=array("no_vacio");
			$this->bd = new basedatosAdo();
		$this->bd->validar();
		$this->titulos = array ();
		$this->titulos2 = array ();
		$this->campos = array ();
		$this->anchos = array ();
		$this->anchos2 = array ();
		$this->rcpart1 = H::GetPost("rcpart1");
		$this->rcpart2 = H::GetPost("rcpart2");
		$this->codpro1 = H::GetPost("codpro1");
		$this->codpro2 = H::GetPost("codpro2");
		$this->codart1 = H::GetPost("codart1");
		$this->codart2 = H::GetPost("codart2");
		$this->fecreg1 = H::GetPost("fecreg1");
		$this->fecreg2 = H::GetPost("fecreg2");
		$this->status = H::GetPost("status");

		if ($this->status == 'T') {

			$this->sql = "SELECT A.RCPART as arcpart, to_char(A.FECRCP,'DD/MM/YYYY') as afecrcp, A.CODPRO as acodpro, E.NOMPRO as enompro, A.DESRCP as adesrcp, A.NUMFAC as anumfac,
									A.MONRCP as amonrcp, A.STARCP as starcp, B.CODART as bcodart, B.ORDCOM as bordcom ,B.CANREC as bcanrec, B.CANDEV as bcandev,
									B.CANTOT as bcantot, B.MONTOT as bmontot, C.DESART as cdesart, C.COSULT as cosult
									FROM CARCPART A, CAARTRCP B, CAREGART C, CAPROVEE E WHERE
											 (A.RCPART) = (B.RCPART) AND " .
			"(A.CODPRO) = (E.CODPRO) AND " .
			"(B.CODART)  = (C.CODART) AND
											 (A.RCPART) >= ('" . $this->rcpart1 . "') AND " .
			"(A.RCPART) <= ('" . $this->rcpart2 . "') AND
											 (A.CODPRO) >= ('" . $this->codpro1 . "') AND " .
			"(A.CODPRO) <= ('" . $this->codpro2 . "') AND
											 (B.CODART) >= ('" . $this->codart1 . "') AND " .
			"(B.CODART) <= ('" . $this->codart2 . "') AND
											A.FECRCP >= to_date('" . $this->fecreg1 . "','dd/mm/yyyy') AND " .
			"A.FECRCP <= to_date('" . $this->fecreg2 . "','dd/mm/yyyy')
									GROUP BY A.RCPART , A.FECRCP, A.CODPRO, E.NOMPRO, A.DESRCP, A.NUMFAC,
									A.MONRCP, A.STARCP, B.CODART, B.ORDCOM, B.CANREC, B.CANDEV,
									B.CANTOT, B.MONTOT, C.DESART, C.COSULT";

		} else {
			$this->sql = "SELECT A.RCPART as arcpart, to_char(A.FECRCP,'DD/MM/YYYY') as afecrcp, A.CODPRO as acodpro, E.NOMPRO as enompro, A.DESRCP as adesrcp, A.NUMFAC as anumfac,
									A.MONRCP as amonrcp, A.STARCP as starcp, B.CODART as bcodart, B.ORDCOM as bordcom ,B.CANREC as bcanrec, B.CANDEV as bcandev,
									B.CANTOT as bcantot, B.MONTOT as bmontot, C.DESART as cdesart, C.COSULT as cosult
									FROM CARCPART A, CAARTRCP B, CAREGART C, CAPROVEE E WHERE
									(A.RCPART) = (B.RCPART) AND (A.CODPRO) = (E.CODPRO) AND (B.CODART)  = (C.CODART)  AND
									(A.RCPART) >= ('" . $this->rcpart1 . "') AND (A.RCPART) <= ('" . $this->rcpart2 . "') AND
									(A.CODPRO) >= ('" . $this->codpro1 . "') AND (A.CODPRO) <= ('" . $this->codpro2 . "') AND
									(B.CODART) >= ('" . $this->codart1 . "') AND (B.CODART) <= ('" . $this->codart2 . "') AND
									A.FECRCP >= to_date('" . $this->fecreg1 . "','dd/mm/yyyy') AND A.FECRCP <= to_date('" . $this->fecreg2 . "','dd/mm/yyyy') AND
									A.STARCP = '" . $this->status . "' GROUP BY A.RCPART , A.FECRCP, A.CODPRO, E.NOMPRO, A.DESRCP, A.NUMFAC,
									A.MONRCP, A.STARCP, B.CODART, B.ORDCOM, B.CANREC, B.CANDEV,
									B.CANTOT, B.MONTOT, C.DESART, C.COSULT";

		}


$this->llenartitulosmaestro();
		$this->llenartitulos2();
		$this->cab = new cabecera();
		$this->SetAutoPageBreak(true, 32);

  for($i=0;$i<count($this->titulos);$i++)
  {
    $this->anchos[$i]=$this->getAncho($i);
  }
  for($i=0;$i<count($this->titulos2);$i++)
  {
    $this->anchos2[$i]=$this->getAncho2($i);
  }

	}
	function getAncho($pos)
	{
		$anchos=array();
		$anchos[0]=30;
		$anchos[1]=50;
		$anchos[2]=20;
		$anchos[3]=20;
		$anchos[4]=60;
		$anchos[5]=30;
		$anchos[6]=40;
		$anchos[7]=25;
		$anchos[8]=25;
		$anchos[9]=30;
		$anchos[10]=30;
		$anchos[11]=30;

		return $anchos[$pos];
	}
	function getAncho2($pos)
	{
		$anchos2=array();
		$anchos2[0]=30;
		$anchos2[1]=100;
		$anchos2[2]=25;
		$anchos2[3]=30;
		$anchos2[4]=30;
		$anchos2[5]=30;
		$anchos2[6]=30;
		$anchos2[7]=40;
/*		$anchos2[7]=30;
		$anchos2[8]=30;
		$anchos2[9]=30;
		$anchos2[10]=30;
		$anchos2[11]=30;*/

		return $anchos2[$pos];
	}


	function llenartitulosmaestro() {
		$this->titulos[0] = "Nro Recepción";
		$this->titulos[1] = "Descripción Recepción";
		$this->titulos[2] = "Fecha";
		$this->titulos[3] = "Status";
		$this->titulos[4] = "Proveedor";
		$this->titulos[5] = "Nro Factura";
		$this->titulos[6] = "Nro Orden de Compra";
	}

	function llenartitulos2() {
		$this->titulos2[0] = "Código Artículo";
		$this->titulos2[1] = "Descripción Artículo";
		$this->titulos2[2] = "Cant. Rec.";
		$this->titulos2[3] = "Cant. Dev.";
		$this->titulos2[4] = "Precio Artículo";
		$this->titulos2[5] = "Total Artículo";

	}

	function Header() {
				$this->cab->poner_cabecera($this,H::GetPost("titulo"),"l","s");
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);

			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],7,$this->titulos[$i]);
			}
			 $this->ln();
 			$this->SetTextColor(0,0,0);
			$this->setFont("Arial","",8);
			for($i=0;$i<$ncampos2-2;$i++)
			{
				$this->cell($this->anchos2[$i],7,$this->titulos2[$i]);
			}
			$this->cell($this->anchos2[$i],7,$this->titulos2[5],0,0,'R');
			$this->cell($this->anchos2[$i],7,$this->titulos2[6],0,0,'R');
			$this->Line(10,50,270,50);

   		    $this->ln();
	}

	function Cuerpo() {
		$fec = date("d/m/Y");
		$this->SetTextColor(0, 0, 128);
		$this->cell(45, 5, "Al:  " . $fec);
		$this->ln();
		$this->SetTextColor(0, 0, 0);
		$tb = $this->bd->select($this->sql);
		$this->tb2 = $tb;
		$tb2 = $this->bd->select($this->sql);
		$this->setFont("Arial", "", 8);
		if (!$tb2->EOF) {
			$ref = $tb2->fields["arcpart"];
			$this->SetLineWidth(0.2);
			$this->setFont("Arial", "", 8);
			$this->Line(10, $this->GetY(), 270, $this->GetY());
			$this->cell($this->anchos[0], 5, " " . $tb2->fields["arcpart"]);
			$this->cell($this->anchos[1], 5, " " . substr($tb2->fields["adesrcp"], 0, 35));
			$this->cell($this->anchos[2], 5, " " . $tb2->fields["afecrcp"]);
			if ($tb2->fields["starcp"] == 'a') {
				$this->cell($this->anchos[3], 5, "Activas");
			}
			if ($tb2->fields["starcp"] == 'n') {
				$this->cell($this->anchos[3], 5, "Anuladas");
			}
			$this->cell($this->anchos[4], 5, " " . substr($tb2->fields["enompro"], 0, 55));
			$this->cell($this->anchos[5], 5, " " . $tb2->fields["anumfac"]);
			$this->cell($this->anchos[6], 5, " " . $tb2->fields["bordcom"]);
			//				 $this->Line(10,$this->GetY()+5,270,$this->GetY()+5);
			$this->ln();
			$this->ln();
		}
		while (!$tb->EOF) {
			if ($tb->fields["arcpart"] != $ref) {
				$this->SetLineWidth(0.2);
				//				 $this->ln();
				$this->SetLineWidth(0.3);
				$this->setFont("Arial", "B", 8);
				$this->Line(135, $this->GetY(), 270, $this->GetY());
				$this->cell($this->anchos2[0], 5, "");
				$this->cell($this->anchos2[1], 5, "                                                                                       TOTAL RECEPCION");
				$this->cell($this->anchos2[2], 5, "" . H::FormatoMonto($this->acum1, 0, '.', ','), 0, 0, 'R');
				$this->cell($this->anchos2[3], 5, "" . H::FormatoMonto($this->acum2, 0, '.', ','), 0, 0, 'R');
				$this->cell($this->anchos2[4], 5, "" . H::FormatoMonto($this->acum3, 2, '.', ','), 0, 0, 'R');
				$this->cell($this->anchos2[5], 5, "" . H::FormatoMonto($this->acum4, 2, '.', ','), 0, 0, 'R');
				$this->setFont("Arial", "", 8);
				//				 $this->ln();
				//	    	 $this->Line(0,$this->GetY(),270,$this->GetY());
				$this->acum1 = 0;
				$this->acum2 = 0;
				$this->acum3 = 0;
				$this->acum4 = 0;
				$this->ln();
				$this->SetLineWidth(0.2);
				$this->Line(10, $this->GetY(), 270, $this->GetY());
				$this->cell($this->anchos[0], 5, " " . $tb->fields["arcpart"]);
				$this->cell($this->anchos[1], 5, " " . substr($tb->fields["adesrcp"], 0, 35));
				$this->cell($this->anchos[2], 5, " " . $tb->fields["afecrcp"]);
				if ($tb->fields["starcp"] == 'a') {
					$this->cell($this->anchos[3], 5, "Activas");
				}
				if ($tb->fields["starcp"] == 'n') {
					$this->cell($this->anchos[3], 5, "Anuladas");
				}
				$this->cell($this->anchos[4], 5, " " . substr($tb->fields["enompro"], 0, 55));
				$this->cell($this->anchos[5], 5, " " . $tb->fields["anumfac"]);
				$this->cell($this->anchos[6], 5, " " . $tb->fields["bordcom"]);
				//			 $this->Line(10,$this->GetY()+5,270,$this->GetY()+5);
				$this->SetTextColor(0, 0, 0);
				$this->ln();
				$this->ln();

			}
			$this->setFont("Arial", "", 8);
			//Detalle
			$this->cell($this->anchos2[0], 5, "" . $tb->fields["bcodart"]);
			$this->cell($this->anchos2[1], 5, "" . substr($tb->fields["cdesart"], 0, 80));
			$this->cell($this->anchos2[2], 5, "" . H::FormatoMonto($tb->fields["bcanrec"], 0, '.', ','), 0, 0, 'R');
			$this->cell($this->anchos2[3], 5, "" . H::FormatoMonto($tb->fields["bcandev"], 0, '.', ','), 0, 0, 'R');
			$this->cell($this->anchos2[4], 5, "" . H::FormatoMonto($tb->fields["bcantot"], 2, '.', ','), 0, 0, 'R');
			$this->cell($this->anchos2[5], 5, "" . H::FormatoMonto($tb->fields["bmontot"], 2, '.', ','), 0, 0, 'R');
			$this->acum1 = ($this->acum1 + $tb->fields["bcanrec"]);
			$this->acum2 = ($this->acum2 + $tb->fields["bcandev"]);
			$this->acum3 = ($this->acum3 + $tb->fields["bcantot"]);
			$this->acum4 = ($this->acum4 + $tb->fields["bmontot"]);
			$this->acum1t = ($this->acum1t + $tb->fields["bcanrec"]);
			$this->acum2t = ($this->acum2t + $tb->fields["bcandev"]);
			$this->acum3t = ($this->acum3t + $tb->fields["bcantot"]);
			$this->acum4t = ($this->acum4t + $tb->fields["bmontot"]);
			$this->ln();
			$tb->MoveNext();

		}
		$this->SetLineWidth(0.3);
		$this->setFont("Arial", "B", 8);
		$this->Line(135, $this->GetY(), 270, $this->GetY());
		$this->cell($this->anchos2[0], 5, "");
		$this->cell($this->anchos2[1], 5, "                                                                                       TOTAL RECEPCION");
		$this->cell($this->anchos2[2], 5, "" . H::FormatoMonto($this->acum1, 0, '.', ','), 0, 0, 'R');
		$this->cell($this->anchos2[3], 5, "" . H::FormatoMonto($this->acum2, 0, '.', ','), 0, 0, 'R');
		$this->cell($this->anchos2[4], 5, "" . H::FormatoMonto($this->acum3, 2, '.', ','), 0, 0, 'R');
		$this->cell($this->anchos2[5], 5, "" . H::FormatoMonto($this->acum4, 2, '.', ','), 0, 0, 'R');
		$this->ln();
		$this->Line(10, $this->GetY(), 270, $this->GetY());
		$this->SetLineWidth(0.5);
		$this->ln();
		$this->cell($this->anchos2[0], 4, "");
		$this->cell($this->anchos2[1], 4, "                                                                                                          TOTALES");
		$this->cell($this->anchos2[2], 4, "" . H::FormatoMonto($this->acum1t, 0, '.', ','), 0, 0, 'R');
		$this->cell($this->anchos2[3], 4, "" . H::FormatoMonto($this->acum2t, 0, '.', ','), 0, 0, 'R');
		$this->cell($this->anchos2[4], 4, "" . H::FormatoMonto($this->acum3t, 2, '.', ','), 0, 0, 'R');
		$this->cell($this->anchos2[5], 4, "" . H::FormatoMonto($this->acum4t, 2, '.', ','), 0, 0, 'R');
		$this->bd->closed();
	}

}
?>