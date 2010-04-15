<?
require_once("../../lib/general/fpdf/fpdf.php");
require_once("../../lib/bd/basedatosAdo.php");
require_once("../../lib/general/Cabecera.php");
require_once("../../lib/general/funciones.php");
require_once("../../lib/general/Herramientas.class.php");

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
		var $tipnomesp1;
		var $tipnomesp2;
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
			parent::FPDF("l","mm","letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();


			$this->fecha1=$_POST["fecha1"];
			$this->fecha2=$_POST["fecha2"];
			$this->con1=$_POST["con1"];
			$this->con2=$_POST["con2"];
			$this->tipnomesp1=$_POST["tipnomesp1"];
			$this->tipnomesp2=$_POST["tipnomesp2"];
			$this->elaborado=$_POST["elaborado"];
			$this->elaboradocar=$_POST["elaboradocar"];
			$this->revisado=$_POST["revisado"];
			$this->revisadocar=$_POST["revisadocar"];
			$this->tipcon=$_POST["tipcon"];
            $this->especial = $_POST["especial"];

            if ($this->especial == 'S')
            {
            	$especial = " a.especial = 'S' AND
		(A.CODNOMESP) >= TRIM('".$this->tipnomesp1."') AND
		(A.CODNOMESP) <= TRIM('".$this->tipnomesp2."') AND ";
             }
            else
            {  if ($this->especial == 'N')       	$especial = " a.especial = 'N' AND"; else
            	if ($this->especial == 'T') $especial = "";
            }



 			$this->sql= " SELECT DISTINCT(A.CODCON), B.NOMCON,B.CODPAR, A.CODNOM as codnom ,A.NOMNOM as nomnom, A.ASIDED,
							SUM(CASE WHEN A.SALDO=0 THEN 0 ELSE 1 END ) AS CANT,
							SUM(CASE WHEN A.ASIDED='A' THEN A.SALDO ELSE 0 END) AS ASIGNA,
							SUM(CASE WHEN A.ASIDED='D' THEN A.SALDO ELSE 0 END) AS DEDUC ,
							SUM(CASE WHEN (A.ASIDED='P' and A.CODCON <> 'P32' and A.CODCON <> 'P21' and A.CODCON <> 'P22' and A.CODCON <> 'P23' and A.CODCON <> 'P24' and A.CODCON <> 'P25') THEN A.SALDO ELSE 0 END ) AS APORTE ,
						--    SUM(CASE WHEN A.ASIDED='P' THEN A.SALDO ELSE 0 END ) AS APORTE ,
							B.IMPCPT, b.codpar
							FROM NPNOMCAL A, NPDEFCPT B

							WHERE
							--(B.IMPCPT) <> 'N' AND
							(A.CODNOM) >= TRIM('".$this->con1."') AND
							(A.CODNOM) <= TRIM('".$this->con2."') AND
							A.SALDO > 0  AND
							A.ASIDED LIKE '".$this->tipcon."' AND".$especial."
							(B.CODCON) = (A.CODCON)
							GROUP BY A.CODCON,B.NOMCON,A.CODNOM,A.NOMNOM,A.ASIDED, B.IMPCPT,b.codpar
							ORDER BY A.CODNOM, A.ASIDED, A.CODCON";

 							//$this->SetAutoPageBreak(true,20);
 		//	print '<pre>';echo $this->sql;exit;
		// este sql no esta filtrando por las fechas, deberia hacerlo y revisar por que asigna directamente los tipos de asided
//--	SUM(CASE WHEN (A.ASIDED='P' and A.CODCON <> 'P32'and A.CODCON <> 'P33' and A.CODCON <> 'P34' and A.CODCON <> 'P35' and A.CODCON <> 'P36' and A.CODCON <> 'P21' and A.CODCON <> 'P22' and A.CODCON <> 'P23' and A.CODCON <> 'P24' and A.CODCON <> 'P25') THEN A.SALDO ELSE 0 END ) AS APORTE ,

		}


		function Header()
		{

			$this->SetTextColor(0,0,0);
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
	        //parent::FPDF("o","mm","letter");
               
	        $this->getCabecera(H::GetPost("titulo"),"");
			$this->setFont("Arial","B",10);
			$this->Line(10,$this->GetY()+5,265,$this->GetY()+5);
			$this->ln();
			$this->setX(15);
			$this->cell(45,5,"PARTIDA");
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
			$this->setFont("Arial","B",10);
			$codigo = $tbg->fields["codnom"];
			$this->SetTextColor(0,0,128);
			$this->SetY(36);
			$tbf=$this->bd->select("select to_char(profec,'dd/mm/yyyy') as profec, to_char(ultfec,'dd/mm/yyyy') as ultfec from npnomina where trim(codnom) = '".$codigo."'");
			$this->cell(185,5,"NOMINA:  ".$tbg->fields["codnom"]." - ".$tbg->fields["nomnom"]);
			$this->cell(60,5,"PERIODO DE ".$tbf->fields["ultfec"]." AL ".$tbf->fields["profec"]);
			$this->SetTextColor(0,0,0);
			//$this->SetX(155);
			//$this->cell(95,5,$tbf->fields["ultfec"]."            ".$tbf->fields["profec"]);
			$this->SetY($ygen);
			$this->setFont("Arial","B",10);
			while(!$tbg->EOF and $codigo == $tbg->fields["codnom"])
			{
				$tipo = $tbg->fields["asided"];
				$this->SetTexTColor(0,0,200);
				if(strtoupper($tbg->fields["asided"])=="A")
				{   $this->SetX(60);
					$this->Cell(50,5,"ASIGNACIONES");
				}
				elseif(strtoupper($tbg->fields["asided"])=="D")
				{	$this->SetX(60);
					$this->Cell(50,5,"DEDUCCCIONES");
				}
				elseif(strtoupper($tbg->fields["asided"])=="P")
				{	$this->SetX(60);
					$this->Cell(50,5,"APORTES PATRONALES");
				}
				$this->Ln(8);
				$this->SetTexTColor(0,0,0);
				$this->setFont("Arial","",10);
				while(!$tbg->EOF and $tipo == $tbg->fields["asided"] and $codigo == $tbg->fields["codnom"])
				{	$this->SetX(15);
					$this->Cell(30,4,$tbg->fields["codpar"]);
					$con = $tbg->fields["codcon"];
					$contador++;
					$this->SetX(60);
					$this->Cell(30,4,$tbg->fields["codcon"]);
					//$this->SetX(60);
					$x = $this->GetX();
					$this->Cell(90);
					$cuantos = $this->bd->select("SELECT COUNT(DISTINCT(CODEMP)) as numero FROM NPNOMCAL WHERE trim(codnom)=trim('".$codigo."') and trim(asided)=trim('".$tbg->fields["asided"]."') and trim(codcon) = trim('".$tbg->fields["codcon"]."')")->fields["numero"];
					//$this->SetX(60);
					$this->Cell(50,4,number_format($cuantos,0,',','.'));
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
				$this->setFont("Arial","B",10);
				$this->Line(180,$this->GetY(),260,$this->GetY());
				if(strtoupper($tipo)=="A")
				{   $this->SetX(60);
					$this->Cell(190,5,"TOTAL ASIGNACIONES...   ".number_format($totasigna,2,',','.'),0,0,'R');
					$this->Ln(7);
				}
				elseif(strtoupper($tipo)=="D")
				{   $this->SetX(60);
					$this->Cell(190,5,"TOTAL DEDUCCCIONES...   ".number_format($totdeduc,2,',','.'),0,0,'R');
					$this->Ln(7);
				}
				elseif(strtoupper($tipo)=="P")
				{   $this->SetX(60);
					$this->Cell(190,5,"TOTAL APORTES...   ".number_format($totaport,2,',','.'),0,0,'R');
					$this->Ln(7);
				}

			}$this->SetX(60);
			$this->Cell(180,5,"CONCEPTOS     ".$contador);
			$neto = $totasigna - $totdeduc;
			$this->Cell(10,5,"NETO A PAGAR...     ".number_format($neto,2,',','.'),0,0,'R');
			$this->Ln(5);
			$this->SetX(60);
			$this->Cell(180,5,"GASTOS DE NOMINA");
			$nomina=$neto+$totaport;
			$this->Cell(10,5,number_format($nomina,2,',','.'),0,0,'R');
			if(!$tbg->EOF)
			{
				$this->AddPage();
			}
		}
		$this->bd->closed();

			     $this->setXY(20,$this->GetY()+15);
				 $this->ln(2);
				 $this->setX(40);
				 $this->setFont("Arial","B",8);
				 $this->cell(50,5,'Elaborado Por',0,0,'C');
				 $this->cell(90,5,"");
				 $this->cell(50,5,'Revisado Por',0,0,'C');
				 $this->ln(5);
				 $this->setFont("Arial","BU",8);
				 $this->setX(40);
				 $this->cell(50,5,$this->elaborado,0,0,'C');
				 $this->cell(90,5,"");
				 $this->cell(50,5,$this->revisado,0,0,'C');
			     $this->ln(4);
			     $this->setFont("Arial","B",8);
			     $this->setX(40);
				 $this->cell(50,5,$this->elaboradocar,0,0,'C');
				 $this->cell(90,5,"");
				 $this->cell(50,5,$this->revisadocar,0,0,'C');


				 $this->ln(8);


	}


}

?>
