<?
//<!--  Programado  por Jaime Suàrez -->
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/funciones.php");
	require_once("../../lib/general/fpdfadds.php");

	
	class pdfreporte extends fpdf
	{
		var $periodo;
		var $nrocredhas;
		var $w_nrocta;
		var $w_nroctahas;
		var $fechades;
		var $fechahas;
		var $tipcaudes;
		var $tipcauhas;
		var $status;
		var	$principal=7.5;
			
		function pdfreporte()
		{
			$this->fpdf("p","mm","Legal");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
 			$this->periodo=$_POST["periodo"];
 			$this->nrocredhas=$_POST["nrocredhas"];
 			$this->w_nrocta=$_POST["w_nrocta"];
 			$this->w_nroctahas=$_POST["w_nroctahas"];
 			$this->fechades=$_POST["fechades"];
 			$this->fechahas=$_POST["fechahas"];
 			$this->tipcaudes=$_POST["tipcaudes"];
 			$this->tipcauhas=$_POST["tipcauhas"];
 			$this->status=$_POST["status"];
		}

		function Header()
		{
			//$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$emp=$this->bd->select("select * from empresa");
			$this->setFont("Arial","",7);
			$this->Image("../../img/logo_1.jpg",27,10,22);
			$this->Ln(-4.5);
			$this->Cell(7);$this->Cell(1,50,$emp->fields["codemp"]);
			$this->Ln(3);
			$this->Cell(7);$this->Cell(1,50,$emp->fields["nomemp"]);
			$this->Ln(4);
			//$this->Cell(4.5);$this->Cell(1,10,'ÓRGANO DE ADSCRIPCIÓN');
			$this->Ln(-5);
			$this->setFont("Arial","",9);
			$this->Cell(170);$this->Cell(1,10,'FECHA');
			$this->Ln(4);
			$this->Cell(167.5);$this->Cell(1,10,date("d").'   '.date("m").'   '.date("y"));
			/* lineas y cuadros sin ajustar a la cantidad de partidas*//*
			$principal=$this->principal;//7.5;
			$this->line(177,$principal+12,195,$principal+12);
			$this->line(177,$principal+7,177,$principal+12);
			$this->line(183,$principal+10,183,$principal+12);
			$this->line(189,$principal+10,189,$principal+12);
			$this->line(195,$principal+7,195,$principal+12);
			$fin=213;
			$this->Line(35,$principal+31,35,208);
			$this->Line(105,$principal+31,105,$fin);
			$this->Line(154,$principal+31,154,$fin);
			$this->Line(183,$principal+31,183,$fin);
			$this->Line(105,$principal+36.5,183,$principal+36.5);
			$this->Line(130,$principal+36.5,130,$fin);
			$this->Line(175,$principal+36.5,175,$fin);
			$this->SetLineWidth(0.48);
			$this->Rect(14.5,$principal,188,30);
			$this->line(14.5,$principal+42.5,202,$principal+42.5);
			$this->Rect(14.5,$principal+31,188,170);*/
			/*-----------------*/
			$this->Ln(8);
			$this->setFont("Arial","",15);
			$this->Cell(200,10,'PRESUPUESTO DE CAJA',0,0,'C');
			$this->Ln(6);
			$this->Cell(200,10,'(Bolívares )',0,0,'C');
			$this->setFont("Arial","",7);
			$this->Ln(6.5);
			$mes = array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
			$numero= array("","01","02","03","04","05","06","07","08","09","10","11","12");
			for ($i=0;$i<=12;$i++)
			{
				if ($numero[$i] == $this->periodo)
				{
					$este=$i;
					break;
				}
			
			}
			$this->Cell(160);$this->Cell(1,3,'Periodo: '.$this->periodo.' - '.$mes[$este]);
			$this->Ln(4);
			$this->Cell(68);$this->Cell(41);$this->Cell(41,10,'HASTA EL MES');$this->Cell(23,10,'VARIACIÓN');
			$this->MultiCell(18,3,'
			PREVISIÓN
			PRÓXIMO
			MES',0,'C',0);
			$this->Ln(-11.5);
			$this->setFont("Arial","",11);
			$this->Cell(136,10,'         CÓD.                      DENOMINACIÓN');
			$this->setFont("Arial","",7);
			$this->Ln(4);$this->Cell(98);$this->Cell(49,10,'PROGRAMADO           EJECUTADO');$this->Cell(20,10,'ABSOLUTA');$this->Cell(6,10,'%');
			$this->Ln(9);
		}
		function Cuerpo()
		{
			$this->setFont("Arial","",6);
			$saldo=$this->bd->select("select sum(salant) as saldo from contabb a, cpdefrep b where a.codcta=b.codpre and b.nompre='PRESUPUESTO DE CAJA'");
			$this->SetTextColor(255,100,255);
			$this->Cell(26);$this->Cell(99.5,3,'SALDO INICIAL');$this->Cell(13,3,number_format($saldo->fields["saldo"],2,',','.'),0,0,'C');
			$this->SetTextColor(0,0,0);
			$this->Ln(3);
			$this->line(14.5,$this->GetY(),202,$this->GetY());
			$this->setFont("Arial","B",6);
			$this->Cell(26);$this->Cell(75,3,'INGRESOS');
			$this->setFont("Arial","",6);
			$this->Ln(3);
			$this->line(14.5,$this->GetY(),202,$this->GetY());
			
			$cod=$this->bd->select("select codpre from cpdefrep where nomrep='PRESUPUESTO DE CAJA' order by codpre");
			$ingegre=substr($cod->fields["codpre"],0,1);

			$tabla1="ciasiini";
			$tabla2="cideftit";
			$ingresosegresos=0;
			while(!$cod->EOF)
			{
				if (substr($cod->fields["codpre"],0,1) != $ingegre)
				{
					$ingegre=substr($cod->fields["codpre"],0,1);

					$this->SetTextColor(255,100,255);
					$subtotal=$saldo->fields["saldo"] + $ingresosegresos;
					$this->Cell(26);$this->Cell(99.5,3,'SALDO INICIAL + INGRESOS');$this->Cell(13,3,number_format($subtotal,2,',','.'),0,0,'C');
					$ingresosegresos=0;
					$this->SetTextColor(0,0,0);
					$this->Ln(3);
					$this->line(14.5,$this->GetY(),202,$this->GetY());
					$this->setFont("Arial","B",6);
					$this->Cell(26);$this->Cell(75,3,'EGRESOS');
					$this->setFont("Arial","",6);
					$this->Ln(3);
					$this->line(14.5,$this->GetY(),202,$this->GetY());
					$tabla1="cpasiini";
					$tabla2="cpdeftit";
				}
				$this->Cell(4.5);$this->Cell(21.5,3,$cod->fields["codpre"]);
				$tb1=$this->bd->select("select upper(descta) as descta from contabb where trim(codcta)=trim('".$cod->fields["codpre"]."')");
				$this->Cell(79,3,$tb1->fields["descta"]);

				$tb1=$this->bd->select("select case when sum(a.monasi) <> 0 then sum(a.monasi) else 0 end as programado  from ".$tabla1." a, ".$tabla2." b where a.codpre=b.codpre and trim(b.codcta)=trim('".$cod->fields["codpre"]."') and a.perpre <='".$this->periodo."'");
				if ($tb1->fields["programado"] == 0)
				{
					$tb1=$this->bd->select("select case when sum(salprgper) <> 0 then sum(salprgper) else 0 end as programado from contabb1 where trim(codcta) = trim('".$cod->fields["codpre"]."') and pereje <= '".$this->periodo."'");
				}
				$this->Cell(5,3,number_format($tb1->fields["programado"],2,',','.'),0,0,'C');
				$tb2=$this->bd->select("select case when sum(salact) <> 0 then sum(salact) else 0 end as ejecutado from contabb1 where trim(codcta) = trim('".$cod->fields["codpre"]."') and pereje <= '".$this->periodo."'");
				$this->Cell(44,3,number_format(abs($tb2->fields["ejecutado"]),2,',','.'),0,0,'C');
				$ingresosegresos = $ingresosegresos + abs($tb2->fields["ejecutado"]);
				$dif=$tb1->fields["programado"] - abs($tb2->fields["ejecutado"]);
				if ($dif < 0)
				{ $this->SetTextColor(255,0,0);}
				$this->Cell(1,3,number_format($dif,2,',','.'),0,0,'C');
				$this->SetTextColor(0,0,0);
				if ($tb1->fields["programado"]==0)
				{
					$this->SetTextColor(0,120,0);
					if ($tb2->fields["ejecutado"]==0)
					{
						$this->Cell(28,3,number_format(0,1,',','.'),0,0,'C');
					}
					else
					{
						$this->Cell(28,3,'N/E',0,0,'C');
					}
					$this->SetTextColor(0,0,0);
				}
				else
				{
					$this->Cell(28,3,number_format(($dif*100)/$tb1->fields["programado"],1,',','.'),0,0,'C');
				}
				$this->Ln(3);
				$this->line(14.5,$this->GetY(),202,$this->GetY());
				$cod->MoveNext();
			}
			$this->setFont("Arial","B",6);
			$this->Cell(26);$this->Cell(99,3,'SALDO FINAL');
			$this->SetTextColor(0,0,250);
			$this->Cell(13,3,number_format($subtotal-$ingresosegresos,2,',','.'),0,0,'C');
			$this->setFont("Arial","",6);
			$this->Ln(3);
			/*lineas y cuadros ajustados a la cantidad de partidas*/
			$principal=$this->principal;
			$fin = $this->GetY();
			$final = $this->GetY() - ($principal+31);
			$this->Rect(14.5,$this->principal+31,188,$final);
			$this->line(177,$principal+12,195,$principal+12);
			$this->line(177,$principal+7,177,$principal+12);
			$this->line(183,$principal+10,183,$principal+12);
			$this->line(189,$principal+10,189,$principal+12);
			$this->line(195,$principal+7,195,$principal+12);
			$this->Line(35,$principal+31,35,$fin);
			$this->Line(105,$principal+31,105,$fin);
			$this->Line(154,$principal+31,154,$fin);
			$this->Line(183,$principal+31,183,$fin);
			$this->Line(105,$principal+36.5,183,$principal+36.5);
			$this->Line(130,$principal+36.5,130,$fin);
			$this->Line(175,$principal+36.5,175,$fin);
			$this->SetLineWidth(0.48);
			$this->Rect(14.5,$principal,188,30);
			$this->line(14.5,$principal+42.5,202,$principal+42.5);
			$this->Rect(14.5,$this->principal+31,188,$final);
			/*-----------------------------------------------------*/
		}//end cuerpo
	}
?>
