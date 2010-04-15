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
				$this->SetX(18);
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
				$this->Setx(18);
				$this->cell(5,5,'Fecha de');
				$this->Setx(40);
				$this->cell(5,5,'Salario/Sueldo');
				$this->Setx(70);
				/*$this->cell(5,5,'Alícuota de');
				$this->Setx(56);
				$this->cell(5,5,'Alícuota de');
				$this->Setx(73);
				$this->cell(5,5,'Salario');
				$this->Setx(85);*/
				$this->cell(5,5,'Días');				
				$this->Setx(100);
				$this->cell(5,5,'Depósito');
				$this->Setx(130);
				$this->cell(5,5,'Antiguedad');
				$this->Setx(159);
				$this->cell(5,5,'Anticipo');
				$this->Setx(183);
				$this->cell(5,5,'Total');

				$this->ln(3);
				$this->Setx(18);
				$this->cell(5,5,'Depósito');
				$this->Setx(40);
				$this->cell(5,5,'Diario');
				$this->Setx(70);
				/*$this->cell(5,5,'B/Fin de Año');
				$this->Setx(56);
				$this->cell(5,5,'Bono Vac.');
				$this->Setx(74);
				$this->cell(5,5,'Total');
				$this->Setx(83);*/
				$this->cell(5,5,'Art. 108');								
				$this->Setx(100);
				$this->cell(5,5,'Mensual');
				$this->Setx(130);
				$this->cell(5,5,'Acumulada');
				$this->Setx(180);
				$this->cell(5,5,'Antiguedad');
				$this->ln(5);


					$sql2="Select *,to_char(fecfin,'dd/mm/yyyy') as fecfin, fecfin as fec2
							from npimppresoc
							where trim(codemp)=trim('".$tb->fields["codemp"]."') and tipo<>'A' and tipo<>'P' order by fec2";

							//H::printR($sql2);exit;
					$tb2=$this->bd->select($sql2);
					$acumanti=0;
					$diasanti=0;
					$acumdiasanti=0;
					$diasadi=0;
					$acumdiasadi=0;
					$d108=0;
					$d108a=0;
					while (!$tb2->EOF)
					{
								if ( (($tb2->fields["valart108"]>0) || ($tb2->fields["adeant"]>0)) && ($tb2->fields["diadif"]>0) )
								{
									if ($this->GetY()>250)
									{
										$this->AddPage();
										$this->setFont("Arial","B",8);
										$this->SetFillColor(135,135,135);
										$this->Rect(10,$this->GetY(),25,3,'F');

										$this->ln(-1);
										$this->SetX(18);
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

										$this->Rect(10,$this->GetY(),190,8,'F');
										$this->setFont("Arial","",7);
										$this->Setx(18);
										$this->cell(5,5,'Fecha de');
										$this->Setx(40);
										$this->cell(5,5,'Salario');
										$this->Setx(70);
									/*	$this->cell(5,5,'Alícuota de');
										$this->Setx(56);
										$this->cell(5,5,'Alícuota de');
										$this->Setx(73);
										$this->cell(5,5,'Salario');
										$this->Setx(85);*/
										$this->cell(5,5,'Días');
										$this->Setx(100);
										$this->cell(5,5,'Depósito');
										$this->Setx(130);
										$this->cell(5,5,'Antiguedad');
										$this->Setx(159);
										$this->cell(5,5,'Anticipo');
										$this->Setx(183);
										$this->cell(5,5,'Total');

										$this->ln(3);
										$this->Setx(18);
										$this->cell(5,5,'Depósito');
										$this->Setx(40);
										$this->cell(5,5,'Diario');
										$this->Setx(70);
										/*$this->cell(5,5,'B/Fin de Año');
										$this->Setx(56);
										$this->cell(5,5,'Bono Vac.');
										$this->Setx(74);
										$this->cell(5,5,'Total');
										$this->Setx(83);*/
										$this->cell(5,5,'Art. 108');
										$this->Setx(100);
										$this->cell(5,5,'Mensual');
										$this->Setx(130);
										$this->cell(5,5,'Acumulada');
										$this->Setx(180);
										$this->cell(5,5,'Antiguedad');
										$this->ln(5);

									}
									$this->setFont("Arial","",6);
									$this->Setx(18);
									$this->cell(5,5,$tb2->fields["fecfin"]);
									$this->Setx(45);
									$this->cell(5,5,H::FormatoMonto($tb2->fields["salempdia"]),0,0,'R');
									$this->Setx(75);
									/*$this->cell(5,5,H::FormatoMonto($tb2->fields["aliuti"]),0,0,'R');
									$this->Setx(64);
									$this->cell(5,5,H::FormatoMonto($tb2->fields["alibono"]),0,0,'R');
									$this->Setx(79);
									$this->cell(5,5,H::FormatoMonto($tb2->fields["saltot"]),0,0,'R');
									$this->Setx(88);*/
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
									$this->cell(5,5,$d108);
									$this->Setx(105);
									$this->cell(5,5,H::FormatoMonto($tb2->fields["valart108"]),0,0,'R');
									$acumanti=$acumanti+$tb2->fields["valart108"];
									$this->Setx(137);
									$this->cell(5,5,H::FormatoMonto($tb2->fields["antacum"]),0,0,'R');
									$this->antiguedad=$tb2->fields["antacum"];
									$this->Setx(165);
									$this->cell(5,5,H::FormatoMonto($tb2->fields["adeant"]),0,0,'R');
									$this->Setx(192);
									$this->cell(5,5,H::FormatoMonto($tb2->fields["antacum"]),0,0,'R');

									$this->ln(3);

									//dias antiguedad
									if ($tb2->fields["diadif"] > 0)
									{
										if ($tb2->fields["diaart108"] > 0)
										{
											$diasanti=$tb2->fields["diaart108"];
										}
										else
										{
											$diasanti=0;
										}
									}
									else
									{
										$diasanti=0;
									}

								$acumdiasanti=$acumdiasanti+$diasanti;

								//dias ADICIONALES
								/*	if ( ($tb2->fields["diadif"]>0) && ($tb2->fields["saladi"]<>0) )
									{
										if ($tb2->fields["diaart108"] > 0)
										{
											$diasadi=$tb2->fields["diaart108"]-5;
										}
										else
										{
											$diasadi=0;
										}
									}
									else
									{
										$diasadi=0;
									}

								$acumdiasadi=$acumdiasadi+$diasadi;*/

								}
					$tb2->MoveNext();
					}
				////////////////////////////////////////
				$this->ln(4);
				//2DO RENGLON DEL EMPLEADO
				if ($this->GetY()>200)
				{
					$this->AddPage();
				}
				$this->Rect(10,$this->GetY(),190,51);
				$this->setFont("Arial","B",7);
				$this->SetTextColor(0,0,190);//azul
				$this->SetX(10);
				$this->cell(5,5,"TOTALES PRESTACIONES DE ANTIGUEDAD ART. 108 L.O.T. DEPOSITADO:");
				$this->SetTextColor(0,0,0);
				//calculamos antiguedad
				/*$sql2="select sum(coalesce(valart108,0)) as antiguedad
						  from npimppresoc
						  where trim(codemp)=trim('".$tb->fields["codemp"]."')";*/

				//$sql2="Select max(antacum) as antiguedad from npimppresoc where codemp='".$tb->fields["codemp"]."' and tipo<>'A' and tipo<>'P' --and fecfin<='".$tb->fields["feccor"]."'";
				//en que mundo vivimos
				$sql2="Select max(antacum) as antiguedad from npimppresoc where codemp='".$tb->fields["codemp"]."' and tipo<>'A' and tipo<>'P' and fecfin=(Select max(fecfin) as antiguedad from npimppresoc where codemp='".$tb->fields["codemp"]."' and tipo<>'A' and tipo<>'P' and fecini<feccor)";

				//H::printR($sql2);exit;
				$tb2=$this->bd->select($sql2);

				$antiguedad=$tb2->fields["antiguedad"];
				$this->SetX(150);
				//$this->cell(5,5,H::FormatoMonto($tb2->fields["antiguedad"]),0,0,'R');
				$this->cell(5,5,H::FormatoMonto($antiguedad),0,0,'R');
				$this->ln(4);
				$this->setFont("Arial","B",7);
				$this->SetTextColor(0,0,190);//azul
				$this->SetX(10);
				$this->cell(5,5,"DIAS DE ANTIGUEDAD DEPOSITADOS:");
				$this->SetTextColor(0,0,0);
				$this->SetX(60);
				$this->cell(5,5,$acumdiasanti,0,0,'C');
				$this->ln(4);
				$this->setFont("Arial","B",7);
				$this->SetTextColor(0,0,190);//azul
				$this->SetX(10);
				$this->cell(5,5,"DIAS ADICIONALES DEPOSITADOS:");
				$this->SetTextColor(0,0,0);
				$this->SetX(60);
				$sqldiaadi="select coalesce(sum(diaart108),0) as diaadi from npimppresoc where codemp='".$tb->fields["codemp"]."' and (tipo='A' or tipo='P')";
				$tbdiaadi=$this->bd->select($sqldiaadi);
				$this->cell(5,5,$tbdiaadi->fields['diaadi'],0,0,'C');
				$this->Line(10,$this->GetY()+5,200,$this->GetY()+5);
				$this->ln(6);

				//3er renglon
				$sql2="Select *,to_char(fecfin,'dd/mm/yyyy') as fecfin, fecfin as fec2
							from npimppresoc
							where
							trim(codemp)=trim('".$tb->fields["codemp"]."') and
							diadif<=0 and salempdia>0 and (valart108>0 or adeant>0)
							order by fec2";
				$tb2=$this->bd->select($sql2);
				if (!$tb2->EOF)
				{

					$this->setFont("Arial","B",7);
					$this->SetTextColor(0,0,190);//azul
					$this->SetX(48);
					$this->cell(5,5,"AJUSTE DIAS DE PRESTACION ART. 108 L.O.T. NO DEPOSITADOS:");
					$this->SetTextColor(0,0,0);
					$this->setFont("Arial","",6);
					$this->ln(5);
					$this->SetX(10);
					$this->cell(5,5,"Ultimo");
					$this->SetX(60);
					/*$this->cell(5,5,"Alícuota de");
					$this->SetX(74);
					$this->cell(5,5,"Alícuota de");
					$this->SetX(108);
					$this->cell(5,5,"Salario");
					$this->SetX(139);*/
					$this->cell(5,5,"Días de");
					$this->SetX(162);
					$this->cell(5,5,"Total Ajuste");
					$this->ln(3);
					$this->SetX(10);
					$this->cell(5,5,"Salario Diario:");
					$this->SetX(60);
					/*$this->cell(5,5,"B/Fin de Año:");
					$this->SetX(74);
					$this->cell(5,5,"Bono Vac.:");
					$this->SetX(108);
					$this->cell(5,5,"Total:");*/
					$this->SetX(139);
					$this->cell(5,5,"Ajuste:");
					$this->SetX(162);
					$this->cell(5,5,"Antiguedad:");
					$this->ln(-2);

					$this->setFont("Arial","",7);
					$this->SetX(30);
					$this->cell(5,5,H::FormatoMonto($tb2->fields["salempdia"]),0,0,'C');
					$this->SetX(61);
					/*$this->cell(5,5,H::FormatoMonto($tb2->fields["aliuti"]),0,0,'C');
					$this->SetX(94);
					$this->cell(5,5,H::FormatoMonto($tb2->fields["alibono"]),0,0,'C');
					$this->SetX(125);
					$this->cell(5,5,H::FormatoMonto($tb2->fields["saltot"]),0,0,'C');
					$this->SetX(152);*/
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
					$this->SetX(184);
					$this->cell(5,5,H::FormatoMonto($tb2->fields["valart108"]),0,0,'C');
				}
				$this->ln();
				$this->line(10,$this->GetY()+3,200,$this->GetY()+3);
				$this->line(10,$this->GetY()+4,200,$this->GetY()+4);

				//4to renglon

				$this->setFont("Arial","B",7);
				$this->SetTextColor(0,0,190);//azul
				$this->ln(5);
				$this->SetX(10);
				$this->cell(5,5,"ANTIGUEDAD ART. 108 L.O.T:");
				$this->SetTextColor(0,0,0);
				$this->SetX(190);
				$this->cell(5,5,H::FormatoMonto($antiguedad),0,0,'R');
				$a1=$antiguedad;
				$this->ln(4);
				$this->SetTextColor(0,0,190);//azul
				$this->SetX(10);
				$this->cell(5,5,"AJUSTE ANTIGUEDAD NO DEPOSITADO:");
				$this->SetTextColor(0,0,0);
				$this->SetX(190);
				/*$sql2="Select *,to_char(fecfin,'dd/mm/yyyy') as fecfin, fecfin as fec2
							from npimppresoc
							where
							trim(codemp)=trim('".$tb->fields["codemp"]."') and
							diadif<=0 and salempdia>0 and (valart108>0 or adeant>0)
							order by fec2";*/
				$sql2="Select valart108 from npimppresoc where trim(codemp)=trim('".$tb->fields["codemp"]."')
				       and tipo='A'";
				$tb2=$this->bd->select($sql2);
				if (!$tb2->EOF)
				{
					$a2=$tb2->fields["valart108"];
					$this->cell(5,5,H::FormatoMonto($tb2->fields["valart108"]),0,0,'R');
				}
				else
				{
					$a2=0;
					$this->cell(5,5,H::FormatoMonto($tb2->fields["valart108"]),0,0,'R');
				}
				$this->ln(4);
				$this->SetTextColor(0,0,190);//azul
				$this->SetX(10);
				$this->cell(5,5,"AJUSTE DIAS ADICIONALES DE ANTIGUEDAD NO DEPOSITADO:");
				$this->SetTextColor(0,0,0);
				$this->SetX(190);
				/*$sql2="Select *,to_char(fecfin,'dd/mm/yyyy') as fecfin, fecfin as fec2
							from npimppresoc
							where
							trim(codemp)=trim('".$tb->fields["codemp"]."') and
							diadif<=0 and salempdia=0 and (valart108>0 or adeant>0)
							order by fec2";*/
				$sql2="Select valart108 from npimppresoc where trim(codemp)=trim('".$tb->fields["codemp"]."')
				       and tipo='P'";
				$tb2=$this->bd->select($sql2);
				if (!$tb2->EOF)
				{
					$a3=$tb2->fields["valart108"];
					$this->cell(5,5,H::FormatoMonto($tb2->fields["valart108"]),0,0,'R');
				}
				else
				{
					$a3=0;
					$this->cell(5,5,H::FormatoMonto(0),0,0,'R');
				}

				$this->ln(4);
				$this->SetTextColor(0,0,190);//azul
				$this->SetX(10);
				$this->cell(5,5,"ANTICIPO DE PRESTACION DE ANTIGUEDAD ART.108 L.O.T:");
				$this->SetTextColor(0,0,0);
				$this->SetX(190);
				$this->cell(5,5,H::FormatoMonto($tb->fields["adepre"]),0,0,'R');
				$a4=$tb->fields["adepre"];
				$this->ln(4);
				$a=$a1+$a2+$a3+$a4;
				$this->SetTextColor(0,0,190);//azul
				$this->SetX(10);
				$this->cell(5,5,"TOTAL ANTIGUEDAD PRESTACION DE ANTIGUEDAD:");
				$this->SetTextColor(0,0,0);
				$this->Line(170,$this->GetY(),195,$this->GetY());
				$this->SetX(190);
				$this->cell(5,5,H::FormatoMonto($a),0,0,'R');

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
			$this->ln(5);
			$this->SetTextColor(0,0,190);//azul
			$this->line(15,$this->GetY(),55,$this->GetY());
			$this->line(80,$this->GetY(),120,$this->GetY());
			$this->line(155,$this->GetY(),195,$this->GetY());
			$this->ln(3);
			$this->SetX(25);
			$this->cell(5,5,"Elaborado por");
			$this->ln(-2);
			$this->SetX(97);
			$this->cell(5,5,"",0,0,'C');
			$this->SetX(173);
			$this->cell(5,5,"Director de Recursos",0,0,'C');
			$this->ln(3);
			$this->SetX(97);
			$this->cell(5,5,"Elaborado por",0,0,'C');
			$this->SetX(173);
			$this->cell(5,5,"Humanos",0,0,'C');
			$this->ln(3);
			$this->SetX(97);
			$this->cell(5,5,"",0,0,'C');
			$this->SetX(173);
			$this->cell(5,5,"Revisado por",0,0,'C');

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