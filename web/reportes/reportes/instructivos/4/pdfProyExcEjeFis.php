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
			$this->SetLinewidth(0);
			//Logo de la Empresa
			$this->SetFont("Arial","B",12);
				$this->SetTextColor(0,0,128);
				$this->Ln(5);
			$this->Cell(240,5,'PROYECTOS QUE EXCEDEN EL EJERCICIO FISCAL',0,0,'C');
			$this->Ln(-3);
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
			$this->ln(5);
			
			$this->sql0="SELECT codemp, nomemp, ciuemp from empresa"; 
			$tb0=$this->bd->select($this->sql0);
			
			$this->SetFont("Arial","B",6);
			$this->SetTextColor(0,0,0);
			$this->Cell(15,5,'');				
			$this->Cell(50,5,'CODIGO DEL ENTE: '.$tb0->fields["codemp"],0,0,'L');	
			$this->ln(5);  $this->Cell(15,5,'');
			$this->Cell(50,5,'DENOMINACIÓN: '.$tb0->fields["nomemp"],0,0,'L');
			$this->ln(5);  $this->Cell(15,5,'');
			$this->Cell(50,5,'ACCION ESPECIFICA: ',0,0,'L');
			$this->ln(5);  $this->Cell(15,5,'');
			$this->Cell(50,5,'FUENTE DE FINANCIAMIENTO: ',0,0,'L');
			$this->ln(10);
				$this->SetTextColor(0,0,128);
			$this->SetLinewidth(0.5);
			//$this->Line(20,$this->GetY(),263,$this->GetY());
			//$this->Ln(5);
			
			$this->Line(20,$this->GetY(),263,$this->GetY());
			$this->Ln(0);
			$this->Line(20,$this->GetY(),20,200);//VERT 1 BORDE
			$this->SetLinewidth(0);
			$this->Line(35,$this->GetY(),35,200);//VERT2
			$this->Line(100,$this->GetY()+5,263,$this->GetY()+5);//HORIZ 1 
			$this->Line(100,$this->GetY(),100,200);//VERT3
	
			$this->Line(120,$this->GetY()+5,120,200); //VERT 4
			$this->Line(140,$this->GetY(),140,200); //VERT 5
			$this->Line(163,$this->GetY()+5,163,200); //VERT 6
			$this->Line(183,$this->GetY(),183,200); //VERT 7
			$this->Line(203,$this->GetY()+5,203,200); //VERT 8
			$this->Line(223,$this->GetY(),223,200); //VERT 9
		
			$this->Line(243,$this->GetY()+5,243,200); //VERT 11
			
			$this->SetLinewidth(0.5);
			$this->Line(263,$this->GetY(),263,200);
			$this->Line(20,200,263,200);
		//	$this->Ln(9);
			$this->setFont("Arial","B",6);
			$this->Cell(105,5,' 			',0,0,'L');
			$this->Cell(30,5,'PROGRAMADO',0,0,'L');
			$this->Cell(35,5,'EJECUTADO',0,0,'C');
			$this->Cell(31,5,'VARIACIÓN MES',0,0,'C');
			$this->Cell(53,5,'VARIACIÓN ACUMULADA',0,0,'C');
			
			$this->Ln(4);
			$this->Cell(5,5,'',0,0,'C');
			$this->Cell(20,5,'CÓDIGO',0,0,'C');
			
			
			$this->Ln(4);
			$this->Cell(10,5,'');
			$this->Cell(15,5,'PARTIDA',0,0,'L');
			$this->Cell(70,5,'DENOMINACIÓN',0,0,'C');
			$this->Cell(18,5,'MENSUAL',0,0,'L');
			$this->Cell(20,5,'ACUMULADO',0,0,'L');
			$this->Cell(20,5,'MENSUAL',0,0,'L');
			$this->Cell(21,5,'ACUMULADO',0,0,'L');
			$this->Cell(20,5,'ABSOLUTA',0,0,'L');
			$this->Cell(20,5,'RELATIVA %',0,0,'L');
			$this->Cell(20,5,'ABSOLUTA',0,0,'L');
			$this->Cell(29,5,'RELATIVA %',0,0,'L');
			
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
					$this->sql="select A.codcta as codcta, b.codpre as codpre, b.nompre as nompre, b.perpre,
								b.moncom as moncom, b.monasi as monasi, b.monadi as monadi, b.mondim as mondim,
								b.montrn as montrn, b.montra as montra
							 	from cpdeftit as A, cpasiini as b
 								where 
								--trim(A.codcta)=trim('".$codpre."') and
								b.perpre>='".$this->perdes."'
								and b.perpre<='".$this->perhas."'
								and substr(A.codpre,0,23) like substr(b.codpre,0,23) 
								and	A.codcta is not null and trim(A.codcta)<>trim('')
			   					and b.codpre like ('%".$codpre."%') order by codpre, perpre";
					
					$tb=$this->bd->select($this->sql);
						//	print($this->sql);
					while(!$tb->EOF)  
				{
						//print($this->sql);
					$codpre2=$tb->fields["codpre"];
					$periodo=$tb->fields["perpre"];			
										
					$this->sql2="SELECT sum(moncom) as moncom, sum(monasi) as monasi, sum(monadi) as monadi, 
								sum(mondim) as mondim, sum(montrn) as montrn, sum (montra) as montra from cpasiini
								where trim(codpre)=trim('".$codpre2."')
								and perpre>='".$this->perdes."'
								and perpre<='".$periodo."' 
								and perpre!='00'"; 
					$tb2=$this->bd->select($this->sql2);
							//		print($this->sql2);			
								//llenando el texto
								$this->cell(10,5,'			');
								$this->cell(26,5,$tb->fields["codcta"]);
								$this->cell(59,5,'			');
								$promes=$tb->fields["monasi"]+$tb->fields["montra"]-$tb->fields["montrn"]+$tb->fields["monadi"]-$tb->fields["mondim"];
								$proacu=$tb2->fields["monasi"]+$tb2->fields["montra"]-$tb2->fields["montrn"]+$tb2->fields["monadi"]-$tb2->fields["mondim"];
								$this->cell(20,5,number_format($promes,2,'.',','));
								$this->cell(20,5,number_format($proacu,2,'.',','));
								$this->cell(19,5,number_format($tb->fields["moncom"],2,'.',','));
								$this->cell(20,5,number_format($tb2->fields["moncom"],2,'.',','));
								
								$absol=$promes-$tb->fields["moncom"];
								$absol2=$proacu-$tb2->fields["moncom"];
								$this->cell(20,5,number_format($absol,2,'.',','));
								
								if ($tb->fields["moncom"]!=0)
								{
								$porc=($promes*100)/$tb->fields["moncom"];
								}
								else { $porc=0;
								}
								
								$this->cell(9,5,number_format($porc,1,'.',',').' % ');
								$this->cell(20,5,number_format($absol2,2,'.',','));
								if ($tb2->fields["moncom"]!=0)
								{
								$porc2=($proacu*100 )/$tb2->fields["moncom"];
								}
								else { $porc2=0;
								}
								$this->cell(10,5,number_format($porc2,1,'.',',').' % ');
								//$this->ln();
								$this->SetX(46);
								$this->Multicell(60,5,$tb->fields["nompre"],0,'L',0);
								$this->ln();
							$tb->MoveNext();
					
					}
					$tb0->MoveNext();
					
					}
		}
	}?>