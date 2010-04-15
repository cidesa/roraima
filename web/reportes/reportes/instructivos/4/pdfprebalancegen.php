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
			$this->conf="p";
			$this->fpdf($this->conf,"mm","A3");
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
			$this->SetLinewidth(0);
			//Logo de la Empresa
			$this->Image("../../img/logo_1.jpg",23,13,25);
			$this->SetFont("Arial","B",6);
			//fecha actual
			$fecha=date("d/m/Y");
			$this->Cell(225,10,' ');
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
			$this->ln(14);
			
			$this->sql0="SELECT codemp, nomemp, ciuemp from empresa"; 
			$tb0=$this->bd->select($this->sql0);
			$this->Cell(15,5,'');				
			$this->Cell(50,5,'CODIGO DEL ENTE: '.$tb0->fields["codemp"],0,0,'L');	
			$this->ln(5);  $this->Cell(15,5,'');
			$this->Cell(50,5,'DENOMINACIÓN: '.$tb0->fields["nomemp"],0,0,'L');
			$this->ln(5); $this->Cell(15,5,'');
			$this->Cell(50,5,'ORGANO DE ADSCRIPCIÓN: '.$tb0->fields["ciuemp"],0,0,'L');
			$this->ln(0);
			$this->SetFont("Arial","B",12);
			$this->SetTextColor(0,0,128);
			$this->Cell(240,-25,'BALANCE GENERAL',0,0,'C');
			$this->SetFont("Arial","B",8);
			$this->ln(0);
			$this->Cell(240,-18,'(Bolivares)',0,0,'C');
					
			$this->Ln(7);
			
			$this->SetLinewidth(0.5);
			$this->Line(20,$this->GetY(),263,$this->GetY());
			$this->Ln(5);
			
			$this->Line(20,$this->GetY(),263,$this->GetY());
			$this->Ln(0);
			$this->Line(20,$this->GetY(),20,400);//VERT 1 BORDE
			$this->SetLinewidth(0);
			$this->Line(45,$this->GetY(),45,400);//VERT2
			$this->Line(105,$this->GetY()+5,242,$this->GetY()+5);//HORIZ 1 
			$this->Line(105,$this->GetY(),105,400);//VERT3
			$this->Line(183,$this->GetY()+9,243,$this->GetY()+9);//HORIZ 2
			$this->Line(125,$this->GetY()+5,125,400); //VERT 4
			$this->Line(144,$this->GetY(),144,400); //VERT 5
			$this->Line(163,$this->GetY()+5,163,400); //VERT 6
			$this->Line(183,$this->GetY(),183,400); //VERT 7
			$this->Line(203,$this->GetY()+9,203,400); //VERT 8
			$this->Line(213,$this->GetY()+5,213,400); //VERT 9
			$this->Line(233,$this->GetY()+9,233,400); //VERT 10
			$this->Line(243,$this->GetY(),243,400); //VERT 11
			$this->SetLinewidth(0.5);
			$this->Line(263,$this->GetY(),263,400); //VERT 12
			$this->Line(20,400,263,400);
		//	$this->Ln(9);
			$this->setFont("Arial","B",6);
			$this->Cell(100,5,' 			',0,0,'L');
			$this->Cell(40,5,'BALANCE PROGRAMADO',0,0,'L');
			$this->Cell(35,5,'BALANCE REAL',0,0,'C');
			$this->Cell(60,5,'VARIACIÓN',0,0,'C');
			$this->Cell(28,5,'PREVISIÓN ',0,0,'L');
			$this->Ln(4);
			$this->Cell(170,5,' 		',0,0,'C');
			$this->Cell(43,5,'MES',0,0,'C');
			$this->Cell(23,5,'ACUMULADO',0,0,'L');
			$this->Cell(28,5,'PROXIMO',0,0,'L');
			$this->Ln(4);
			$this->Cell(10,5,'');
			$this->Cell(15,5,'	CÓDIGO',0,0,'L');
			$this->Cell(70,5,'DENOMINACIÓN',0,0,'C');
			$this->Cell(20,5,'MES',0,0,'L');
			$this->Cell(20,5,'ACUMULADO',0,0,'L');
			$this->Cell(20,5,'MES',0,0,'L');
			$this->Cell(19,5,'ACUMULADO',0,0,'L');
			$this->Cell(20,5,'ABSOLUTA',0,0,'L');
			$this->Cell(10,5,'%',0,0,'L');
			$this->Cell(20,5,'ABSOLUTA',0,0,'L');
			$this->Cell(13,5,'%',0,0,'L');
			$this->Cell(28,5,'MES',0,0,'L');
			$this->Ln(5);
			$this->SetLinewidth(0.5);
			$this->Line(20,$this->GetY(),263,$this->GetY());
			$this->Ln(5);
			
		}
	

	
		function Cuerpo()
		{
			$this->SetTextColor(0,0,0);
			$this->setFont("Arial","B",6);
			
			$this->sql0="SELECT nomrep,codpre from cpdefrep where nomrep='".$this->titulo."' order by codpre";
			$tb0=$this->bd->select($this->sql0);
			$codpre=$tb0->fields["codpre"];
		//	print($this->sql0);			
			while(!$tb0->EOF)  
				{
					$codpre=$tb0->fields["codpre"];
					$this->sql="SELECT DISTINCT codcta,descta from contabb where trim(codcta)=trim('".$codpre."')";
					$tb=$this->bd->select($this->sql);
					$codcta=$tb->fields["codcta"];			
														
					$this->sql2="SELECT codcta,pereje,salact,salprgper
								from contabb1
								where trim(codcta)=trim('".$codcta."')
								and pereje>='".$this->perdes."'
								and pereje<='".$this->perhas."'
								order by codcta,pereje"; 
					$tb2=$this->bd->select($this->sql2);
					while(!$tb2->EOF)  
				{
					$periodo=$tb2->fields["pereje"];
					$this->sql3="SELECT sum(salact) as sumact, sum(salprgper) as sumprg from contabb1
								where trim(codcta)=trim('".$codcta."')
								and pereje>='".$this->perdes."'
								and pereje<='".$periodo."' "; 
					$tb3=$this->bd->select($this->sql3);
												
								//llenando el texto*/
								$this->cell(10,5,'			');
								$this->cell(26,5,$tb->fields["codcta"]);
								$this->cell(59,5,'			');
								$this->cell(20,5,number_format($tb2->fields["salprgper"],2,'.',','));
							
								$this->cell(20,5,number_format($tb3->fields["sumprg"],2,'.',','));
								$this->cell(19,5,number_format(abs($tb2->fields["salact"]),2,'.',','));
							
								$this->cell(20,5,number_format(abs($tb3->fields["sumact"]),2,'.',','));
								$absol=$tb2->fields["salprgper"]-abs($tb2->fields["salact"]);
								$absol2=$tb3->fields["sumprg"]-abs($tb3->fields["sumact"]);
								$this->cell(20,5,number_format($absol,2,'.',','));
								
								if ($tb2->fields["salprgper"]!=0)
								{
								$porc=((abs($tb2->fields["salact"])*100)/$tb2->fields["salprgper"]);
								}
								else { $porc=0;
								}
								
								$this->cell(9,5,number_format($porc,1,'.',',').' % ');
								$this->cell(20,5,number_format($absol2,2,'.',','));
								if ($tb3->fields["sumprg"]!=0)
								{
								$porc2=((abs($tb3->fields["sumact"])*100 )/$tb3 ->fields["sumprg"]);
								}
								else { $porc2=0;
								}
								$this->cell(10,5,number_format($porc2,1,'.',',').' % ');
								//$this->ln(5);
								$this->SetX(46);
								//$y1=$this->GetY();
								$this->Multicell(60,3,$tb->fields["descta"],0,'L',0);
								//$y2=$this->GetY();
								$this->ln();
						
						
							$tb2->MoveNext();
					}
					$tb0->MoveNext();
					
					}
		}
	}?>