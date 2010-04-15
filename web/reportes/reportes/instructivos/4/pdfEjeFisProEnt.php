<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
//	require_once("../../lib/general/fpdfadds.php");
	//require_once("../../lib/general/funciones.php");

	class pdfreporte extends fpdf
	{
		var $tb;
		var $bd;					
		var $titulo;
		var $perdes;
		var $perhas;
			
		function pdfreporte()
		{
			$this->conf="l";
			$this->fpdf($this->conf,"mm","letter");
			$this->bd=new basedatosAdo();
			$this->perdes=$_POST["perdes"];
			$this->perhas=$_POST["perhas"];
			$this->titulo=$_POST["titulo"];			
		}
		

		function Header()
		{
			$this->SetLinewidth(0.5);
			$this->Line(20,$this->GetY(),263,$this->GetY());
			$this->Line(20,$this->GetY(),20,58);
			$this->Line(263,$this->GetY(),263,58);
			$this->Image("../../img/logo_1.jpg",28,11,21);
			$this->SetLinewidth(0);
			//Logo de la Empresa
			$this->SetFont("Arial","B",6);
			//fecha actual
			$fecha=date("d/m/Y");
			$this->Cell(229);
			$this->Cell(15,10,'FECHA');
			$this->setLinewidth(0);
			//lineas fecha
			$this->line(235,22,253,22);
			$this->line(235,19,235,22);
			$this->line(253,19,253,22);
			$this->line(245,19,245,22);
			$this->line(240,19,240,22);
			$this->setXY(235,13);
			$this->Cell(5,15,substr($fecha,0,2));
			$this->Cell(5,15,substr($fecha,3,2));
			$this->Cell(10,15,substr($fecha,6,4));
			
			
			$this->ln(8);
			//Paginas
			$this->Cell(470,10,'Pagina '.$this->PageNo().' de {nb}',0,0,'C');
			$this->ln(-8);
			
			$this->sql0="SELECT codemp, nomemp, ciuemp from empresa"; 
			$tb0=$this->bd->select($this->sql0);
			$this->Cell(15,5,'');				
			$this->Cell(50,37,'CODIGO DEL ENTE: '.$tb0->fields["codemp"],0,0,'L');	
			$this->ln(3);  $this->Cell(15,5,'');
			$this->Cell(50,37,'DENOMINACIÓN: '.$tb0->fields["nomemp"],0,0,'L');
//			$this->ln(10);
			$this->ln(5);
			$this->SetFont("Arial","B",12);
			//$this->SetTextColor(0,0,128);
			$this->Cell(250,5,'EJECUCIÓN FÍSICA DE LOS PROYECTOS DEL ENTE',0,0,'C');

			$this->Ln(11);
			$this->SetFont("Arial","",7);
			$mes = array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
			$numero= array("","01","02","03","04","05","06","07","08","09","10","11","12");
			$desde=0;
			$hasta=0;
			for ($i=0;$i<=12;$i++)
			{
				if ($numero[$i] == $this->perdes)
				{
					$desde=$i;
				}
				if ($numero[$i] == $this->perhas)
				{
					$hasta=$i;
					break;
				}
			
			}
			$this->Cell(180);$this->Cell(1,3,'Periodo desde   ('.$this->perdes.') '.$mes[$desde].'    hasta    ('.$this->perhas.') '.$mes[$hasta]);


			$this->Ln(5);
			
			$this->SetLinewidth(0.5);
			$this->Line(20,$this->GetY(),263,$this->GetY());
			$this->Ln(5);
			
			$this->Line(20,$this->GetY(),263,$this->GetY());
			$this->Ln(0);
			$this->Line(20,$this->GetY(),20,200);//VERT 1 BORDE
			$this->SetLinewidth(0);
			$this->Line(35,$this->GetY(),35,200);//VERT2
			$this->Line(80,$this->GetY()+5,223,$this->GetY()+5);//HORIZ 1 
			$this->Line(80,$this->GetY(),80,200);//VERT3
		//	$this->Line(183,$this->GetY()+9,243,$this->GetY()+9);//HORIZ 2
			$this->Line(100,$this->GetY()+5,100,200); //VERT 4
			$this->Line(120,$this->GetY(),120,200); //VERT 5
			$this->Line(143,$this->GetY()+5,143,200); //VERT 6
			$this->Line(163,$this->GetY(),163,200); //VERT 7
			$this->Line(183,$this->GetY()+5,183,200); //VERT 8
			$this->Line(193,$this->GetY(),193,200); //VERT 9
			$this->Line(213,$this->GetY()+5,213,200); //VERT 10
			$this->Line(223,$this->GetY(),223,200); //VERT 11
			$this->Line(243,$this->GetY(),243,200); //VERT 12
			$this->SetLinewidth(0.5);
			$this->Line(263,$this->GetY(),263,200); //VERT 12
			$this->Line(20,200,263,200);
		//	$this->Ln(9);
			$this->setFont("Arial","B",6);
			$this->Cell(80,5,' 			',0,0,'L');
			$this->Cell(35,5,'META PROGRAMADAS',0,0,'L');
			$this->Cell(38,5,'META EJECUTADAS',0,0,'C');
			$this->Cell(30,5,'VARIACIÓN MES',0,0,'C');
			$this->Cell(31,5,'VARIACIÓN ACUMULADA',0,0,'C');
			$this->Cell(23,5,'RESPONSABLE',0,0,'L');
			$this->Cell(28,5,'PREVISIÓN ',0,0,'L');
			$this->Ln(4);
			$this->Cell(212,5,' 		',0,0,'C');
			$this->Cell(22,5,'DE LA EJECUCION',0,0,'L');
			$this->Cell(28,5,'ACTUALIZADA',0,0,'L');
			$this->Ln(4);
			$this->Cell(10,5,'');
			$this->Cell(15,5,'	CÓDIGO',0,0,'L');
			$this->Cell(50,5,'DENOMINACIÓN',0,0,'C');
			$this->Cell(18,5,'MENSUAL',0,0,'L');
			$this->Cell(20,5,'ACUMULADA',0,0,'L');
			$this->Cell(20,5,'MENSUAL',0,0,'L');
			$this->Cell(21,5,'ACUMULADA',0,0,'L');
			$this->Cell(20,5,'ABSOLUTA',0,0,'L');
			$this->Cell(10,5,'%',0,0,'L');
			$this->Cell(20,5,'ABSOLUTA',0,0,'L');
			$this->Cell(29,5,'%',0,0,'L');
			$this->Cell(28,5,'PROXIMO MES',0,0,'L');
			$this->Ln(5);
			$this->SetLinewidth(0.5);
			$this->Line(20,$this->GetY(),263,$this->GetY());
			$this->Ln(5);
			
		}
	

	
		function Cuerpo()
		{

			$subtotal1=0;
			$subtotal2=0;
			$subtotal3=0;
			$subtotal4=0;
			$subtotal5=0;
			$subtotal6=0;



			$this->setFont("Arial","",6.5);
			$pry=$this->bd->select("select codpro, nompro from fordefpry where trim(codpro) like '2%' order by codpro");

			while(!$pry->EOF)
			{
				$this->Cell(14);$this->Cell(55,3,$pry->fields["codpro"]);
				
				$mes=$this->bd->select("select sum(canmet) as programado, sum(canmeteje) as ejecutado  from fordismetperpryaccmet where trim(codpro) = '".$pry->fields["codpro"]."' and perpre='".$this->perhas."'");
				$acum=$this->bd->select("select sum(canmet) as programado, sum(canmeteje) as ejecutado  from fordismetperpryaccmet where trim(codpro) = '".$pry->fields["codpro"]."' and perpre >='".$this->perdes."' and perpre <='".$this->perhas."'");
				$this->Cell(20.5,3,number_format($mes->fields["programado"],0,',','.'),0,0,'C');
				$mesprog=$mes->fields["programado"];
				$subtotal1=$subtotal1+$mes->fields["programado"];

				$this->Cell(20,3,number_format($acum->fields["programado"],0,',','.'),0,0,'C');
				$acumprog=$acum->fields["programado"];
				$subtotal2=$subtotal2+$acum->fields["programado"];

				$this->Cell(23,3,number_format(abs($mes->fields["ejecutado"]),0,',','.'),0,0,'C');
				$mesejec=$mes->fields["ejecutado"];
				$subtotal3=$subtotal3+$mes->fields["ejecutado"];

				$this->Cell(21,3,number_format(abs($acum->fields["ejecutado"]),0,',','.'),0,0,'C');
				$acumejec=$acum->fields["ejecutado"];
				$subtotal4=$subtotal4+$acum->fields["ejecutado"];

				$dif1=$mesprog-abs($mesejec);
				$subtotal5=$subtotal5+$dif1;
				$dif2=$acumprog-abs($acumejec);
				$subtotal6=$subtotal6+$dif2;
				if ($dif1 < 0)
				{ $this->SetTextColor(255,0,0);}
				$this->Cell(20,3,number_format($dif1,0,',','.'),0,0,'C');
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
				$this->Cell(23,3,number_format($dif2,0,',','.'),0,0,'C');
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
				$this->SetX(36);
				$tb1=$this->bd->select("select upper(nompre) as nompre from cpdeftit, fordefpry where trim(codpro)=trim(codpre) and substr(trim(codpre),1,4) like trim('".$cod->fields["codpre"]."') and substr(trim(codpre),5,1)=''");
				//$this->Cell(8);
				$this->MultiCell(42,3,$pry->fields["nompro"],0,'J',0);
				$this->Ln(2);

				//$this->line(14.5,$this->GetY()-1,264,$this->GetY()-1);
				$pry->MoveNext();
			}
			$this->SetTextColor(0,0,255);
			$this->Cell(69,3,'TOTAL:...',0,0,'R');$this->Cell(12,3,number_format($subtotal1),0,'C',0);$this->Cell(20,3,number_format($subtotal2),0,'C',0);$this->Cell(21.5,3,number_format($subtotal3),0,'C',0);$this->Cell(22,3,number_format($subtotal4),0,'C',0);$this->Cell(20.5,3,number_format($subtotal5),0,'C',0);$this->Cell(29.5,3,number_format($subtotal6),0,'C',0);
		}
	}?>