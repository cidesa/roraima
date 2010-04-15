<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $bd;
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
		 var $especial;

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->arrp=array('no_vacio');

			$this->fecha1=$_POST["fecha1"];
			$this->fecha2=$_POST["fecha2"];
			$this->con1=$_POST["con1"];
			$this->con2=$_POST["con2"];
			$this->tipcon=$_POST["tipcon"];
			$this->elaborado=$_POST["elaborado"];
			$this->revisado=$_POST["revisado"];
			$this->autorizado=$_POST["autorizado"];
				$this->direccion=$_POST["direccion"];
				 $this->especial=$_POST["especial"];
				  $this->fechades=$_POST["fechades"];
	       $this->fechahas=$_POST["fechahas"];
	         $this->tipnomesp1=$_POST["tipnomesp1"];
	           $this->tipnomesp2=$_POST["tipnomesp2"];


if ($this->especial=='S'){
	$this->nomespecial=" a.codnomesp>='".$this->tipnomesp1."' and a.codnomesp<='".$this->tipnomesp2."' and";
}

 			$this->sql= " SELECT DISTINCT(A.CODCON), B.NOMCON, A.CODNOM as codnom , B.OPECON as asided,
							SUM(CASE WHEN A.MONTO=0 THEN 0 ELSE 1 END ) AS CANT,
							SUM(CASE WHEN B.OPECON='A' THEN A.MONTO ELSE 0 END) AS ASIGNA,
							SUM(CASE WHEN B.OPECON='D' THEN A.MONTO ELSE 0 END) AS DEDUC ,
							SUM(CASE WHEN (B.OPECON='P' and A.CODCON <> 'P33' and A.CODCON <> 'P34' and A.CODCON <> 'P35' and A.CODCON <> 'P36'  ) THEN A.MONTO ELSE 0 END ) AS APORTE ,
							B.IMPCPT, b.codpar, C.NOMNOM
							FROM NPHISCON A, NPDEFCPT B, NPNOMINA C

							WHERE
							 A.CODNOM=C.CODNOM AND
							(A.CODNOM) >= TRIM('".$this->con1."') AND
							(A.CODNOM) <= TRIM('".$this->con2."') AND
                            A.especial='".$this->especial."' AND ".$this->nomespecial."
							A.MONTO > 0  AND
							B.OPECON LIKE '".$this->tipcon."' AND
							(B.CODCON) = (A.CODCON) and
						      a.fecnom>=to_date('".$this->fechades."','dd/mm/yyyy') and
							 a.fecnom<=to_date('".$this->fechahas."','dd/mm/yyyy')
							GROUP BY A.CODCON,B.NOMCON,A.CODNOM,B.OPECON, B.IMPCPT,b.codpar, C.NOMNOM
							ORDER BY A.CODNOM, B.OPECON, A.CODCON";
 		//	print '<pre>'; print  $this->sql;exit;
		// este sql no esta filtrando por las fechas, deberia hacerlo y revisar por que asigna directamente los tipos de asided


		}


		function Header()
		{
			$this->cab=new cabecera();
			$this->SetTextColor(0,0,0);
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","B",9);
/*
			$this->ln(-1);
			$this->SetTextColor(0,0,128);
			$this->SetXY(130,35);
			$tbf=$this->bd->select("select max(profec), min(ultfec) from npnomina");
			$this->cell(20,5,"PERIODO DE                         AL                 ");
			$this->SetTextColor(0,0,0);
			$this->cell(20,5,$tbf->fields["min"]."            ".$tbf->fields["max"]);
*/
			$this->Line(10,$this->GetY()+5,200,$this->GetY()+5);
			$this->ln();
			$this->cell(50,5,"CONCEPTO");
			$this->cell(70,5,"DESCRIPCION");
			$this->cell(50,5,"FUNCIONARIOS");
			$this->cell(50,5,"MONTO");
			$this->ln(8);

	}

	function Cuerpo()
	{


		$tbg=$this->bd->select($this->sql);
		$ygen=$this->GetY();
		while(!$tbg->EOF)
		{
			$totasigna=0;
			$totdeduc=0;
			$totaport=0;
			$contador=0;
			$codigo = $tbg->fields["codnom"];
			$this->SetTextColor(0,0,128);
			$this->SetY(36);
			$tbf=$this->bd->select("select to_char(profec,'dd/mm/yyyy') as profec, to_char(ultfec,'dd/mm/yyyy') as ultfec from npnomina where trim(codnom) = '".$codigo."'");
			$this->cell(125,5,"NOMINA:  ".$tbg->fields["codnom"]." - ".$tbg->fields["nomnom"]);
			$this->cell(95,5,"PERIODO DE                         AL                 ");
			$this->SetTextColor(0,0,0);
			$this->SetX(155);
			//$this->cell(95,5,$tbf->fields["ultfec"]."            ".$tbf->fields["profec"]);
			$this->cell(95,5,$this->fechades."            ".$this->fechahas);

			$this->SetY($ygen);
			while(!$tbg->EOF and $codigo == $tbg->fields["codnom"])
			{
				$tipo = $tbg->fields["asided"];
				$this->SetTexTColor(0,0,200);
				if(strtoupper($tbg->fields["asided"])=="A")
				{
					$this->Cell(50,5,"ASIGNACIONES");
				}
				elseif(strtoupper($tbg->fields["asided"])=="D")
				{
					$this->Cell(50,5,"DEDUCCCIONES");
				}
				elseif(strtoupper($tbg->fields["asided"])=="P")
				{
					$this->Cell(50,5,"APORTES PATRONALES");
				}
				$this->Ln(8);
				$this->SetTexTColor(0,0,0);
				$this->setFont("Arial","",9);
				while(!$tbg->EOF and $tipo == $tbg->fields["asided"] and $codigo == $tbg->fields["codnom"])
				{
					$con = $tbg->fields["codcon"];
					$contador++;
					$this->Cell(30,4,$tbg->fields["codcon"]);
					$x = $this->GetX();
					$this->Cell(90);
					$cuantos = $this->bd->select("SELECT COUNT(DISTINCT(CODEMP)) as numero FROM NPNOMCAL WHERE trim(codnom)=trim('".$codigo."') and trim(asided)=trim('".$tbg->fields["asided"]."') and trim(codcon) = trim('".$tbg->fields["codcon"]."')")->fields["numero"];
					$this->Cell(50,4,number_format($tbg->fields["cant"],0,',','.'));
						//$this->Cell(50,4,number_format($cuantos,0,',','.'));
					$monto=0;
					$nombre = $tbg->fields["nomcon"];
					while(!$tbg->EOF and $tipo == $tbg->fields["asided"] and $con == $tbg->fields["codcon"] and $codigo == $tbg->fields["codnom"])
					{
						if(strtoupper($tbg->fields["asided"])=="A")
						{
							$totasigna+=$tbg->fields["asigna"];
							$monto+=$tbg->fields["asigna"];
						}
						elseif(strtoupper($tbg->fields["asided"])=="D")
						{
							$totdeduc+=$tbg->fields["deduc"];
							$monto+=$tbg->fields["deduc"];
						}
						elseif(strtoupper($tbg->fields["asided"])=="P")
						{
							$totaport+=$tbg->fields["aporte"];
							$monto+=$tbg->fields["aporte"];
						}
						$tbg->MoveNext();
					}
					$this->Cell(20,4,number_format($monto,2,',','.'),0,0,'R');
					$this->SetX($x);
					$this->MultiCell(90,4,$nombre);
					$total+=$monto;
				}
				$this->setFont("Arial","B",9);
				$this->Line(120,$this->GetY(),200,$this->GetY());
				if(strtoupper($tipo)=="A")
				{
					$this->Cell(190,5,"TOTAL ASIGNACIONES...   ".number_format($totasigna,2,',','.'),0,0,'R');
					$this->Ln(7);
				}
				elseif(strtoupper($tipo)=="D")
				{
					$this->Cell(190,5,"TOTAL DEDUCCCIONES...   ".number_format($totdeduc,2,',','.'),0,0,'R');
					$this->Ln(7);
				}
				elseif(strtoupper($tipo)=="P")
				{
					$this->Cell(190,5,"TOTAL APORTES...   ".number_format($totaport,2,',','.'),0,0,'R');
					$this->Ln(7);
				}

			}
			$this->Cell(180,5,"CONCEPTOS     ".$contador);
			$neto = $totasigna - $totdeduc;
			$this->Cell(10,5,"NETO A PAGAR...     ".number_format($neto,2,',','.'),0,0,'R');
			$this->Ln(5);
			$this->Cell(180,5,"GASTOS DE NOMINA");
			$nomina=$neto+$totaport;
			$this->Cell(10,5,number_format($nomina,2,',','.'),0,0,'R');
			$this->ln(5);


			if(!$tbg->EOF)
			{
				$this->AddPage();
			}
		}
		$this->bd->closed();
             $this->setwidths(array(45,45,45,55));
			$this->setaligns(array("C","C","C","C"));
			$this->setY(240);
			$this->setBorder(true);
			 $this->rowm(array($this->direccion,$this->elaborado,$this->revisado,$this->autorizado));
		    $this->rowm(array('DIRECCION DE RECURSOS HUMANOS','DIRECCION DE PLANIFICACION Y PRESUPUESTO','DIRECCION DE ADMINISTRACION','CONTRALOR (A)'));


	}


}

?>
