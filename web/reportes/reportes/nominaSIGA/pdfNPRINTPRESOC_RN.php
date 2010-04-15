<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/funciones.php");
	
	class pdfreporte extends fpdf
	{
		
		var $bd;
		var $titulos;
		var $titulos2;
		var $anchos;
		var $anchos2;
		var $campos;
		var $sql;
		var $sqlx;
		var $rep;
		var $numero;
		var $cab;
		var $codempdes;
		var $codemphas;
		var $codcardes;
		var $codcarhas;
		var $codcatdes;
		var $codcathas;
		var $codcondes;
		var $codconhas;
		var $tipnom;
		var $e1;
		var $e2;
		var $e3;
		var $elaborado;
		var $revisado;
		var $autorizado;
		var $conf;
		var $nombre;
				
		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->codempdes=trim($_POST["codempdes"]);
			$this->codemphas=trim($_POST["codemphas"]);
			$this->e1=strtoupper(trim($_POST["e1"]));
			$this->e2=strtoupper(trim($_POST["e2"]));
			$this->e3=strtoupper(trim($_POST["e3"]));

			$this->sql="select a.*,to_char(a.feccor,'dd/mm/yyyy') as feccor,c.nomemp,to_char(b.feccal,'dd/mm/yyyy') as fecing 
					from NPPRESOC a, NPasiempcont b ,NPHOJINT c
					where 
					a.codemp=c.codemp and
					trim(a.codemp) >= trim('".$this->codempdes."') and  
					trim(a.codemp) <= trim('".$this->codemphas."') and 
					a.codemp=b.codemp";
			
			$this->sqlx="select a.*,to_char(a.feccor,'dd/mm/yyyy') as feccor,c.nomemp,to_char(b.feccal,'dd/mm/yyyy') as fecing 
					from NPPRESOC a, NPasiempcont b ,NPHOJINT c
					where 
					a.codemp=c.codemp and
					trim(a.codemp) >= trim('".$this->codempdes."') and  
					trim(a.codemp) <= trim('".$this->codemphas."') and 
					a.codemp=b.codemp";
			
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s");
			//$this->ln(5);
			//$this->SetAutoPageBreak(true,0);
			
		}
		function Cuerpo()
		{
			
		    $tb=$this->bd->select($this->sql);
			$tbx=$this->bd->select($this->sqlx);
			$tbx->MoveLast();
			$ultimo=$tbx->fields["codemp"];
			
			
			while (!$tb->EOF)
			{
				$this->setFont("Arial","B",8);
				
				$this->SetFillColor(135,135,135);
				$this->Rect(10,$this->GetY(),25,3,'F');
				
				$this->ln(-1);
				$this->SetX(22);
				$this->cell(5,5,$tb->fields["codemp"],0,0,'C');
				$this->Rect(36,$this->GetY()+1,164,3,'F');

				$this->SetX(110);
				$this->cell(5,5,$tb->fields["nomemp"],0,0,'C');
				
				$this->ln(5);
				$this->setFont("Arial","B",7);
				$this->SetTextColor(0,0,190);//azul
				$this->SetX(10);
				$this->cell(5,5,"FECHA DE INGRESO:");
				$this->SetTextColor(0,0,0);
				$this->SetX(37);
				$this->cell(5,5,$tb->fields["fecing"],0,0,'L');
				$this->ln(4);
				$this->SetTextColor(0,0,190);//azul
				$this->SetX(10);
				$this->cell(5,5,"FECHA DE CORTE:");
				$this->SetTextColor(0,0,0);
				$this->SetX(37);
				
				if (strtotime($tb->fields["fecing"]) < strtotime('18/06/1997'))
				{
					$cf_feccal=$tb1->fields["feccal"]-1;
				}
				else
				{
					$cf_feccal="";
				}
				$this->cell(5,5,$cf_feccal,0,0,'L');
			
				$this->SetTextColor(0,0,190);//azul
				$this->SetX(60);
				$this->cell(5,5,"FECHA DE CALCULO:");
				$this->SetTextColor(0,0,0);
				$this->SetX(88);
				$this->cell(5,5,$tb->fields["feccor"],0,0,'L');
				
				$this->ln(-4);
				$this->setFont("Arial","B",9);
				$this->SetTextColor(0,0,190);//azul
				$this->SetX(150);
				$this->cell(5,5,"TIEMPO DE SERVICIO:");
				$this->ln(4);
				$this->setFont("Arial","B",7);
				$this->SetTextColor(0,0,0);
				$this->SetX(150);
				$this->cell(5,5,"Años:",0,0,'L');
				$this->SetX(159);
				$this->cell(5,5,$tb->fields["anoser"],0,0,'L');
				$this->SetX(169);
				$this->cell(5,5,"Meses:",0,0,'L');
				$this->SetX(179);
				$this->cell(5,5,$tb->fields["messer"],0,0,'L');
				$this->SetX(187);
				$this->cell(5,5,"Días:",0,0,'L');
				$this->SetX(195);
				$this->cell(5,5,$tb->fields["diaser"],0,0,'L');
				
				$this->ln(7);
				
				// PRIMER RENGLON DEL EMPLEADO
				
				$this->Rect(10,$this->GetY(),190,8,'F');
				$this->setFont("Arial","",7);
				$this->Setx(14);
				$this->cell(5,5,'Del');
				$this->Setx(30);
				$this->cell(5,5,'Al');
				$this->Setx(42);
				$this->cell(5,5,'Días Art.');
				$this->Setx(54);
				$this->cell(5,5,'Días');
				$this->Setx(69);
				$this->cell(5,5,'Depósito');
				$this->Setx(86);
				$this->cell(5,5,'Antiguedad');
				$this->Setx(101);
				$this->cell(5,5,'Anticipo de');
				$this->Setx(118);
				$this->cell(5,5,'Base Cálculo');
				$this->Setx(137);
				$this->cell(5,5,'Tasa');
				$this->Setx(146);
				$this->cell(5,5,'Días de');
				$this->Setx(163);
				$this->cell(5,5,'Interés');
				$this->Setx(181);
				$this->cell(5,5,'Interés');
				
				$this->ln(3);
				
				$this->Setx(44);
				$this->cell(5,5,'108');
				$this->Setx(54);
				$this->cell(5,5,'Adic.');
				$this->Setx(69);
				$this->cell(5,5,'Mensual');
				$this->Setx(86);
				$this->cell(5,5,'Acumulada');
				$this->Setx(100);
				$this->cell(5,5,'Prestaciones');
				$this->Setx(120);
				$this->cell(5,5,'Intereses');
				$this->Setx(136);
				$this->cell(5,5,'Interés');
				$this->Setx(146);
				$this->cell(5,5,'Interés');
				$this->Setx(162);
				$this->cell(5,5,'Mensual');
				$this->Setx(179);
				$this->cell(5,5,'Acumulado');
				
				$this->ln(5);
				
				
					$sql2="Select *,to_char(fecfin,'dd/mm/yyyy') as fecfin,to_char(fecini,'dd/mm/yyyy') as fecini, fecfin as fec2 
							from npimppresoc  
							where trim(codemp)=trim('".$tb->fields["codemp"]."') and diadif>0 order by fec2";
					$tb2=$this->bd->select($sql2);
					
					$d108=0;
					$d108a=0;
					while (!$tb2->EOF)
					{
									if ($this->GetY()>250)
									{
										$this->AddPage();
										$this->setFont("Arial","B",8);
										$this->SetFillColor(135,135,135);
										$this->Rect(10,$this->GetY(),25,3,'F');
										
										$this->ln(-1);
										$this->SetX(22);
										$this->cell(5,5,$tb->fields["codemp"],0,0,'C');
										$this->Rect(36,$this->GetY()+1,164,3,'F');
						
										$this->SetX(110);
										$this->cell(5,5,$tb->fields["nomemp"],0,0,'C');
										
										$this->ln(5);
										$this->setFont("Arial","B",7);
										$this->SetTextColor(0,0,190);//azul
										$this->SetX(10);
										$this->cell(5,5,"FECHA DE INGRESO:");
										$this->SetTextColor(0,0,0);
										$this->SetX(37);
										$this->cell(5,5,$tb->fields["fecing"],0,0,'L');
										$this->ln(4);
										$this->SetTextColor(0,0,190);//azul
										$this->SetX(10);
										$this->cell(5,5,"FECHA DE CORTE:");
										$this->SetTextColor(0,0,0);
										$this->SetX(37);
										
										if (strtotime($tb->fields["fecing"]) < strtotime('18/06/1997'))
										{
											$cf_feccal=$tb1->fields["feccal"]-1;
										}
										else
										{
											$cf_feccal="";
										}
										$this->cell(5,5,$cf_feccal,0,0,'L');
									
										$this->SetTextColor(0,0,190);//azul
										$this->SetX(60);
										$this->cell(5,5,"FECHA DE CALCULO:");
										$this->SetTextColor(0,0,0);
										$this->SetX(88);
										$this->cell(5,5,$tb->fields["feccor"],0,0,'L');
										
										$this->ln(-4);
										$this->setFont("Arial","B",9);
										$this->SetTextColor(0,0,190);//azul
										$this->SetX(150);
										$this->cell(5,5,"TIEMPO DE SERVICIO:");
										$this->ln(4);
										$this->setFont("Arial","B",7);
										$this->SetTextColor(0,0,0);
										$this->SetX(150);
										$this->cell(5,5,"Años:",0,0,'L');
										$this->SetX(159);
										$this->cell(5,5,$tb->fields["anoser"],0,0,'L');
										$this->SetX(169);
										$this->cell(5,5,"Meses:",0,0,'L');
										$this->SetX(179);
										$this->cell(5,5,$tb->fields["messer"],0,0,'L');
										$this->SetX(187);
										$this->cell(5,5,"Días:",0,0,'L');
										$this->SetX(195);
										$this->cell(5,5,$tb->fields["diaser"],0,0,'L');
										
										$this->ln(7);
			
										// PRIMER RENGLON DEL EMPLEADO
				
										$this->Rect(10,$this->GetY(),190,8,'F');
										$this->setFont("Arial","",7);
										$this->Setx(14);
										$this->cell(5,5,'Del');
										$this->Setx(30);
										$this->cell(5,5,'Al');
										$this->Setx(42);
										$this->cell(5,5,'Días Art.');
										$this->Setx(54);
										$this->cell(5,5,'Días');
										$this->Setx(69);
										$this->cell(5,5,'Depósito');
										$this->Setx(86);
										$this->cell(5,5,'Antiguedad');
										$this->Setx(101);
										$this->cell(5,5,'Anticipo de');
										$this->Setx(118);
										$this->cell(5,5,'Base Cálculo');
										$this->Setx(137);
										$this->cell(5,5,'Tasa');
										$this->Setx(146);
										$this->cell(5,5,'Días de');
										$this->Setx(163);
										$this->cell(5,5,'Interés');
										$this->Setx(181);
										$this->cell(5,5,'Interés');
										
										$this->ln(3);
										
										$this->Setx(44);
										$this->cell(5,5,'108');
										$this->Setx(54);
										$this->cell(5,5,'Adic.');
										$this->Setx(69);
										$this->cell(5,5,'Mensual');
										$this->Setx(86);
										$this->cell(5,5,'Acumulada');
										$this->Setx(100);
										$this->cell(5,5,'Prestaciones');
										$this->Setx(120);
										$this->cell(5,5,'Intereses');
										$this->Setx(136);
										$this->cell(5,5,'Interés');
										$this->Setx(146);
										$this->cell(5,5,'Interés');
										$this->Setx(162);
										$this->cell(5,5,'Mensual');
										$this->Setx(179);
										$this->cell(5,5,'Acumulado');
										
										$this->ln(5);
										
									}
									$this->setFont("Arial","",6);
									$this->Setx(10);
									$this->cell(5,5,$tb2->fields["fecini"]);
									$this->Setx(25);
									$this->cell(5,5,$tb2->fields["fecfin"]);
									$this->Setx(45);
									if ($tb2->fields["saltot"]==0)
									{
										$d108=0;
									}
									else
									{
										if ($tb2->fields["saladi"]!=0)
										{
											$d108=5;
										}	
										else
										{
											$d108=$tb2->fields["diaart108"];
										}
									}
									$this->cell(5,5,$d108,0,0,'C');
									$this->Setx(55);
									if ($tb2->fields["saltot"]==0)
									{
										$d108a=$tb2->fields["diaart108"];
									}
									else
									{
										if ($tb2->fields["saladi"]!=0)
										{
											$d108a=$tb2->fields["diaart108"]-5;
										}	
										else
										{
											$d108a=0;
										}
									}
									$this->cell(5,5,$d108a,0,0,'C');
									$this->Setx(76);
									$this->cell(5,5,number_format($tb2->fields["valart108"],2,'.',','),0,0,'R');
									$this->Setx(95);
									$this->cell(5,5,number_format($tb2->fields["antacum"],2,'.',','),0,0,'R');
									$this->Setx(111);
									$this->cell(5,5,number_format($tb2->fields["adeant"],2,'.',','),0,0,'R');
									$this->Setx(129);
									$this->cell(5,5,number_format($tb2->fields["capemp"],2,'.',','),0,0,'R');
									$this->Setx(140);
									$this->cell(5,5,number_format($tb2->fields["tasint"],2,'.',','),0,0,'R');
									$this->Setx(148);
									$this->cell(5,5,$tb2->fields["diadif"],0,0,'R');
									$this->Setx(169);
									$this->cell(5,5,$tb2->fields["intdev"],0,0,'R');
									$this->Setx(189);
									$this->cell(5,5,$tb2->fields["intacum"],0,0,'R');
							
									$this->ln(4);	
					$tb2->MoveNext();
					}
				////////////////////////////////////////
				$this->ln(2);
				//2DO RENGLON DEL EMPLEADO
				if ($this->GetY()>260)
				{
					$this->AddPage();
				}
				$this->Line(10,$this->GetY(),200,$this->GetY());
				$this->Line(10,$this->GetY()+5,200,$this->GetY()+5);
				$this->setFont("Arial","B",7);
				$this->SetTextColor(0,0,190);//azul
				$this->SetX(10);
				$this->cell(5,5,"TOTALES INTERES SOBRE PRESTACION DE ANTIGUEDAD ART. 108 L.O.T. REGIMEN NUEVO DEPOSITADO:");
				$this->SetTextColor(0,0,0);
				$this->SetX(189);
				$this->cell(5,5,number_format($tb->fields["intacu"],2,'.',','),0,0,'R');
				
				if ($ultimo!=$tb->fields["codemp"])
				{
					$this->AddPage();
				}
				else
				{
					$this->ln(10);
				}	
				
			$tb->MoveNext();
			}
			
			
			if ($this->GetY()>240)
			{
				$this->AddPage();
			}
			$this->setFont("Arial","B",7);
			$this->ln(8);
			$this->SetTextColor(0,0,190);//azul
			$this->line(15,$this->GetY(),55,$this->GetY());
			$this->line(80,$this->GetY(),120,$this->GetY());
			$this->line(155,$this->GetY(),195,$this->GetY());
			$this->ln(3);
			$this->SetX(25);
			$this->cell(5,5,"Elaborado por");
			$this->ln(-2);
			$this->SetX(97);
			$this->cell(5,5,"Jefe Dpto. de",0,0,'C');
			$this->SetX(173);
			$this->cell(5,5,"Director de Recursos",0,0,'C');
			$this->ln(3);
			$this->SetX(97);
			$this->cell(5,5,"Relaciones Laborales",0,0,'C');
			$this->SetX(173);
			$this->cell(5,5,"Humanos",0,0,'C');
			$this->ln(3);
			$this->SetX(97);
			$this->cell(5,5,"Revisado",0,0,'C');
			$this->SetX(173);
			$this->cell(5,5,"Autorizado",0,0,'C');
			
			$this->ln(-11);
			$this->SetTextColor(0,0,0);
			$this->SetX(32);
			$this->cell(5,5,$this->e1,0,0,'C');
			$this->SetX(97);
			$this->cell(5,5,$this->e2,0,0,'C');
			$this->SetX(173);
			$this->cell(5,5,$this->e3,0,0,'C');
			
		}
	}
?>