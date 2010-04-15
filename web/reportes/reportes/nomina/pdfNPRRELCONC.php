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
		var $netototal=0;
var $neto=0;
		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();

			$this->con1=$_POST["con1"];
			$this->con2=$_POST["con2"];

			$this->tipcon=$_POST["tipcon"];
			    $this->tipnomesp=$_POST["tipnomesp"];

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


 		$this->sqlz= " SELECT DISTINCT(A.CODCON) AS CODCON, B.NOMCON as nomcon, A.CODNOM as codnom ,A.NOMNOM as nomnom, A.ASIDED,
							SUM(CASE WHEN A.SALDO=0 THEN 0 ELSE 1 END ) AS CANT,
							SUM(CASE WHEN A.ASIDED='A' THEN A.SALDO ELSE 0 END) AS ASIGNA,
							SUM(CASE WHEN A.ASIDED='D' THEN A.SALDO ELSE 0 END) AS DEDUC ,
							SUM(CASE WHEN A.ASIDED='P' THEN A.SALDO ELSE 0 END ) AS APORTE ,
							B.IMPCPT, b.codpar,to_char(a.fecnomdes,'dd/mm/yyyy') as fecnomdes
							FROM NPNOMCAL A, NPDEFCPT B

							WHERE
									(A.CODNOM) >= TRIM('".$this->con1."') AND
									(A.CODNOM) <= TRIM('".$this->con2."') AND
                                    (CASE WHEN '".$this->tipcon."'='T' THEN 'T' ELSE A.ASIDED END)='".$this->tipcon."' AND ".$especial."
									A.SALDO > 0  AND
									(B.CODCON) = (A.CODCON)
									GROUP BY A.CODCON,B.NOMCON,A.CODNOM,A.NOMNOM,A.ASIDED, B.IMPCPT,b.codpar,a.fecnomdes
									ORDER BY A.CODNOM,A.ASIDED,A.CODCON ";


