<?

	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/Cabecera.php");
	require_once("../../lib/modelo/sqls/nomina/Nprhisrelconc.class.php");
	require_once("../../lib/general/Herramientas.class.php");

class mysreportes
{
	var $rep;
	var $bd;

	function mysreportes()
	{
		$this->rep="";
		$this->bd=new basedatosAdo();
	}
	function sqlreporte()
	{

		$sql="select refcom as referencia, codpre as codigo_presupuestario, monimp as monto from cpimpcom order by refcom";
		return $sql;
	}
	function getAncho($pos)
	{
		$anchos=array();
		$anchos[0]=25;
		$anchos[1]=50;
		$anchos[2]=30;
		$anchos[3]=45;
		$anchos[4]=65;
		$anchos[5]=65;
		$anchos[6]=20;
		$anchos[7]=10;
		$anchos[8]=30;
		$anchos[9]=30;
		$anchos[10]=30;
		$anchos[11]=30;

		return $anchos[$pos];
	}
	function getAncho2($pos)
	{
		$anchos2=array();
		$anchos2[0]=25;
		$anchos2[1]=50;
		$anchos2[2]=30;
		$anchos2[3]=45;
		$anchos2[4]=65;
		$anchos2[5]=65;
		$anchos2[6]=30;
		$anchos2[7]=30;
		$anchos2[8]=30;
		$anchos2[9]=30;
		$anchos2[10]=30;

		return $anchos2[$pos];
	}

}





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
			$this->arrp=array();
			$this->arrp2=array();

			$this->codnomdes=H::getpost("codnomdes");
			$this->codnomhas=H::getpost("codnomhas");
			$this->codcondes=H::getpost("codcondes");
			$this->codconhas=H::getpost("codconhas");
			$this->tipcon=H::getpost("tipcon");
			$this->especial=H::getpost("especial");
			$this->fechadesde=H::getpost("fechadesde");
			$this->fechahasta=H::getpost("fechahasta");
			$this->tipnomesp=H::getpost("tipnomesp");

