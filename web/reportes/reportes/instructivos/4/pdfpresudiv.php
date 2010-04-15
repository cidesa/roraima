<?
//<!--  Programado  por Jaime Suàrez -->
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/funciones.php");
	require_once("../../lib/general/fpdfadds.php");

	
	class pdfreporte extends fpdf
	{
		var $nrocreddes;
		var $nrocredhas;
		var $w_nrocta;
		var $w_nroctahas;
		var $fechades;
		var $fechahas;
		var $tipcaudes;
		var $tipcauhas;
		var $status;
			
		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
 			$this->nrocreddes=$_POST["nrocreddes"];
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
			$this->Ln(25.5);
			$this->Cell(4.5);$this->Cell(1,10,$emp->fields["codemp"]);
			$this->Ln(4);
			$this->Cell(4.5);$this->Cell(1,10,$emp->fields["nomemp"]);
			$this->Ln(4);
			$this->Cell(4.5);$this->Cell(1,10,'ÓRGANO DE ADSCRIPCIÓN');
			$this->Ln(-5);
			$this->setFont("Arial","",9);
			$this->Cell(170);$this->Cell(1,10,'FECHA');
			$this->Ln(4);
			$this->Cell(167.5);$this->Cell(1,10,date("d").'   '.date("m").'   '.date("y"));
			/* lineas y cuadros*/
			$this->line(177,50,195,50);
			$this->line(177,45,177,50);
			$this->line(183,48,183,50);
			$this->line(189,48,189,50);
			$this->line(195,45,195,50);
			$fin=213;
			$this->Line(70,70.5,70,208);
			$this->Line(105,70.5,105,$fin);
			$this->Line(139,70.5,139,$fin);
			$this->Line(183,70.5,183,$fin);
			$this->Line(70,75,183,75);
			$this->Line(87,75,87,$fin);
			$this->Line(122,75,122,$fin);
			$this->Line(139,80,183,80);
			$this->Line(161,75,161,$fin);
			$this->Line(155,80,155,$fin);
			$this->Line(177,80,177,$fin);
			$this->SetLineWidth(0.48);
			$this->Rect(14.5,37.5,188,30);
			$this->line(14.5,90,202,90);
			$this->Rect(14.5,70.5,188,170);
			/*-----------------*/
			$this->Ln(12);
			$this->setFont("Arial","",15);
			$this->Cell(200,10,'PRESUPUESTO DE DIVISAS',0,0,'C');
			$this->Ln(13.5);
			$this->setFont("Arial","",7);
			$this->Cell(68);$this->Cell(36,10,'PROGRAMADO');$this->Cell(40,10,'EJECUTADO');$this->Cell(29,10,'VARIACIÓN');
			$this->MultiCell(18,4,'
			PREVISIÓN
			PRÓXIMO
			MES',0,'C',0);
			$this->Ln(-11.5);
			$this->setFont("Arial","",11);
			$this->Cell(136,10,'                   CONCEPTO');
			$this->setFont("Arial","",7);
			$this->Cell(17.5,10,'MES');$this->Cell(22,10,'ACUMULADO');
			$this->Ln(5);$this->Cell(65);$this->Cell(12.5,10,'MES');$this->Cell(22,10,'ACUMULADO');$this->Cell(12.5,10,'MES');$this->Cell(30,10,'ACUMULADO');
			$this->Ln(3);$this->Cell(130);$this->Cell(16,10,'ABSOLUTA');$this->Cell(6,10,'%');$this->Cell(16,10,'ABSOLUTA');$this->Cell(10,10,'%');
			/**********************************************************************************************/
			$this->Ln(10);
			$this->setFont("Arial","",6);
			$this->SetLineWidth(0);
			$this->Cell(6);
			$this->MultiCell(50,3.5,'I. INGRESOS DE DIVISAS');
			$this->line(14.5,$this->GetY(),202,$this->GetY());
			$this->Cell(10);
			$this->MultiCell(50,3.5,'1. EXPORTACIONES TOTALES');
			$this->line(14.5,$this->GetY(),202,$this->GetY());
			$this->Cell(15);
			$this->MultiCell(50,3.5,'1.1 DE BIENES');
			$this->line(14.5,$this->GetY(),202,$this->GetY());
			$this->Cell(15);
			$this->MultiCell(50,3.5,'1.2 DE SERVICIOS');
			$this->line(14.5,$this->GetY(),202,$this->GetY());
			$this->Cell(20);
			$this->MultiCell(50,3.5,'1.2.1 TRANSPORTE Y SEGUROS');
			$this->line(14.5,$this->GetY(),202,$this->GetY());
			$this->Cell(20);
			$this->MultiCell(50,3.5,'1.2.2 OTROS');
			$this->line(14.5,$this->GetY(),202,$this->GetY());
			$this->Cell(10);
			$this->MultiCell(50,3.5,'2. PRÉSTAMOS EXTERNOS');
			$this->line(14.5,$this->GetY(),202,$this->GetY());
			$this->Cell(10);
			$this->MultiCell(50,3.5,'3. INGRESOS DIVERSOS');
			$this->line(14.5,$this->GetY(),202,$this->GetY());
			$this->Cell(15);
			$this->MultiCell(50,3,'3.1 INTERESES POR COLOCACIONES
			Y PRÉSTAMOS EXTERNOS');
			$this->line(14.5,$this->GetY(),202,$this->GetY());
			$this->Cell(15);
			$this->MultiCell(50,3,'3.2 RECUPERACIÓN DE DEPÓSITOS Y
			PRÉSTAMOS EN EL EXTERIOR');
			$this->line(14.5,$this->GetY(),202,$this->GetY());
			$this->Cell(15);
			$this->MultiCell(50,3.5,'3.3 OTROS');
			$this->line(14.5,$this->GetY(),202,$this->GetY());
			$this->Cell(6);
			$this->MultiCell(50,3.5,'II. EGRESOS DE DIVISAS');
			$this->line(14.5,$this->GetY(),202,$this->GetY());
			$this->Cell(10);
			$this->MultiCell(50,3.5,'1. IMPORTACIONES TOTALES');
			$this->line(14.5,$this->GetY(),202,$this->GetY());
			$this->Cell(15);
			$this->MultiCell(50,3.5,'1.1 DE BIENES');
			$this->line(14.5,$this->GetY(),202,$this->GetY());
			$this->Cell(20);
			$this->MultiCell(50,3.5,'1.1.1 DE CONSUMO');
			$this->line(14.5,$this->GetY(),202,$this->GetY());
			$this->Cell(20);
			$this->MultiCell(50,3.5,'1.1.2 INTERMEDIOS');
			$this->line(14.5,$this->GetY(),202,$this->GetY());
			$this->Cell(20);
			$this->MultiCell(50,3.5,'1.1.3 DE INVERSIÓN');
			$this->line(14.5,$this->GetY(),202,$this->GetY());
			$this->Cell(15);
			$this->MultiCell(50,3.5,'1.2 DE SERVICIOS');
			$this->line(14.5,$this->GetY(),202,$this->GetY());
			$this->Cell(20);
			$this->MultiCell(50,3.5,'1.2.1 TRANSPORTE Y SEGUROS');
			$this->line(14.5,$this->GetY(),202,$this->GetY());
			$this->Cell(20);
			$this->MultiCell(50,3.5,'1.2.2 SERVICIOS DIVERSOS');
			$this->line(14.5,$this->GetY(),202,$this->GetY());
			$this->Cell(25);
			$this->MultiCell(50,3.5,'1.2.2.1 BECAS');
			$this->line(14.5,$this->GetY(),202,$this->GetY());
			$this->Cell(25);
			$this->MultiCell(50,3.5,'1.2.2.2 MISIONES');
			$this->line(14.5,$this->GetY(),202,$this->GetY());
			$this->Cell(25);
			$this->MultiCell(50,3.5,'1.2.2.3 OTROS');
			$this->line(14.5,$this->GetY(),202,$this->GetY());
			$this->Cell(10);
			$this->MultiCell(50,3.5,'2. SERVICIO DE LA DEUDA EXTERNA');
			$this->line(14.5,$this->GetY(),202,$this->GetY());
			$this->Cell(15);
			$this->MultiCell(50,3.5,'2.1 AMORTIZACIONES');
			$this->line(14.5,$this->GetY(),202,$this->GetY());
			$this->Cell(20);
			$this->MultiCell(50,3.5,'2.1.1 CORTO PLAZO');
			$this->line(14.5,$this->GetY(),202,$this->GetY());
			$this->Cell(20);
			$this->MultiCell(50,3.5,'2.1.2 LARGO PLAZO');
			$this->line(14.5,$this->GetY(),202,$this->GetY());
			$this->Cell(15);
			$this->MultiCell(50,3.5,'2.2 INTERESES');
			$this->line(14.5,$this->GetY(),202,$this->GetY());
			$this->Cell(20);
			$this->MultiCell(50,3.5,'2.2.1 CORTO PLAZO');
			$this->line(14.5,$this->GetY(),202,$this->GetY());
			$this->Cell(20);
			$this->MultiCell(50,3.5,'2.2.2 LARGO PLAZO');
			$this->line(14.5,$this->GetY(),202,$this->GetY());
			$this->Cell(10);
			$this->MultiCell(50,3.5,'3. OTROS EGRESOS');
			$this->line(14.5,$this->GetY(),202,$this->GetY());
			$this->SetLineWidth(0.48);
			$this->Ln(4);
			$this->Cell(6);$this->Cell(1,5,'12. TIPO DE CAMBIO ÚNICO UTILIZADO Bs x $');
			$this->line(14.5,$this->GetY(),202,$this->GetY());
			$this->Ln(5);
			$this->Cell(6);$this->Cell(1,5,'13. OBSERVACIONES:');
			$this->line(14.5,$this->GetY(),202,$this->GetY());
			$this->SetLineWidth(0);
			for ($i=1;$i<=5;$i++)
			{
				$this->Ln(4.5);
				$this->line(14.5,$this->GetY(),202,$this->GetY());
			} 
			/**********************************************************************************************/
		}
		function Cuerpo()
		{
		}//end cuerpo
	}
?>
