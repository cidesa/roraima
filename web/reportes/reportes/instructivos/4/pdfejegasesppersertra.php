<?
//<!--  Programado  por Jaime Suàrez -->
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/funciones.php");
	require_once("../../lib/general/fpdfadds.php");

	
	class pdfreporte extends fpdf
	{
		var $periododes;
		var $periodohas;
			
		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
 			$this->periododes=$_POST["periododes"];
 			$this->periodohas=$_POST["periodohas"];
		}

		function Header()
		{
			//$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$emp=$this->bd->select("select * from empresa");
			$this->setFont("Arial","",7);
			$this->Image("../../img/logo_1.jpg",29,12,25);
			$this->Ln(-2);
			$this->Cell(34);$this->Cell(1,55,$emp->fields["codemp"],0,0,'C');
			$this->Ln(4);
			$this->Cell(34);$this->Cell(1,55,$emp->fields["nomemp"],0,0,'C');
			$this->Ln(4);
			//$this->Cell(4.5);$this->Cell(1,10,'ÓRGANO DE ADSCRIPCIÓN');
			$this->Ln(-5);
			$this->setFont("Arial","",9);
			$this->Cell(230);$this->Cell(1,10,'FECHA');
			$this->Ln(4);
			$this->Cell(227.5);$this->Cell(1,10,date("d").'   '.date("m").'   '.date("y"));
			/* lineas y cuadros*/
			$principio=10;//37.5
			$this->line(237.5,$principio+12.5,255,$principio+12.5);
			$this->line(237.5,$principio+7.5,237.5,$principio+12.5);
			$this->line(243.5,$principio+10.5,243.5,$principio+12.5);
			$this->line(249.5,$principio+10.5,249.5,$principio+12.5);
			$this->line(255,$principio+7.5,255,$principio+12.5);
			$fin=158+46;
			$izqder=60;
			$this->Line($izqder-20,$principio+36,$izqder-20,$fin);
			$this->Line($izqder+42,$principio+36,$izqder+42,$fin);
			$this->Line($izqder+85.5,$principio+36,$izqder+85.5,$fin);
			$this->Line($izqder+129,$principio+36,$izqder+129,$fin);
			$this->Line($izqder+187,$principio+36,$izqder+187,$fin);
			$this->Line($izqder+42,$principio+41.5,$izqder+187,$principio+41.5);
			$this->Line($izqder+63.25,$principio+41.5,$izqder+63.25,$fin);
			$this->Line($izqder+107.75,$principio+41.5,$izqder+107.75,$fin);
			$this->Line($izqder+129,$principio+46.5,$izqder+187,$principio+46.5);
			$this->Line($izqder+157,$principio+41.5,$izqder+157,$fin);
			$this->Line($izqder+149,$principio+46.5,$izqder+149,$fin);
			$this->Line($izqder+179,$principio+46.5,$izqder+179,$fin);
			$this->SetLineWidth(0.48);
			$this->Rect(14.5,$principio,250,35);
			$this->line(14.5,$principio+55.5,264,$principio+55.5);
			$this->Rect(14.5,$principio+36,250,158);
			/*-----------------*/
			$this->Ln(4);
			$this->setFont("Arial","",12);
			$this->MultiCell(250,6,'
			EJECUCIÓN DE LOS GASTOS ESPECIFICOS DE PERSONAL,
			SERVICIOS Y TRANSFERENCIAS
			(Bolívares)',0,'C',0);
			$this->Ln(-2);
			$this->setFont("Arial","",7);
			$mes = array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
			$numero= array("","01","02","03","04","05","06","07","08","09","10","11","12");
			$desde=0;
			$hasta=0;
			for ($i=0;$i<=12;$i++)
			{
				if ($numero[$i] == $this->periododes)
				{
					$desde=$i;
				}
				if ($numero[$i] == $this->periodohas)
				{
					$hasta=$i;
					break;
				}
			
			}
			$this->Cell(180);$this->Cell(1,0,'Periodo desde   ('.$this->periododes.') '.$mes[$desde].'    hasta    ('.$this->periodohas.') '.$mes[$hasta]);
			$this->Ln(3.5);
			$this->setFont("Arial","",7);
			$this->Cell(103);$this->Cell(46,10,'PROGRAMADO');$this->Cell(51,10,'EJECUTADO');$this->Cell(35.5,10,'VARIACIÓN');
			$this->MultiCell(18,4,'
			PREVISIÓN
			PRÓXIMO
			MES',0,'C',0);
			$this->Ln(-11.5);
			$this->setFont("Arial","",11);
			$this->Cell(190,10,'          CÓD.                         CONCEPTO');
			$this->setFont("Arial","",7);
			$this->Cell(23,10,'MES');$this->Cell(22,10,'ACUMULADO');
			$this->Ln(5);$this->Cell(99);$this->Cell(16.5,10,'MES');$this->Cell(27,10,'ACUMULADO');$this->Cell(17.5,10,'MES');$this->Cell(30,10,'ACUMULADO');
			$this->Ln(3);$this->Cell(182);$this->Cell(19,10,'ABSOLUTA');$this->Cell(10,10,'%');$this->Cell(20,10,'ABSOLUTA');$this->Cell(10,10,'%');
			$this->Ln(11);
		}
		function Cuerpo()
		{
		
			$this->setFont("Arial","",6.5);
			$cod=$this->bd->select("select codpre from cpdefrep where nomrep='EJECUCIÓN DE LOS GASTOS ESPECIFICOS DE PERSONAL, SERVICIOS Y TRANSFERENCIAS' order by codpre");

			$tabla1="cpasiini";
			$tabla2="cpdeftit";
			$ingresosegresos=0;
			while(!$cod->EOF)
			{
				$this->Cell(8);$this->Cell(83,3,$cod->fields["codpre"]);
				
				$mes=$this->bd->select("select sum(a.monasi) + sum(a.montra) + sum(a.monadi) - sum(a.montrn) - sum(a.mondim) as programado, sum(a.moncau) as ejecutado from cpasiini a, cpdeftit b where a.codpre = b.codpre and upper(trim(a.codpre)) like upper(trim('%".$cod->fields["codpre"]."%')) and a.perpre ='".$this->periodohas."'");
				$acum=$this->bd->select("select sum(a.monasi) + sum(a.montra) + sum(a.monadi) - sum(a.montrn) - sum(a.mondim) as programado, sum(a.moncau) as ejecutado from cpasiini a, cpdeftit b where a.codpre = b.codpre and upper(trim(a.codpre)) like upper(trim('%".$cod->fields["codpre"]."%')) and a.perpre >='".$this->periododes."'and a.perpre <='".$this->periodohas."'");
				$this->Cell(23,3,number_format($mes->fields["programado"],2,',','.'),0,0,'C');
				$mesprog=$mes->fields["programado"];

				$this->Cell(21,3,number_format($acum->fields["programado"],2,',','.'),0,0,'C');
				$acumprog=$acum->fields["programado"];

				$this->Cell(23,3,number_format(abs($mes->fields["ejecutado"]),2,',','.'),0,0,'C');
				$mesejec=$mes->fields["ejecutado"];

				$this->Cell(21,3,number_format(abs($acum->fields["ejecutado"]),2,',','.'),0,0,'C');
				$acumejec=$acum->fields["ejecutado"];

				$dif1=$mesprog-abs($mesejec);
				$dif2=$acumprog-abs($acumejec);
				if ($dif1 < 0)
				{ $this->SetTextColor(255,0,0);}
				$this->Cell(20,3,number_format($dif1,2,',','.'),0,0,'C');
				$this->SetTextColor(0,0,0);
				if ($mesprog==0)
				{
					$this->SetTextColor(0,120,0);
					if ($mesejec==0)
					{
						$this->Cell(8,3,number_format(0,1,',','.'),0,0,'C');
					}
					else
					{
						$this->Cell(8,3,'N/E',0,0,'C');
					}
					$this->SetTextColor(0,0,0);
//					$this->Cell(8,3,'100,0',0,0,'C');
				}
				else
				{
					$porcmes=abs(($dif1*100)/$mesprog);
					$this->Cell(8,3,number_format($porcmes,1,',','.'),0,0,'C');
				}


				if ($dif2 < 0)
				{ $this->SetTextColor(255,0,0);}
				$this->Cell(23,3,number_format($dif2,2,',','.'),0,0,'C');
				$this->SetTextColor(0,0,0);
				if ($acumprog==0)
				{
					$this->SetTextColor(0,120,0);
					if ($acumejec==0)
					{
						$this->Cell(6,3,number_format(0,1,',','.'),0,0,'C');
					}
					else
					{
						$this->Cell(6,3,'N/E',0,0,'C');
					}
					$this->SetTextColor(0,0,0);
					//$this->Cell(6,3,'100',0,0,'C');
				}
				else
				{
					$porcacum=abs(($dif2*100)/$acumprog);
					$this->Cell(6,3,number_format($porcacum,1,',','.'),0,0,'C');
				}
				$this->SetX(33.5);
				$tb1=$this->bd->select("select upper(a.nompre) as nompre from cpdeftit a, cpasiini b where a.codpre = b. codpre and upper(trim(a.codpre)) like upper(trim('%".$cod->fields["codpre"]."%'))");
				$this->Cell(8);
				$this->MultiCell(57,3,$tb1->fields["nompre"],0,'J',0);
				$this->Ln(2);

				//$this->line(14.5,$this->GetY()-1,264,$this->GetY()-1);
				$cod->MoveNext();
			}
		
		}//end cuerpo
	}
?>