/*			print $this->codnomdes.'<br>';
			print $this->codnomhas.'<br>';
			print $this->codcondes.'<br>';
			print $this->codconhas.'<br>';
			print $this->tipcon.'<br>';
			print $this->especial.'<br>';
			print $this->tipnomesp.'<br>';
			exit;
*/


            $objNprhisrelconc = new Nprhisrelconc();
            $this->arrp = $objNprhisrelconc->SQLp($this->codnomdes,$this->codnomhas,$this->codcondes,$this->codconhas,$this->tipcon,$this->especial ,$this->tipnomesp ,$this->fechadesde,$this->fechahasta);
            //$this->arrp2 = $this->arrp;


		}



		function Header()
		{
			$this->SetTextColor(0,0,0);
			$this->getCabecera(H::GetPost("titulo"),"");
			$this->setFont("Arial","B",9);
			$this->ln(-1);

			$this->SetTextColor(0,0,128);
			$this->SetXY(120,35);
			$this->cell(20,5,"PERIDO DE NOMINA VIGENTE ");
			$this->SetTextColor(0,0,0);
			$this->cell(20,5,$this->fecha1."            ".$this->fecha2);
			$this->Line(10,$this->GetY()+5,200,$this->GetY()+5);
			$this->Line(10,55,200,55);
			$this->ln();
			//$this->SetY(150);

	      }


		function Cuerpo()
	      {


		if ($this->arrp)
		{
		// 	ESto son los titulos

					$this->setFont("Arial","",9);
					$this->SetXY(10,35);
					$this->SetTextColor(0,0,128);
					$this->cell(20,5,"NOMINA:");

					$codnom=$this->arrp[0]["codnom"];

						$objNprhisrelconc = new Nprhisrelconc();
            				//$this->arrp = $objNprrelconc->SQLp($this->con1,$this->con2,$this->tipcon);
						$this->arrNpnomcal = $objNprhisrelconc->SQLNpnomcal($codnom);

						//$this->sql="SELECT COUNT(DISTINCT(CODEMP)) as numero FROM NPNOMCAL WHERE (CODNOM)=('".$codnom."')";

						//$tbx=$this->bd->select($this->sql);

						$this->SetXY(10,40);
						$this->cell(17,5,"NRO. TRABAJADORES:");
						$this->SetXY(60,40);
						$this->SetTextColor(0,0,0);
						$this->cell(20,5,$this->arrNpnomcal[0]["numero"]);
						$Asigna=0;
						$Deducion=0;
						$Aporte=0;
						$neto=0;

						$this->setFont("Arial","",7);

							$this->SetXY(30,35);
							$this->SetTextColor(0,0,0);
							$this->cell(15,5,$this->arrp[0]["codnom"]);
							$this->SetXY(60,35);
							$this->SetTextColor(0,0,0);
							//$this->cell(120,5,strtoupper($this->arrp[0]["nomnom"]));

							$this->SetTextColor(0,0,128);
							$this->SetXY(10,50);
							$this->cell(17,5,"CANT.TRAB.");

							$this->SetXY(31,50);
							$this->cell(17,5,"CONCEPTO");

							$this->SetXY(52,50);
							$this->cell(17,5,"NOMBRE DEL CONCEPTO");

							$this->SetXY(98,50);
							$this->cell(17,5,"PART.PRESUP.");

							$this->SetXY(125,50);
							$this->cell(17,5,"ASIGNACION");

							$this->SetXY(147,50);
							$this->cell(17,5,"DEDUCION");

							$this->SetXY(170,50);
							$this->cell(17,5,"APORTE");

							$this->SetXY(188,50);
							$this->cell(17,5,"TOTAL");
							$this->SetY(60);


			}


			foreach ($this->arrp as $arrp)
			{
				if ($arrp["codnom"]!=$codnom)
				{
					//TOTALES y addpage

					$this->SetTextColor(0,0,0);
					$this->Line(100,$this->GetY(),200,$this->GetY());
					$this->ln(4);
					$this->SetXY(100,$this->GetY()+2);
					$this->SetTextColor(0,0,128);
					$this->Cell(60,5,"TOTALES:");
					$this->SetTextColor(0,0,0);
					$this->SetXY(111,$this->GetY());
					$this->setFont("Arial","",7);
					$this->cell(32,5,number_format($Asigna,2,'.',','),0,0,'R');
					$this->SetXY(130,$this->GetY());
					$this->cell(32,5,number_format($Deducion,2,'.',','),0,0,'R');
					$this->SetXY(149,$this->GetY());
					$this->cell(33,5,number_format($Aporte,2,'.',','),0,0,'R');
					$this->SetXY(180,$this->GetY());
					$this->cell(22,5,number_format($netototal,2,'.',','),0,0,'R');
					$this->setFont("Arial","",7);
					$this->Ln(4);
					$this->AddPage();


					//IMPRIMIR TITULOS


					$this->setFont("Arial","",9);
					$this->SetXY(10,35);
					$this->SetTextColor(0,0,128);
					$this->cell(20,5,"NOMINA:");

					$codnom=$arrp["codnom"];


						$objNprrelconc = new Nprhisrelconc();
            				//$this->arrp = $objNprrelconc->SQLp($this->con1,$this->con2,$this->tipcon);
						$this->arrNpnomcal = $objNprrelconc->SQLNpnomcal($codnom);

						//$this->sql="SELECT COUNT(DISTINCT(CODEMP)) as numero FROM NPNOMCAL WHERE (CODNOM)=('".$codnom."')";

						//$tbx=$this->bd->select($this->sql);
						$this->SetXY(10,40);
						$this->cell(17,5,"NRO. TRABAJADORES:");
						$this->SetXY(60,40);
						$this->SetTextColor(0,0,0);
						$this->cell(20,5,$this->arrNpnomcal[0]["numero"]);
						$Asigna=0;
						$Deducion=0;
						$Aporte=0;
						$neto=0;

							$this->SetXY(30,35);
							$this->SetTextColor(0,0,0);
							$this->cell(15,5,$arrp["codnom"]);
							$this->SetXY(60,35);
							$this->SetTextColor(0,0,0);
							//$this->cell(120,5,strtoupper($arrp["nomnom"]));

							$this->setFont("Arial","",7);

							$this->SetTextColor(0,0,128);
							$this->SetXY(10,50);
							$this->cell(17,5,"CANT.TRAB");

							$this->SetXY(31,50);
							$this->cell(17,5,"CONCEPTO");

							$this->SetXY(52,50);
							$this->cell(17,5,"NOMBRE DEL CONCEPTO");

							$this->SetXY(98,50);
							$this->cell(17,5,"PART.PRESUP.");

							$this->SetXY(125,50);
							$this->cell(17,5,"ASIGNACION");

							$this->SetXY(147,50);
							$this->cell(17,5,"DEDUCION");

							$this->SetXY(170,50);
							$this->cell(17,5,"APORTE");

							$this->SetXY(188,50);
							$this->cell(17,5,"TOTAL");
							$this->SetY(60);


				}

				//DETALLE

							$this->SetTextColor(0,0,0);

							$this->cell(20,5,$arrp["cant"]);
							//$this->Ln(10);

							$this->SetTextColor(0,0,0);
							$this->SetXY(31,$this->GetY());
							$this->cell(20,5,$arrp["codcon"]);
							//$this->Ln(10);
							$this->SetXY(98,$this->GetY());

							$this->cell(20,5,$arrp["codpar"]);
							//$this->Ln(10);
							$this->SetXY(125,$this->GetY());

							$this->setFont("Arial","",7);

							$this->SetTextColor(0,0,0);
							$this->SetX(130);
							$this->cell(13,5,number_format($arrp["asigna"],2,'.',','),0,0,'R');
							//$this->Ln(10);


							$this->SetTextColor(0,0,0);
							$this->SetX(146);
							$this->cell(16,5,number_format($arrp["deduc"],2,'.',','),0,0,'R');
							//$this->Ln(10);


							$this->SetTextColor(0,0,0);
							$this->SetX(160);
							$this->cell(22,5,number_format($arrp["aporte"],2,'.',','),0,0,'R');


							//$this->cell(30,5,$tbz->fields["aporte"]);


							$Asigna+=$arrp["asigna"];
							$Deducion+=$arrp["deduc"];
							$Aporte+=$arrp["aporte"];


							if(($Asigna >= 0) and ($Deducion >= 0))
						  	{$neto=$Asigna-$Deducion;}


		    				$netototal+=$neto;

		    				$this->SetX(176);
		    				$this->Cell(26,5,number_format($netototal,2,'.',','),0,0,'R');
							$this->setFont("Arial","",7);
							$this->SetX(52);
							$this->SetTextColor(0,0,0);
							$this->multicell(45,5,$arrp["nomcon"]);
							$this->Ln(2);





			$codnom=$arrp["codnom"];
	//		$tbz->MoveNext();
			//MOVENExT

			}

					$this->SetTextColor(0,0,0);
					$this->Line(125,$this->GetY(),200,$this->GetY());
					$this->ln(4);
					$this->SetXY(100,$this->GetY()+2);
					$this->SetTextColor(0,0,128);
					$this->Cell(90,5,"TOTALES:");
					$this->setFont("Arial","",7);
					$this->SetTextColor(0,0,0);
					$this->SetXY(111,$this->GetY());
					$this->cell(32,5,number_format($Asigna,2,'.',','),0,0,'R');
					$this->SetXY(130,$this->GetY());
					$this->cell(32,5,number_format($Deducion,2,'.',','),0,0,'R');
					$this->SetXY(149,$this->GetY());
					$this->cell(32,5,number_format($Aporte,2,'.',','),0,0,'R');
					$this->SetXY(180,$this->GetY());
					$this->cell(22,5,number_format($netototal,2,'.',','),0,0,'R');
					$this->setFont("Arial","",7);

		}





}


?>
