<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	
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
		var $codnom;
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
			
			
			$this->fecha1=$_POST["fecha1"];
			$this->fecha2=$_POST["fecha2"];
			$this->con1=$_POST["con1"];
			$this->con2=$_POST["con2"];
			$this->codnom=$_POST["codnom"];
			
			
			$this->tipcon=$_POST["tipcon"];
			
			

			
 		/*$this->sqlz= " SELECT DISTINCT(A.CODCON) AS CODCON, B.NOMCON as nomcon, A.CODNOM as codnom ,A.NOMNOM as nomnom, A.ASIDED,
							SUM(CASE WHEN A.SALDO=0 THEN 0 ELSE 1 END ) AS CANT,
							SUM(CASE WHEN A.ASIDED='A' THEN A.SALDO ELSE 0 END) AS ASIGNA,
							SUM(CASE WHEN A.ASIDED='D' THEN A.SALDO ELSE 0 END) AS DEDUC ,
							SUM(CASE WHEN A.ASIDED='P' THEN A.SALDO ELSE 0 END ) AS APORTE ,
							B.IMPCPT, b.codpar
							FROM NPNOMCAL A, NPDEFCPT B

							WHERE   (A.CODNOM) >= TRIM('".$this->con1."') AND 
									(A.CODNOM) <= TRIM('".$this->con2."') AND
                                    (CASE WHEN '".$this->tipcon."'='T' THEN 'T' ELSE A.ASIDED END)='".$this->tipcon."' AND
									A.SALDO > 0  AND
									(B.CODCON) = (A.CODCON)
									GROUP BY A.CODCON,B.NOMCON,A.CODNOM,A.NOMNOM,A.ASIDED, B.IMPCPT,b.codpar
									ORDER BY A.CODNOM,A.ASIDED,A.CODCON ";
 			*/
 		
 	 $this->sqlz = "SELECT DISTINCT(A.CODCON) as codcon, 
					B.NOMCON as nomcon,
					A.CODNOM as codnom,
					B.OPECON,
					SUM(CASE WHEN B.OPECON='A' THEN MONTO ELSE 0 END) as ASIGNA, 
					SUM(CASE WHEN B.OPECON='D' THEN MONTO ELSE 0 END) as  DEDUC ,
					SUM(CASE WHEN B.OPECON='P' THEN MONTO ELSE 0 END) as APORTE ,
					B.IMPCPT, b.codpar
					FROM NPHISCON A, NPDEFCPT B
					WHERE  (B.CODCON) = (A.CODCON) AND
					(A.CODNOM) = TRIM('".$this->codnom."') AND
					(A.CODCON) >= TRIM('".$this->con1."') AND
					(A.CODCON) <= TRIM('".$this->con2."') AND
					CASE WHEN '".$this->tipcon."'='T' THEN 'T' ELSE B.OPECON END='".$this->tipcon."' AND
					A.MONTO > 0 AND
					A.FECNOM >=TRIM('".$this->fecha1."') AND
					A.FECNOM <=TRIM('".$this->fecha2."') 
					GROUP BY A.CODCON,B.NOMCON,A.CODNOM,B.OPECON,B.IMPCPT,B.CODPAR
					ORDER BY A.CODNOM,B.OPECON,A.CODCON";	

 	 //	 print($this->sqlz);
		}
		
		
		
		function Header()
		{
			$this->cab=new cabecera();
			$this->SetTextColor(0,0,0);
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","B",9);
			$this->ln(-1);

			$tbz=$this->bd->select($this->sqlz);
			
		
		if (!$tbz->EOF)
			{	
			$this->SetTextColor(0,0,128);
			$this->SetXY(120,35);
			$this->cell(20,5,"PERIDO DEL                            AL                    ");
			$this->SetTextColor(0,0,0);
			$this->cell(20,5,$this->fecha1."                 ".$this->fecha2);
					
			$this->ln();
			
				$this->Line(10,$this->GetY()+5,200,$this->GetY()+5);
		// 	ESto son los titulos
		
					$this->setFont("Arial","",9);		
					$this->SetXY(10,35);
					$this->SetTextColor(0,0,128);
					$this->cell(20,5,"NOMINA:");
					$this->Line(10,55,200,55);
								
						$codnom=$tbz->fields["codnom"];
										
						$this->sql="SELECT COUNT(DISTINCT(CODEMP)) as numero FROM NPNOMCAL WHERE (CODNOM)=('".$codnom."')";
									  
						$tbx=$this->bd->select($this->sql);	

						$this->SetXY(10,40);
						$this->cell(17,5,"NRO. TRABAJADORES:");
						
						$this->SetXY(60,40);
						$this->SetTextColor(0,0,0);
						$this->cell(20,5,$tbx->fields["numero"]);
						$Asigna=0;
						$Deducion=0;
						$Aporte=0;
						$neto=0;
						
							$this->SetXY(30,35);
							$this->SetTextColor(0,0,0);
							$this->cell(15,5,$tbz->fields["codnom"]);
							$this->SetXY(60,35);
							$this->SetTextColor(0,0,0); 
							
					       $this->sqlt="select nomnom as nomnom FROM npnomina A WHERE (A.CODNOM) = ('".$codnom."') order by A.CODNOM";
							 $tbt=$this->bd->select($this->sqlt);	
							$this->cell(120,5,strtoupper($tbt->fields["nomnom"]));
					
							$this->SetTextColor(0,0,128);
							$this->SetXY(10,50);
							$this->cell(17,5,"CODIGO:");
			
							$this->SetXY(30,50);
							$this->cell(17,5,"NOMBRE DEL CONCEPTO");
							
							$this->SetXY(90,50);
							$this->cell(17,5,"ASIGNACION");
							
							$this->SetXY(120,50);
							$this->cell(17,5,"DEDUCION");
							
							$this->SetXY(145,50);
							$this->cell(17,5,"APORTE");
							
							$this->SetXY(170,50);
							$this->cell(17,5,"TOTAL");
							$this->SetY(60);
						
		
			}
	
	
			

					
	}
		
		function Cuerpo()
	{
		$tbz=$this->bd->select($this->sqlz);
		
			
		if (!$tbz->EOF)
			{	
			$this->SetTextColor(0,0,128);
			$this->SetXY(120,35);
			$this->cell(20,5,"PERIDO DEL                            AL                    ");
			$this->SetTextColor(0,0,0);
			$this->cell(20,5,$this->fecha1."                 ".$this->fecha2);
			$this->ln();
			$this->Line(10,$this->GetY()+5,200,$this->GetY()+5);
		// 	ESto son los titulos
		
					$this->setFont("Arial","",9);		
					$this->SetXY(10,35);
					$this->SetTextColor(0,0,128);
					$this->cell(20,5,"NOMINA:");
					$this->Line(10,55,200,55);
								
						$codnom=$tbz->fields["codnom"];
										
						$this->sql="SELECT COUNT(DISTINCT(CODEMP)) as numero FROM NPNOMCAL WHERE (CODNOM)=('".$codnom."')";
									  
						$tbx=$this->bd->select($this->sql);		
						$this->SetXY(60,40);
						$this->SetTextColor(0,0,0);
						$this->cell(20,5,$tbx->fields["numero"]);
						$Asigna=0;
						$Deducion=0;
						$Aporte=0;
						$neto=0;
						
							$this->SetXY(30,35);
							$this->SetTextColor(0,0,0);
							$this->cell(15,5,$tbz->fields["codnom"]);
							$this->SetXY(60,35);
							$this->SetTextColor(0,0,0); 
							
					      	 $this->sqlt="select nomnom as nomnom FROM npnomina A WHERE (A.CODNOM) = ('".$codnom."') order by A.CODNOM";
							$tbt=$this->bd->select($this->sqlt);	
							$this->cell(120,5,strtoupper($tbt->fields["nomnom"]));
							$this->SetY(60);
						
		
			}
		
		while (!$tbz->EOF)
			{if ($tbz->fields["codnom"]!=$codnom)
				{
					//TOTALES y addpage

					$this->SetTextColor(0,0,0);
					$this->Line(90,$this->GetY(),200,$this->GetY());
					$this->ln(4);
					$this->SetXY(70,$this->GetY()+2);
					$this->SetTextColor(0,0,128);
					$this->Cell(60,5,"TOTALES:");
					$this->SetTextColor(0,0,0);
					$this->SetXY(100,$this->GetY());		
					$this->cell(80,5,number_format($Asigna,2,'.',','));
					$this->SetXY(120,$this->GetY());
					$this->cell(80,5,number_format($Deducion,2,'.',','));
					$this->SetXY(145,$this->GetY());
					$this->cell(80,5,number_format($Aporte,2,'.',','));
					
					$this->SetXY(170,$this->GetY());
					$this->cell(17,5,number_format($netototal,2,'.',','));
					
					$this->Ln(4);
					$this->AddPage();
					
					//IMPRIMIR TITULOS

						
					$this->setFont("Arial","",9);		
					$this->SetXY(10,35);
					$this->SetTextColor(0,0,128);
					$this->cell(20,5,"NOMINA:");
								
							$codnom=$tbz->fields["codnom"];

							
															
						//esta cajita es la de los trabajador
							
						$this->sql="SELECT COUNT(DISTINCT(CODEMP)) as numero FROM NPNOMCAL WHERE (CODNOM)=('".$codnom."')";
									  
						$tbx=$this->bd->select($this->sql);		
						$this->SetXY(60,40);
						$this->SetTextColor(0,0,0);
						$this->cell(20,5,$tbx->fields["numero"]);
						$Asigna=0;
						$Deducion=0;
						$Aporte=0;
						$neto=0;
						
							$this->SetXY(30,35);
							$this->SetTextColor(0,0,0);
							$this->cell(15,5,$tbz->fields["codnom"]);
							$this->SetXY(60,35);
							$this->SetTextColor(0,0,0); 
							
							$this->sqlt="select nomnom as nomnom FROM npnomina A WHERE (A.CODNOM) = ('".$codnom."') order by A.CODNOM";
							$tbt=$this->bd->select($this->sqlt);	
							$this->cell(120,5,strtoupper($tbt->fields["nomnom"]));
					
							
						
				}
				
				//DETALLE
							
							$this->SetTextColor(0,0,0);
							
							$this->cell(20,5,$tbz->fields["codcon"]);
							//$this->Ln(10);	
							$this->SetXY(20,$this->GetY());														
							
													
						
							$this->SetTextColor(0,0,0);
							$this->SetX(90);
							$this->cell(30,5,number_format($tbz->fields["asigna"],2,'.',','));
							//$this->Ln(10);
														
																			
							$this->SetTextColor(0,0,0);
							$this->SetX(120);
							$this->cell(30,5,number_format($tbz->fields["deduc"],2,'.',','));
							//$this->Ln(10);
													
							
							$this->SetTextColor(0,0,0);
							$this->SetX(145);
							$this->cell(30,5,number_format($tbz->fields["aporte"],2,'.',','));
							
							//$this->cell(30,5,$tbz->fields["aporte"]);
							
														
							$Asigna+=$tbz->fields["asigna"];
							$Deducion+=$tbz->fields["deduc"];
							$Aporte+=$tbz->fields["aporte"];
							
							
							if(($Asigna >= 0) and ($Deducion >= 0))
						  	{$neto=$Asigna-$Deducion+$Aporte;} 
		    				
		    				
		    				$netototal+=$neto;
		    				
		    				$this->SetX(170);
		    				$this->Cell(30,5,number_format($neto,2,'.',','));
													  								
							$this->SetX(30);
							$this->SetTextColor(0,0,0);
							$this->multicell(50,3,$tbz->fields["nomcon"]);
							$this->Ln(2);
																	
							
							
		    				
		    						    								
			$codnom=$tbz->fields["codnom"];		
			$tbz->MoveNext();		
			//MOVENExT
	
			}	

					$this->SetTextColor(0,0,0);
					$this->Line(90,$this->GetY(),200,$this->GetY());
					$this->ln(4);
					$this->SetXY(70,$this->GetY()+2);
					$this->SetTextColor(0,0,128);
					$this->Cell(40,5,"TOTALES:");
					$this->SetTextColor(0,0,0);
					$this->SetXY(90,$this->GetY());		
					$this->cell(80,5,number_format($Asigna,2,'.',','));
					$this->SetXY(120,$this->GetY());
					$this->cell(80,5,number_format($Deducion,2,'.',','));
					$this->SetXY(145,$this->GetY());
					$this->cell(80,5,number_format($Aporte,2,'.',','));
					$this->SetXY(170,$this->GetY());
					$this->cell(17,5,number_format($netototal,2,'.',','));
					

		}
				
			
	}
			
?>
