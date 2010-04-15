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
		var $prodes;
		var $prohas;
		var $accdes;
		var $acchas;
		var $pardes;
		var $parhas;
		var $actual;

	
		function pdfreporte()
		{
			$this->conf="l";
			$this->fpdf($this->conf,"mm","Letter");
			$this->bd=new basedatosAdo();			
			$this->prodes=$_POST["prodes"];
			$this->prohas=$_POST["prohas"];
			$this->accdes=$_POST["accdes"];
			$this->acchas=$_POST["acchas"];
			$this->pardes=$_POST["pardes"];
			$this->parhas=$_POST["parhas"];
		}
		

		function Header()
		{
			//Logo de la Empresa
			$this->SetFont("Arial","B",6);
			//fecha actual
			$fecha=date("d/m/Y");
			$this->Cell(220,10,' ');
			$this->Image("../../img/logo_1.jpg",15,10,25);
			$this->Cell(15,10,'FECHA');
			$this->setLinewidth(0);
			//lineas fecha
			$this->line(230,22,248,22);
			$this->line(230,19,230,22);
			$this->line(248,19,248,22);
			$this->line(235,19,235,22);
			$this->line(240,19,240,22);
			$this->setXY(230,13);
			$this->Cell(5,15,substr($fecha,0,2));
			$this->Cell(5,15,substr($fecha,3,2));
			$this->Cell(10,15,substr($fecha,6,4));
			
			
			$this->ln(8);
			//Paginas
			$this->Cell(470,10,'Pagina '.$this->PageNo().' de {nb}',0,0,'C');
			$this->ln(12);
			
			$this->sql0="SELECT codemp, nomemp, ciuemp from empresa"; 
			$tb0=$this->bd->select($this->sql0);
							
			$this->Cell(50,5,'CODIGO DEL ENTE: '.$tb0->fields["codemp"],0,0,'L');	
			$this->ln(5);  
			$this->Cell(50,5,'DENOMINACIÓN: '.$tb0->fields["nomemp"],0,0,'L');
			$this->ln(5); 
			$this->Cell(50,5,'ORGANO DE ADSCRIPCIÓN: '.$tb0->fields["ciuemp"],0,0,'L');
			$this->ln(5);
			$this->Cell(50,5,'PROYECTO O ACCIÓN CENTRALIZADA: ',0,0,'L');
			$this->ln(5);
			$this->Cell(50,5,'UNIDAD EJECUTORA: ',0,0,'L');	
			$this->ln(10);
			$this->SetFont("Arial","B",10);
				$this->SetTextColor(0,0,128);
			$this->Cell(280,5,'EJECUCIÓN FINANCIERA MENSUAL DEL PRESUPUESTO DE GASTOS',0,0,'C');
			$this->ln(5);
			$this->Cell(280,5,'(BOLIVARES)',0,0,'C');	
			$this->Ln(10);
			$this->SetLinewidth(0.5);
			$this->Line(10,$this->GetY(),262,$this->GetY());
			$this->setFont("Arial","B",6);
			$this->Ln(0);
			$this->Cell(117,5,' 		',0,0,'L');
			$this->Cell(95,5,'EJECUTADO',0,0,'L');
			$this->Cell(30,5,'DISPONIBILIDAD PRESUPUESTARIA',0,0,'L');
			$this->Ln(5);
	
			$this->Line(10,$this->GetY()-5,10,200);//VERT 1 BORDE
			$this->SetLinewidth(0);
			//$this->Line(10,$this->GetY(),30,$this->GetY());//HORIZ1
			$this->Line(30,$this->GetY()-5,30,200);//VERT2
			$this->Line(116,$this->GetY(),169,$this->GetY());//HORIZ 2 
			$this->Line(78,$this->GetY()-5,78,200);//VERT3
			$this->Line(220,$this->GetY(),262,$this->GetY());//HORIZ 4
			$this->Line(96,$this->GetY()-5,96,200); //VERT 4
			$this->Line(116,$this->GetY()-5,116,200); //VERT 5
			$this->Line(134,$this->GetY(),134,200); //VERT 6
			$this->Line(152,$this->GetY(),152,200); //VERT 7
			$this->Line(169,$this->GetY()-5,169,200); //VERT 8
			$this->Line(185,$this->GetY()-5,185,200); //VERT 9
			$this->Line(202,$this->GetY()-5,202,200); //VERT 10
			$this->Line(220,$this->GetY()-5,220,200); //VERT 11
			$this->Line(241,$this->GetY(),241,200); //VERT 12
			$this->SetLinewidth(0.5);
			$this->Line(262,$this->GetY()-5,262,200); //VERT 13
			$this->Line(10,200,262,200);
			$this->Ln(4);
			$this->Cell(30,5,' 			',0,0,'L');
			$this->Cell(38,5,'DENOMINACIÓN',0,0,'L');
			$this->Cell(19,5,'PRESUPUESTO',0,0,'L');
			$this->Cell(19,5,'PROGRAMADO',0,0,'L');
			$this->Cell(20,5,'COMPROMISO',0,0,'L');
			$this->Cell(18,5,'CAUSADO',0,0,'L');
			$this->Cell(15,5,'PAGADO',0,0,'L');
			$this->Cell(18,5,'% COMPROM. ',0,0,'L');
			$this->Cell(18,5,'% CAUSADO',0,0,'L');
			$this->Cell(17,5,'% PAGADO',0,0,'L');
			$this->Cell(23,5,'MES ANTERIOR',0,0,'L');
			$this->Cell(23,5,'A LA FECHA',0,0,'L');
			$this->Ln(2);
			$this->Cell(70,5,' ',0,0,'L');
			$this->Cell(20,5,'ANUAL',0,0,'L');$this->Ln(5);
			$this->SetLinewidth(0.5);
			$this->Line(10,$this->GetY(),262,$this->GetY());
			$this->Ln(4);
			$X=$this->GetX();
			$Y=$this->GetY();
			$this->SetY(78);$this->SetX(11);
			$this->MultiCell(1,2,'PARTIDA');
			$this->SetY(78);$this->SetX(15);
			$this->MultiCell(1,2,'GENERICA');
			$this->SetY(78);$this->SetX(19);
			$this->MultiCell(1,2,'ESPECIF');
			$this->SetY(78);$this->SetX(24);
			$this->MultiCell(1,2,'SUBESPEC');
			$this->SetX($X);
			$this->SetY($Y);
		}
	

	
		function Cuerpo()
		{
			$this->SetTextColor(0,0,0);
			$this->setFont("Arial","B",7);
		
			$this->sql="SELECT distinct(substr(codpre,3,2)) as proyacc, substr(codpre,1,1) as poa,
 						nompre, coduni
						FROM cpdeftit where (substr(codpre,1,1)='1' or substr(codpre,1,1)='2')
						and substr(codpre,5,1)<>'-' and substr(codpre,2,1)='-' and
						((substr(codpre,3,2)>='".$this->prodes."' and substr(codpre,3,2)<='".$this->prohas."')or
						(substr(codpre,3,2)>='".$this->accdes."' and substr(codpre,3,2)<='".$this->acchas."'))
						 order by substr(codpre,1,1)";

			$tb=$this->bd->select($this->sql);
			$actual=$tb->fields["proyacc"];
			$poa=$tb->fields["poa"];
			while(!$tb->EOF)  
				{
					if ($actual!=$tb->fields["proyacc"])
						{
						$this->AddPage();
						$actual=$tb->fields["proyacc"];
						$poa=$tb->fields["poa"];
						}
					$this->ln(5);
			  		$this->cell(25,-91); 
				    $this->cell(5,-91,$tb->fields["coduni"]); 
					$this->SetY(49);
					$this->cell(42);
					$this->cell(4,3,$tb->fields["proyacc"]);
					$this->Multicell(55,3,$tb->fields["nompre"],0,'L',0);
					
				    $this->ln(5);
					$this->SetY(93);
					
					$this->sql2="SELECT distinct(substr(codpre,12,23)) as partida, perpre,
								nompre, monasi,codpre
								FROM cpasiini where substr(codpre,1,1)='".$poa."' and
								substr(codpre,3,2)='".$actual."' and perpre!='00'
								order by codpre,perpre"; 
					
					/*anterior seria anual.... y solo proyectos
					SELECT distinct(substr(codpre,12,23)) as partida, nompre, monasi,codpre
 							FROM cpasiini where substr(codpre,1,1)='2' and
  							substr(codpre,3,2)='".$actual."' and perpre='00'*/
					$tb2=$this->bd->select($this->sql2);
					//	print($this->sql2);
						$partida=$tb2->fields["partida"];
						$total=0;
						
				while(!$tb2->EOF)  
							{	$pag1=$this->PageNo();
								if ($partida!=$tb2->fields["partida"])
								{
								$partida=$tb2->fields["partida"];
								$total=0;
								}
								$periodo=$tb2->fields["perpre"];
								//llenando el texto
								$this->ln(0);
								$this->cell(20,5,$tb2->fields["partida"]);
								$this->cell(49,5,' ');
								$this->cell(18,5,number_format($tb2->fields["monasi"],2,'.',','));
								$this->cell(20,5,number_format($tb2->fields["monasi"],2,'.',','));
								
								//--------------------------------
								$this->sql3="SELECT sum(monimp) as tcomp
 											FROM cpimpcom where substr(codpre,1,1)='".$poa."' and
  											substr(codpre,3,2)='".$actual."' and substr(codpre,12,12)=trim('".$partida."')
											group by monimp"; 
											
								$tb3=$this->bd->select($this->sql3);
								$this->cell(18,5,number_format($tb3->fields["tcomp"],2,'.',','));
								if ($tb2->fields["monasi"]!=0)
								{
								$porcomp=(($tb3->fields["tcomp"]*100)/$tb2->fields["monasi"]);
								}
								else { $porcomp=0;
								}
								
								//-----------------------------------
								$this->sql4="SELECT sum(monimp) as tcau
 											FROM cpimpcau where substr(codpre,1,1)='".$actual."' and
  											substr(codpre,3,2)='".$actual."' and substr(codpre,12,12)=trim('".$partida."')
											group by monimp"; 
								$tb4=$this->bd->select($this->sql4);
								$this->cell(18,5,number_format($tb4->fields["tcau"],2,'.',','));
								if ($tb2->fields["monasi"]!=0)
								{$porcau=(($tb4->fields["tcau"]*100)/$tb2->fields["monasi"]);
								}
								else { $porcau=0;
								}	
									
								//---------------------------------------	
												//print($this->sql4);			
								$this->sql5="SELECT sum(monimp) as tpag 
 											FROM cpimppag where substr(codpre,1,1)='".$actual."' and
  											substr(codpre,3,2)='".$actual."' and substr(codpre,12,12)=trim('".$partida."')
											group by monimp"; 
								$tb5=$this->bd->select($this->sql5);
								$this->cell(18,5,number_format($tb5->fields["tpag"],2,'.',','));
								if ($tb2->fields["monasi"]!=0)
								{
								$porpag=(($tb5->fields["tpag"]*100)/$tb2->fields["monasi"]);
								}
								else { $porpag=0;
								}
								
								//--------------------------------------
								$this->cell(15,5,number_format($porcomp,1,'.',',').' % ');
								$this->cell(18,5,number_format($porcau,1,'.',',').' % ');
								$this->cell(20,5,number_format($porpag,1,'.',',').' % ');
						
								//	$this->cell(20,5,$tb2->fields["codpre"]);
								//$this->cell(20,5,$tb2->fields["perpre"]);
								
								if ($periodo==01)
								{$this->cell(20,5,'0.0');
								$total=$tb2->fields["monasi"];
								$this->cell(20,5,number_format($total,2,'.',','));
										}
								else
								{$this->cell(20,5,number_format($tb2->fields["monasi"],2,'.',','));
								$total=$total+$tb2->fields["monasi"];
								$this->cell(20,5,number_format($total,2,'.',','));
								}
								
								//$tb2->fields["perpre"];
								
								$this->SetX(30);
								$y1=$this->GetY();
								$this->Multicell(48,3,$tb2->fields["nompre"],0,'L',0);
								$y2=$this->GetY();
								$this->ln();
								$pag2=$this->PageNo();
								if ($pag1!=$pag2)
								{	
									$pag1=$pag2;
									$lay=$this->GetY();
									//$this->ln(5);
									$this->SetY(47);
			  						$this->cell(25); 
							    	$this->cell(5,3,$tb->fields["coduni"]); 
									$this->SetY(49);
									$this->cell(42);
									$this->cell(4,3,$tb->fields["proyacc"]);
									$this->Multicell(55,3,$tb->fields["nompre"],0,'L',0);
									$this->ln(5);
									$this->SetY($lay);
								
								}
								
								$tb2->MoveNext();
								
							}
					$tb->MoveNext();
					
					}
	
		}
	}
?>