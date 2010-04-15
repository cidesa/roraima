<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $bd;
		var $tbg;
		var $titulos;
		var $titulos2;
		var $anchos;
		var $anchos2;
		var $campos;
		var $sql1;
		var $sql;
		var $sql2;
		var $sqla;
		var $sqlax;
		var $sqlb;
		var $sqlc;
		var $sqlx;
		var $sqlt;
		var $rep;
		var $numero;
		var $cab;
		var $con1;
		var $con2;
		var $car1;
		var $car2;
		var $niv1;
		var $niv2;
		var $emp1;
		var $emp2;
		var $nom;
		var $nombre;

		var $tipcon;

		var $fecha1;
		var $fecha2;
		var $fechae1;
		var $fechae2;
		var $estado;
		var $auxd=0;
		var $car;
		var $salant=0;
		var $salact=0;

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->arrp=array('no-vacio');

			$this->con1=$_POST["con1"];
			$this->con2=$_POST["con2"];
			//$this->especial=$_POST["especial"];

			$this->tipcon=$_POST["tipcon"];

	        $this->tipnomesp=$_POST["tipnomesp"];
			$this->elaborado=$_POST["elaborado"];
			$this->revisado=$_POST["revisado"];
            $this->especial = $_POST["especial"];

   if ($this->especial == 'S')
            {
            	$especial = " a.especial = 'S' AND
		(A.CODNOMESP) = TRIM('".$this->tipnomesp."') AND
 ";
            }
              else
            {  if ($this->especial == 'N')       	$especial = " a.especial = 'N' AND"; else
            	if ($this->especial == 'T') $especial = "";
            }

 			$this->sql= " SELECT DISTINCT(A.CODCON), B.NOMCON, A.CODNOM as codnom ,A.NOMNOM as nomnom, to_Char(c.ultfec,'dd/mm/yyyy') as ultfec, to_char(c.profec,'dd/mm/yyyy') as profec,c.numsem,c.frecal, A.ASIDED,
							SUM(CASE WHEN A.SALDO=0 THEN 0 ELSE 1 END ) AS CANT,
							SUM(CASE WHEN A.ASIDED='A' THEN A.SALDO ELSE 0 END) AS ASIGNA,
							SUM(CASE WHEN A.ASIDED='D' THEN A.SALDO ELSE 0 END) AS DEDUC ,
							SUM(CASE WHEN A.ASIDED='P' THEN A.SALDO ELSE 0 END ) AS APORTE ,
							B.IMPCPT, b.codpar
							FROM NPNOMCAL A, NPDEFCPT B, NPNOMINA C
							WHERE
							--upper(a.especial)='".$this->especial."' and
							a.codnom=c.codnom and
							(A.CODNOM) >= ('".$this->con1."') AND
							(A.CODNOM) <= ('".$this->con2."') AND
							A.SALDO > 0  AND
							A.ASIDED LIKE '".$this->tipcon."' AND".$especial."
							(B.CODCON) = (A.CODCON)
							GROUP BY A.CODNOM,A.ASIDED,A.CODCON,B.NOMCON,A.NOMNOM,c.ultfec, c.profec,c.numsem,c.frecal, B.IMPCPT,b.codpar
							ORDER BY A.CODNOM,A.ASIDED, A.CODCON";
						//	print '<pre>'; print $this->sql;

		// este sql no esta filtrando por las fechas, deberia hacerlo y revisar por que asigna directamente los tipos de asided
			$this->tbg=$this->bd->select($this->sql);
			$this->ref=$this->tbg->fields['codnom'];
			$this->nomnom=$this->tbg->fields['nomnom'];
			$this->ultfec=$this->tbg->fields['ultfec'];
			$this->profec=$this->tbg->fields['profec'];
			$this->numsem=$this->tbg->fields['numsem'];

		}


		function Header()
		{
			$this->cab=new cabecera();
			$this->SetTextColor(0,0,0);
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","B",9);
			$this->ln(-1);
			$this->SetXY(10,35);
			$this->cell(20,5,"NÓMINA ".$this->ref." - ".$this->nomnom);
			$this->SetTextColor(0,0,128);
			$this->SetXY(122,35);
			$this->cell(25,5,"PERIODO DE: ");
			$this->SetTextColor(0,0,0);
			$this->cell(15,5,$this->ultfec);
			$this->SetTextColor(0,0,128);
			$this->cell(15,5,"  AL  ");
			$this->SetTextColor(0,0,0);
			$this->cell(15,5,$this->profec);
			if($this->tbg->fields['frecal']=='S')
			{
				$this->ln();
				$this->cell(30,5,"NRO. SEMANA: ".$this->numsem);
			}
			$this->Line(10,$this->GetY()+5,200,$this->GetY()+5);
			$this->ln();
			$this->setWidths(array(30,70,40,40));
			$this->setAligns(array('C','C','C','C'));
			$this->Row(array("CONCEPTO","DESCRIPCION","FUNCIONARIOS","MONTO"));
			$this->setAligns(array('C','L','R','R'));
			$this->ln(8);

	}

	function Cuerpo()
	{
		$totasigna=0;
		$totdeduc=0;
		$totaport=0;
		$contador=0;
		$contadornom=0;
		$netonom=0;
		$totasignanom=0;
		$totdeducnom=0;
		$totaportnom=0;
		$nominanom=0;
		$this->ref=$this->tbg->fields['codnom'];
		$this->nomnom=$this->tbg->fields['nomnom'];
		$this->ultfec=$this->tbg->fields['ultfec'];
		$this->profec=$this->tbg->fields['profec'];
		$this->numsem=$this->tbg->fields['numsem'];
		$asi=$this->tbg->fields['asided'];
		$this->SetTexTColor(0,0,200);
		$this->setFont("Arial","B",9);
		if(strtoupper($this->tbg->fields["asided"])=="A")
		{
			$this->Cell(50,5,"ASIGNACIONES");
		}
		elseif(strtoupper($this->tbg->fields["asided"])=="D")
		{
			$this->Cell(50,5,"DEDUCCCIONES");
		}
		elseif(strtoupper($this->tbg->fields["asided"])=="P")
		{
			$this->Cell(50,5,"APORTES PATRONALES");
		}
		$this->Ln(8);
		$this->SetTexTColor(0,0,0);
		$this->setFont("Arial","",9);

		while(!$this->tbg->EOF)
		{

			if ($this->ref!=$this->tbg->fields['codnom']){
				$this->setFont("Arial","B",9);
				if (strtoupper($asi)=='A'){
					$this->Cell(180,5,"TOTAL ASIGNACIONES...   ".number_format($totasignanom,2,',','.'),0,0,'R');
					$this->Ln(7);
				}elseif (strtoupper($asi)=='D'){
					$this->Cell(180,5,"TOTAL DEDUCCCIONES...   ".number_format($totdeducnom,2,',','.'),0,0,'R');
					$this->Ln(7);
				}elseif (strtoupper($asi)=='P'){
					$this->Cell(180,5,"TOTAL APORTES...   ".number_format($totaportnom,2,',','.'),0,0,'R');
					$this->Ln(7);
				}
				$this->Cell(170,5,"CONCEPTOS     ".$contadornom);
				$netonom = $totasignanom - $totdeducnom;
				$this->Cell(10,5,"NETO A PAGAR...     ".number_format($netonom,2,',','.'),0,0,'R');
				$this->Ln(5);
				$this->Cell(170,5,"GASTOS DE NOMINA");
				$nominanom=$totasignanom+$totaportnom;
				$this->Cell(10,5,number_format($nominanom,2,',','.'),0,0,'R');
				$contadornom=0;
				$netonom=0;
				$totasignanom=0;
				$totdeducnom=0;
				$totaportnom=0;
				$nominanom=0;
				$this->ref=$this->tbg->fields['codnom'];
				$this->nomnom=$this->tbg->fields['nomnom'];
				$this->ultfec=$this->tbg->fields['ultfec'];
				$this->profec=$this->tbg->fields['profec'];
				$this->numsem=$this->tbg->fields['numsem'];
				$asi=$this->tbg->fields['asided'];
				$this->AddPage();
				$this->SetTexTColor(0,0,200);
				$this->setFont("Arial","B",9);
				if(strtoupper($this->tbg->fields["asided"])=="A")
				{
					$this->Cell(50,5,"ASIGNACIONES");
				}
				elseif(strtoupper($this->tbg->fields["asided"])=="D")
				{
					$this->Cell(50,5,"DEDUCCCIONES");
				}
				elseif(strtoupper($this->tbg->fields["asided"])=="P")
				{
					$this->Cell(50,5,"APORTES PATRONALES");
				}
				$this->Ln(8);
				$this->SetTexTColor(0,0,0);
				$this->setFont("Arial","",9);
			}
			$this->setFont("Arial","B",9);
			if ($asi!=$this->tbg->fields['asided'] && $this->ref==$this->tbg->fields['codnom']){
				if (strtoupper($asi)=='A'){
					$this->Cell(180,5,"TOTAL ASIGNACIONES...   ".number_format($totasignanom,2,',','.'),0,0,'R');
					$this->Ln(7);
				}elseif (strtoupper($asi)=='D'){
					$this->Cell(180,5,"TOTAL DEDUCCCIONES...   ".number_format($totdeducnom,2,',','.'),0,0,'R');
					$this->Ln(7);
				}elseif (strtoupper($asi)=='P'){
					$this->Cell(180,5,"TOTAL APORTES...   ".number_format($totaportnom,2,',','.'),0,0,'R');
					$this->Ln(7);
				}
				$this->SetTexTColor(0,0,200);
				$this->setFont("Arial","B",9);
				if(strtoupper($this->tbg->fields["asided"])=="A")
				{
					$this->Cell(50,5,"ASIGNACIONES");
				}
				elseif(strtoupper($this->tbg->fields["asided"])=="D")
				{
					$this->Cell(50,5,"DEDUCCCIONES");
				}
				elseif(strtoupper($this->tbg->fields["asided"])=="P")
				{
					$this->Cell(50,5,"APORTES PATRONALES");
				}
				$this->Ln(8);
				$this->SetTexTColor(0,0,0);
				$this->setFont("Arial","",9);
			}
			$cuantos = $this->bd->select("SELECT COUNT(DISTINCT(CODEMP)) as numero FROM NPNOMCAL WHERE trim(asided)=trim('".$this->tbg->fields["asided"]."') and trim(codcon) = trim('".$this->tbg->fields["codcon"]."')")->fields["numero"];
			if(strtoupper($this->tbg->fields["asided"])=="A")
			{
				$totasigna+=$this->tbg->fields["asigna"];
				$totasignanom+=$this->tbg->fields["asigna"];
				$monto=$this->tbg->fields["asigna"];
				$montonom=$this->tbg->fields["asigna"];
			}
			elseif(strtoupper($this->tbg->fields["asided"])=="D")
			{
				$totdeduc+=$this->tbg->fields["deduc"];
				$monto=$this->tbg->fields["deduc"];
				$totdeducnom+=$this->tbg->fields["deduc"];
				$montonom=$this->tbg->fields["deduc"];
			}
			elseif(strtoupper($this->tbg->fields["asided"])=="P")
			{
				$totaport+=$this->tbg->fields["aporte"];
				$monto=$this->tbg->fields["aporte"];
				$totaportnom+=$this->tbg->fields["aporte"];
				$montonom=$this->tbg->fields["aporte"];
			}
			$this->setFont("Arial","",9);
			$this->Row(array($this->tbg->fields["codcon"],trim($this->tbg->fields["nomcon"]),$cuantos,H::Formatomonto($monto)));
			$contador++;
			$contadornom++;
			$this->ref=$this->tbg->fields['codnom'];
			$this->nomnom=$this->tbg->fields['nomnom'];
			$this->ultfec=$this->tbg->fields['ultfec'];
			$this->profec=$this->tbg->fields['profec'];
			$this->numsem=$this->tbg->fields['numsem'];
			$asi=$this->tbg->fields['asided'];
			$this->tbg->MoveNext();
		}
			$this->ln();
			$this->setFont("Arial","B",9);
				if (strtoupper($asi)=='A'){
					$this->Cell(180,5,"TOTAL ASIGNACIONES...   ".number_format($totasignanom,2,',','.'),0,0,'R');
					$this->Ln(7);
				}elseif (strtoupper($asi)=='D'){
					$this->Cell(180,5,"TOTAL DEDUCCCIONES...   ".number_format($totdeducnom,2,',','.'),0,0,'R');
					$this->Ln(7);
				}elseif (strtoupper($asi)=='P'){
					$this->Cell(180,5,"TOTAL APORTES...   ".number_format($totaportnom,2,',','.'),0,0,'R');
					$this->Ln(7);
				}
				$this->Cell(170,5,"CONCEPTOS     ".$contadornom);
				$netonom = $totasignanom - $totdeducnom;
				$this->Cell(10,5,"NETO A PAGAR...     ".number_format($netonom,2,',','.'),0,0,'R');
				$this->Ln(5);
				$this->Cell(170,5,"GASTOS DE NOMINA");
				$nominanom=$totasignanom+$totaportnom;
				$this->Cell(10,5,number_format($nominanom,2,',','.'),0,0,'R');
				$this->ln(15);
				$this->SetTexTColor(0,0,200);
				$this->setFont("Arial","B",9);
				$this->Cell(180,5,"TOTAL GENERAL  ",0,0,'L');
				$this->SetTexTColor(0,0,0);
				$this->ln();
				$this->Cell(180,5,"TOTAL ASIGNACIONES GENERAL...   ".number_format($totasigna,2,',','.'),0,0,'R');
				$this->Ln(7);

				$this->Cell(180,5,"TOTAL DEDUCCCIONES GENERAL...   ".number_format($totdeduc,2,',','.'),0,0,'R');
				$this->Ln(7);

				$this->Cell(180,5,"TOTAL APORTES GENERAL...   ".number_format($totaport,2,',','.'),0,0,'R');
				$this->Ln(7);
				$this->Cell(170,5,"CONCEPTOS     ".$contador);
				$neto = $totasigna - $totdeduc;
				$this->Cell(10,5,"NETO A PAGAR...     ".number_format($neto,2,',','.'),0,0,'R');
				$this->Ln(5);
				$this->Cell(170,5,"GASTOS DE NOMINA");
				$nomina=$totasigna+$totaport;
				$this->Cell(10,5,number_format($nomina,2,',','.'),0,0,'R');


					$this->setXY(20,240);
		$this->setFont("Arial","B",8);
		$this->cell(25,5,"Elaborado por:  ",0,0,'L');
		$this->setFont("Arial","",8);
		$this->cell(50,5,$this->elaborado,0,0,'C');
		$this->setX(120);
		$this->setFont("Arial","B",8);
		$this->cell(25,5,"Revisado por:  ",0,0,'L');
		$this->setFont("Arial","",8);
		$this->cell(50,5,$this->revisado,0,0,'C');
		$this->Line(45,245,95,245);
		$this->Line(145,245,195,245);


				$this->bd->closed();
	}


}

?>
