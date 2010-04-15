<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/modelo/sqls/nomina/Nprrelasided.class.php");
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
			$this->index=0;

			$this->codempdes=H::getpost("codempdes");
			$this->codemphas=H::getpost("codemphas");
			$this->ano=H::getpost("ano");

            $objNprrelasided = new Nprrelasided();
            $this->arrp = $objNprrelasided->SQLp($this->codempdes, $this->codemphas,$this->ano);
			$this->arrp2 = $objNprrelasided->SQLx($this->codempdes,$this->codemphas,$this->ano);
			$this->arrp3 = $objNprrelasided->SQLy($this->codempdes,$this->codemphas,$this->ano);
			$this->arrp4 = $objNprrelasided->SQLv($this->codempdes,$this->codemphas);
		$this->arrpemp = $objNprrelasided->empresa();
		}



		function Header()
		{
			//$i=$this->index;
			$this->SetTextColor(0,0,0);
			$this->setFont("Arial","B",11);
			$this->cell(20,5,"Contraloria Municipal del Municipio Chacao");
			$this->cell(130,5,"");
			$this->setFont("Arial","B",9);
			$hoy=date('d/m/Y');
			$this->cell(20,5,"Fecha:  ".$hoy);
			$this->ln();
			//$this->cell(20,5,"RIF: G-20007206-7");
			$this->ln(5);
			$this->setFont("Arial","",9);
			$this->cell(20,5,"Reporte: ");
			$this->SetX(40);
			$this->setFont("Arial","B",9);
			$this->cell(20,5,"Relacion de Asignaciones y Deducciones");
			$this->setFont("Arial","",9);
			$this->ln(6);
			$this->cell(20,5,"Trabajador: ");
			$this->ln(8);
			$this->setFont("Arial","B",10);
			$this->cell(190,5,"Relacion de Asignaciones y Deducciones Ejercicio Fiscal",0,0,'C');
			$this->ln(10);
			$this->setFont("Arial","B",9);
			$this->rect(10,$this->GetY(),100,85);  //CUADRO DEL INGRESO MENSUAL
			$y=$this->GetY();
			$this->Cell(10,5,"Ano",0,0,'C');
			$this->Cell(30,5,"Mes",0,0,'C');
			$this->Cell(33,4,"Ingreso",0,0,'C');
			$this->Cell(25,4,"Remuneraciones",0,0,'C');
			$this->ln();
			$this->Cell(40,4,"",0,0,'C');
			$this->Cell(33,4,"Mensual",0,0,'C');
			$this->Cell(25,4,"Acumuladas",0,0,'C');
			$this->Line(10,$this->GetY()+5,110,$this->GetY()+5);
			$this->Line(20,$this->GetY()-4,20,$this->GetY()+81);
			$this->Line(53,$this->GetY()-4,53,$this->GetY()+81);
			$this->Line(80,$this->GetY()-4,80,$this->GetY()+81);

			$this->ln(5);
			$this->rect(10,140,100,75); // CUADRO DE LAS RETENCIONES
			$this->SetY(142);
		    $this->setFont("Arial","B",9);
			$this->Cell(65,5,"RETENCIONES CONCEPTOS",0,0,'C');
			$this->Cell(35,5,"MONTO ANUAL",0,0,'C');
			$this->Line(10,147,110,147);
			$this->Line(77,140,77,215);

			$this->rect(120,$y,80,85); // CUADRO DE LAS BONIFICACIONES
			$this->SetXY(105,44);
		    $this->setFont("Arial","B",9);
			$this->Cell(60,5,"BONIFICACIONES",0,0,'C');
			$this->Cell(10,5,"",0,0,'C');
			//$this->Cell(10,5,"MES",0,0,'C');
			$this->Cell(25,5,"MONTO",0,0,'C');
			$this->Line(120,49,200,49);
			//$this->Line(165,44,165,129);
			$this->Line(177,44,177,129);
	      }


		function Cuerpo()
	    {
		  	$this->i=0;
		  	$acum=0;
			$ref=$this->arrp4[$this->i]["codemp"];
			$ref2=$this->arrp4[$this->i]["codemp"];
			$ref3=$this->arrp4[$this->i]["codemp"];
			$ref4=$this->arrp4[$this->i]["codemp"];
			foreach ($this->arrp4 as $arrp4)
			{
				$ref=$this->arrp4[$this->i]["codemp"];
				$ref2=$this->arrp4[$this->i]["codemp"];
				$ref3=$this->arrp4[$this->i]["codemp"];
				$ref4=$this->arrp4[$this->i]["codemp"];
				/*echo $ref;
				echo $ref2;
				echo $ref3;
				echo $ref4;*/

				/*$ref4=$arrp4["codemp"];
				$ref=$arrp4["codemp"];
				$ref2=$arrp4["codemp"];
				$ref3=$arrp4["codemp"];*/
				if($arrp4["codemp"]==$ref4)
				{
					$this->SetXY(50,26);
					$this->Cell(30,5,$arrp4["nomemp"],0,0,'C');

					//CICLO PARA EL INGRESO MENSUAL
					$this->SetY(53);
					foreach ($this->arrp as $arrp)
					{
						if($arrp["codemp"]==$ref)
						{
							$this->setFont("Arial","",9);
							$acum=$acum+$arrp["suma"];
							$total=$total+$arrp["suma"];
							$this->Cell(10,5,$arrp["ano"],0,0,'C');
							$this->Cell(30,5,$arrp["mes"],0,0,'C');
							$this->Cell(28,5,H::FormatoMonto($arrp["suma"]),0,0,'R');
							$this->Cell(30,5,H::FormatoMonto($acum),0,0,'R');
							$this->Cell(13,5,"",0,0,'C');
							//$this->Cell(20,5,$arrp["codemp"],0,0,'C');
							$this->ln(); 
						}
					}
					$this->SetY(124);
					$this->setFont("Arial","B",9);
					$this->Cell(28,5,"",0,0,'C');
					$this->Cell(47,5,"TOTAL Bs. ",0,0,'C');
					$this->Cell(23,5,H::FormatoMonto($acum),0,0,'R');
					$acum=0;
					$this->setFont("Arial","",9);


					//CICLO PARA LAS RETENCIONES A LOS EMPLEADOS
					$this->SetY(150);
					foreach ($this->arrp2 as $arrp2)
					{
						$mes=$arrp2["mes"];
						$monto=0;
						if($arrp2["codemp"]==$ref2)
						{
							$this->setFont("Arial","",9);
							$total2=$total2+$arrp2["suma"];
							$this->Cell(75,5,"",0,0,'L');
							$this->Cell(23,5,H::FormatoMonto($arrp2["suma"]),0,0,'R');
							$this->Cell(13,5,"",0,0,'C');
							$this->SetX(12);
							$this->Multicell(75,5,$arrp2["destipapo"],0,'L',0);
						}

					}
					$this->SetY(210);
					$this->setFont("Arial","B",9);
					$this->Cell(28,5,"",0,0,'C');
					$this->Cell(47,5,"TOTAL Bs. ",0,0,'C');
					$this->Cell(23,5,H::FormatoMonto($total2),0,0,'R');
					$total2=0;


					//CICLO PARA LAS BONIFICACIONES A LOS EMPLEADOS
					$this->SetY(50);
					foreach ($this->arrp3 as $arrp3)
					{
						$mes=$arrp3["mes"];
						$monto=0;
						if($arrp3["codemp"]==$ref3)
						{
							$this->setFont("Arial","",9);
							$total3=$total3+$arrp3["suma"];
							$this->Cell(145,5,"",0,0,'L');
							$this->Cell(30,5,$arrp3["mes1"],0,0,'C');
							$this->Cell(15,5,H::FormatoMonto($arrp3["suma"]),0,0,'R');
							$this->Cell(13,5,"",0,0,'C');
							//$this->Cell(20,5,$arrp3["codemp"],0,0,'C');
							$this->SetX(120);
							$this->setFont("Arial","",8);
							$this->Multicell(55,5,$arrp3["nomcon"],0,'L',0);
						}
					}
					$this->SetY(124);
					$this->setFont("Arial","B",9);
					$this->Cell(120,5,"",0,0,'C');
					$this->Cell(47,5,"TOTAL Bs. ",0,0,'C');
					$this->Cell(23,5,H::FormatoMonto($total3),0,0,'R');
					$total3=0;

					$this->setFont("Arial","",9);
					$this->SetXY(10,225);
					$this->Cell(50,5,'Direccion: '.$this->arrpemp[0][diremp],0,0,'L');
					$this->ln();
					$this->Cell(50,5,'Agente de Retencion: '.$this->arrpemp[0][nomemp],0,0,'L');
					$this->ln();
					$this->Cell(50,5,'Periodo: ',0,0,'L');
					$this->ln();
					$this->Cell(50,5,'Nombre del Empleado: '.$arrp4["nomemp"],0,0,'L');
					$this->ln();
					$this->Cell(50,5,'Cedula del Empleado: '.$arrp4["cedemp"],0,0,'L');
					$this->ln();
					$this->Cell(50,5,'Direccion del Trabajador: '.$arrp4["dirhab"],0,0,'L');

				}
				$this->i++;
				$this->AddPage();
			}
		}
}


?>