// 		print '<pre>'; print($this->sqlz);
		// este sql no esta filtrando por las fechas, deberia hacerlo y revisar por que asigna directamente los tipos de asided


		}


		function Header()
		{
			$this->cab=new cabecera();
			$this->SetTextColor(0,0,0);
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","B",9);
			$this->ln(-1);


			//$this->Line(10,55,200,55);
			$this->ln();
			//$this->SetY(150);

	}

		function Cuerpo()
	{

		$tbz=$this->bd->select($this->sqlz);


		if (!$tbz->EOF)
			{
		// 	ESto son los titulos

					$this->setFont("Arial","",9);
					$this->SetXY(10,35);
					$this->SetTextColor(0,0,128);
					$this->cell(20,5,"NOMINA: ");

							$codnom=$tbz->fields["codnom"];
							$fecnom=$tbz->fields["fecnomdes"];

            $this->SetTextColor(0,0,128);
			$this->SetXY(135,35);
			$this->cell(20,5,"PERIODO DE NOMINA VIGENTE: ".$fecnom);

			$this->Line(10,$this->GetY()+5,200,$this->GetY()+5);

						$this->sql="SELECT COUNT(DISTINCT(CODEMP)) as numero FROM NPNOMCAL WHERE (CODNOM)=('".$codnom."')";

						$tbx=$this->bd->select($this->sql);
						$this->SetXY(10,40);
						$this->cell(17,5,"NRO. TRABAJADORES:");
						$this->SetXY(60,40);
						$this->SetTextColor(0,0,0);
						$this->cell(20,5,$tbx->fields["numero"]);
						$Asigna=0;
						$Deducion=0;
						$Aporte=0;
						$neto=0;

							$this->SetXY(30,35);
							$this->SetTextColor(0,0,0);
							$this->cell(15,5,$tbz->fields["codnom"]);
							$this->SetXY(40,35);
							$this->SetTextColor(0,0,0);
							$this->multicell(100,5,strtoupper($tbz->fields["nomnom"]));

							$this->SetTextColor(0,0,128);
							$this->SetXY(10,50);
							$this->cell(17,5,"CODIGO:");

							$this->SetXY(30,50);
							$this->cell(17,5,"NOMBRE DEL CONCEPTO");

							$this->SetXY(90,50);
							$this->cell(17,5,"ASIGNACION");

							$this->SetXY(120,50);
							$this->cell(17,5,"DEDUCION");

							$this->SetXY(155,50);
							$this->cell(17,5,"APORTE");

							$this->SetXY(185,50);
							$this->cell(17,5,"TOTAL");
							$this->SetY(60);
$this->Line(10,55,200,55);

			}
		while (!$tbz->EOF)
			{
				if ($tbz->fields["codnom"]!=$codnom)
				{
					//TOTALES y addpage

					$this->SetTextColor(0,0,0);
					$this->Line(100,$this->GetY(),200,$this->GetY());
					$this->ln(4);
					$this->SetXY(60,$this->GetY()+2);
					$this->SetTextColor(0,0,128);
					$this->Cell(60,5,"TOTALES:");
					$this->SetTextColor(0,0,0);
					$this->SetXY(80,$this->GetY());
					$this->setFont("Arial","",7.5);
					$this->cell(32,5,number_format($Asigna,2,',','.'),0,0,'R');
					$this->SetXY(110,$this->GetY());
					$this->cell(32,5,number_format($Deducion,2,',','.'),0,0,'R');
					$this->SetXY(140,$this->GetY());
					$this->cell(33,5,number_format($Aporte,2,',','.'),0,0,'R');
					$this->SetXY(180,$this->GetY());
					$this->cell(22,5,number_format(($Asigna+$Aporte)-$Deducion,2,',','.'),0,0,'R');
					$this->setFont("Arial","",9);
					$this->Ln(4);
					$this->AddPage();

					//IMPRIMIR TITULOS


					$this->setFont("Arial","",9);
					$this->SetXY(10,35);
					$this->SetTextColor(0,0,128);
					$this->cell(20,5,"NOMINA:");

							$codnom=$tbz->fields["codnom"];
	                        $fecnom=$tbz->fields["fecnomdes"];

            $this->SetTextColor(0,0,128);
			$this->SetXY(135,35);
			$this->cell(20,5,"PERIODO DE NOMINA VIGENTE: ".$fecnom);

			$this->Line(10,$this->GetY()+5,200,$this->GetY()+5);


						//esta cajita es la de los trabajador

						$this->sql="SELECT COUNT(DISTINCT(CODEMP)) as numero FROM NPNOMCAL WHERE (CODNOM)=('".$codnom."')";

						$tbx=$this->bd->select($this->sql);
						$this->SetXY(10,40);
						$this->cell(17,5,"NRO. TRABAJADORES:");
						$this->SetXY(60,40);
						$this->SetTextColor(0,0,0);
						$this->cell(20,5,$tbx->fields["numero"]);
						$Asigna=0;
						$Deducion=0;
						$Aporte=0;
						$neto=0;

							$this->SetXY(30,35);
							$this->SetTextColor(0,0,0);
							$this->cell(15,5,$tbz->fields["codnom"]);
								$this->SetXY(40,35);
							$this->SetTextColor(0,0,0);
							$this->multicell(100,5,strtoupper($tbz->fields["nomnom"]));

							$this->SetTextColor(0,0,128);
							$this->SetXY(10,50);
							$this->cell(17,5,"CODIGO:");

							$this->SetXY(30,50);
							$this->cell(17,5,"NOMBRE DEL CONCEPTO");

							$this->SetXY(90,50);
							$this->cell(17,5,"ASIGNACION");

							$this->SetXY(120,50);
							$this->cell(17,5,"DEDUCION");

							$this->SetXY(155,50);
							$this->cell(17,5,"APORTE");

							$this->SetXY(185,50);
							$this->cell(17,5,"TOTAL");
							$this->SetY(60);

$this->Line(10,55,200,55);


				}

				//DETALLE

							$this->SetTextColor(0,0,0);

							$this->cell(20,5,$tbz->fields["codcon"]);
							//$this->Ln(10);
							$this->SetXY(20,$this->GetY());

							$this->setFont("Arial","",7.5);

							$this->SetTextColor(0,0,0);
							$this->SetX(100);
							$this->cell(13,5,number_format($tbz->fields["asigna"],2,',','.'),0,0,'R');
							//$this->Ln(10);


							$this->SetTextColor(0,0,0);
							$this->SetX(125);
							$this->cell(16,5,number_format($tbz->fields["deduc"],2,',','.'),0,0,'R');
							//$this->Ln(10);


							$this->SetTextColor(0,0,0);
							$this->SetX(150);
							$this->cell(22,5,number_format($tbz->fields["aporte"],2,',','.'),0,0,'R');


							//$this->cell(30,5,$tbz->fields["aporte"]);


							$Asigna+=$tbz->fields["asigna"];
							$Deducion+=$tbz->fields["deduc"];
							$Aporte+=$tbz->fields["aporte"];


							if(($Asigna >= 0) and ($Deducion >= 0))
						  	{$neto=$Asigna-$Deducion+$Aporte;}


		    				$netototal+=$neto;

		    				$this->SetX(175);
		    				$this->Cell(26,5,number_format($neto,2,',','.'),0,0,'R');
							$this->setFont("Arial","",9);
							$this->SetX(30);
							$this->SetTextColor(0,0,0);
							$this->multicell(50,3,$tbz->fields["nomcon"]);
							$this->Ln(2);





			$codnom=$tbz->fields["codnom"];
			$tbz->MoveNext();
			//MOVENExT

			}

					$this->SetTextColor(0,0,0);
					$this->Line(100,$this->GetY(),200,$this->GetY());
					$this->ln(4);
					$this->SetXY(60,$this->GetY()+2);
					$this->SetTextColor(0,0,128);
					$this->Cell(60,5,"TOTALES:");
					$this->setFont("Arial","",7.5);
					$this->SetTextColor(0,0,0);
					$this->SetXY(80,$this->GetY());
					$this->cell(32,5,number_format($Asigna,2,',','.'),0,0,'R');
					$this->SetXY(110,$this->GetY());
					$this->cell(32,5,number_format($Deducion,2,',','.'),0,0,'R');
					$this->SetXY(140,$this->GetY());
					$this->cell(32,5,number_format($Aporte,2,',','.'),0,0,'R');
					$this->SetXY(180,$this->GetY());
					$this->cell(22,5,number_format(($Asigna+$Aporte)-$Deducion,2,',','.'),0,0,'R');
					$this->setFont("Arial","",9);

		}


	}

?>
