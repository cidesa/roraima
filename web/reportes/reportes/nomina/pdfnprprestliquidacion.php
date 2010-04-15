<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/funciones.php");

	class pdfreporte extends fpdf
	{

		var $bd;
		var $sql;
		var $sqlVac;
		var $sqlAsi;
		var $sqlDed;
		var $rep;
		var $numero;
		var $cab;
		var $cedula;
		var $elapor;
		var $jefrellab;
		var $dirrechum;
		var $diradmini;
		var $dirconint;
		var $gobsecgen;
		var $tipegr;
		var $observ;


		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","Legal");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();

			$this->cedula1=$_POST["cedula1"];
			$this->cedula2=$_POST["cedula2"];
			$this->elapor=$_POST["elapor"];
			$this->revisado=$_POST["revisado"];
            //print $this->revisado; exit;
			/*$this->dirrechum=$_POST["dirrechum"];
			$this->diradmini=trim($_POST["diradmini"]);
			$this->dirconint=trim($_POST["dirconint"]);
			$this->gobsecgen=trim($_POST["gobsecgen"]);*/
			$this->tipegr=trim($_POST["tipegr"]);
			$this->observ=trim($_POST["observ"]);


			$this->sql = "select
						distinct a.codemp as cedula,b.nomemp as nombre,b.cedemp,
						to_char(g.fechaingreso,'dd/mm/yyyy') as fecing, to_number(b.codemp,'99999999')   as ci,
						to_char(b.fecret,'dd/mm/yyyy') as fecret,d.nomcar, to_char(i.fechacorte,'dd/mm/yyyy') as fechacorte,
						e.desniv as ubicacion,f.nomemp as empresa,g.anoefectivo as ano,
						g.mesefectivo as mes,g.diasefectivo as dia,g.anticipos,h.suecar, d.codnom
						from
						npliquidacion_det a,nphojint b,npasicaremp d,npestorg e,empresa f,npliquidacion g,npcargos h, npliquidacion i
						where
						a.codemp=b.codemp and a.codemp=d.codemp and a.codemp = i.cedula and e.codniv=b.codniv and d.codcar=h.codcar
						and f.codemp='001' and a.codemp=g.cedula and a.codemp>='".$this->cedula1."'
						and a.codemp<='".$this->cedula2."'";


			/*$this->sql="SELECT to_number(CEDULA,99999999)   as ci,

						CEDULA,
						NOMBRE,
						to_char(FECHAINGRESO,'dd/mm/yyyy') as fechaingreso,
						to_char(FECHACORTE,'dd/mm/yyyy') as fechacorte,
						to_char(FECHAEGRESO,'dd/mm/yyyy') as fechaegreso,
						ANOACTUAL,
						MESACTUAL,
						DIASACTUAL,
						ANOANTERIOR,
						MESANTERIOR,
						DIASANTERIOR,
						ANOEFECTIVO,
						MESEFECTIVO,
						DIASEFECTIVO,
						MONTO666A,
						MONTO666B,
						MONTO108,
						INT666A,
						INT108,
						INT668,
						ANTICIPOS
						FROM NPLIQUIDACION WHERE CEDULA >= '".$this->cedula1."' and CEDULA <= '".$this->cedula2."' ";*/

//H::PrintR($this->sql);exit;



							/*AND codemp= '".$this->cedula."'
							ORDER BY NUMREG";*/

		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s","s");
			$this->setFont("Arial","B",8);
		}

		function Cuerpo()
		{
		    $tb=$this->bd->select($this->sql);



			foreach ($tb as $dato)
			{
				//*****************************************Buscar Cargo*************************************************
				$cargo="";
				$sqlCar="SELECT distinct RTRIM(CODCAR)||'   '||NOMCAR as cargo,codcar  FROM NPASICAREMP
				WHERE codemp= '".$dato["cedula"]."'";
				//H::PrintR($sqlCar);exit;
				$tbCar=$this->bd->select($sqlCar);
				if (!$tbCar->EOF)
				{
					$cargo=$tbCar->fields["cargo"];
				}
				else
				{
					$sqlFec="SELECT MAX(FECNOM) as ultfec FROM NPHISCON
							WHERE codemp= '".$dato["cedula"]."'";
					$tbFec=$this->bd->select($sqlFec);
					if (!$tbFec->EOF)
					{
						$ultfec=$tbFec->fields["ultfec"];
						$sqlCar1="SELECT DISTINCT(RTRIM(A.CODCAR))||'  '||B.NOMCAR AS cargo
								FROM NPHISCON A, NPCARGOS B
								WHERE trim(A.CODEMP) = trim('".$dato["cedula"]."') AND
								A.FECNOM = to_date('".$ultfec."','yyyy-mm-dd') AND
								A.CODCAR=B.CODCAR AND
								A.CODCON NOT IN (SELECT CODCON FROM NPCONCEPTOSCATEGORIA)";
						$tbCar1=$this->bd->select($sqlCar1);
						if (!$tbCar1->EOF)
						{
							$cargo=$tbCar1->fields["cargo"];
						}
					}
				}
				//******************************************************************************************************
				//*****************************************Buscar Ubicaci�n*************************************************
				$ubicacion="";
				$sqlUbi="SELECT max(RTRIM(CODCAT)||'   '||NOMCAT) as categoria
						 FROM NPASICAREMP WHERE codemp= '".$dato["cedula"]."'";
				$tbUbi=$this->bd->select($sqlUbi);
				if (!$tbUbi->EOF)
				{
					$ubicacion=$tbUbi->fields["categoria"];
				}
				else
				{
					$sqlFec="SELECT MAX(FECNOM) as ultfec FROM NPHISCON
							WHERE codemp= '".$dato["cedula"]."'";
					$tbFec=$this->bd->select($sqlFec);
					if (!$tbFec->EOF)
					{
						$ultfec=$tbFec->fields["ultfec"];
						$sqlUbi1="SELECT DISTINCT max((RTRIM(A.CODCAT))||'   '||B.NOMCAT) AS categoria
								FROM NPHISCON A, NPCATPRE B
								WHERE trim(A.CODEMP) = trim('".$dato["cedula"]."') AND
								A.FECNOM = to_date('".$ultfec."','yyyy-mm-dd') AND
								A.CODCAT=B.CODCAT AND
								A.CODCON NOT IN (SELECT CODCON FROM NPCONCEPTOSCATEGORIA)";
						$tbUbi1=$this->bd->select($sqlUbi1);
						if (!$tbUbi1->EOF)
						{
							$ubicacion=$tbUbi1->fields["cacategoriargo"];
						}
					}
				}
				//******************************************************************************************************
				//*****************************************Buscar Salario al 31/12/1996 ********************************

				$salario1996=0;
				$sqlSal="Select coalesce(SUM(MonAsi),0) as valor from NPSALINT
						 where trim(CodEmp)=trim('".$dato["cedula"]."') and FECFINCON=  order by FECFINCON Desc";

				$tbSal=$this->bd->select($sqlSal);
				if (!$tbSal->EOF)
				{
					$salario1996=$tbSal->fields["valor"];
				}
				//******************************************************************************************************
				//*****************************************Buscar Salario al 30/06/1997 ********************************

				$salario1997=0;
				$sqlSal="Select coalesce(SUM(MonAsi),0) as valor from NPSALINT
						 where trim(CodEmp)=trim('".$dato["cedula"]."') and FECFINCON=to_date('30/06/1997','dd/mm/yyyy')";
				$tbSal97=$this->bd->select($sqlSal);
				if (!$tbSal97->EOF)
				{
					$salario1997=$tbSal97->fields["valor"];
				}
				//******************************************************************************************************
				//*****************************************Buscar Salario Actual ********************************

				$rssalact =$this->bd->select("Select coalesce(SUM(a.monto),0) as campo from nphiscon A,
												NPCONSALINT B where A.CODCON=B.CODCON AND a.CODNOM=B.CODNOM AND 
												a.codnom='".$dato['codnom']."' and a.codemp='".$dato['cedula']."' and 
												a.codcar='".$tbCar->fields["codcar"]."'and 
												to_char(fecnom,'mm/yyyy')=to_char((select max(fecnom) from nphiscon where codnom=a.codnom and codemp=a.codemp and codcar=a.codcar),'mm/yyyy')");
				$salarioAct=$rssalact->fields["campo"];
				/*$sqlSal="Select coalesce(SUM(MonAsi),0) as valor from NPSALINT
						 where trim(CodEmp)=trim('".$dato["cedula"]."')
						 and FECFINCON = (SELECT MAX(FECFINCON) FROM NPSALINT where trim(CodEmp)=trim('".$dato["cedula"]."')
						 and FECINICON<=to_date('".$dato["fechaegreso"]."','dd/mm/yyyy'))";

				$tbSalAct=$this->bd->select($sqlSal);
				if (!$tbSalAct->EOF)
				{
					$salarioAct=$tbSalAct->fields["valor"];
				}*/

				//******************************************************************************************************
				//*****************************************Buscar TOTAL Monto Asignaci�n ********************************
				$sumMonAsi=0;
				$sqlSal="SELECT coalesce(SUM(MONTO),0) as montoasi
						FROM NPLIQUIDACION_DET
						WHERE ASIDED='A' and
						codemp= '".$dato["cedula"]."'";
				$tbMonAsi=$this->bd->select($sqlSal);
				if (!$tbMonAsi->EOF)
				{
					$sumMonAsi=$tbMonAsi->fields["montoasi"];
				}
				 //******************************************************************************************************

				//*****************************************Buscar TOTAL Monto Deduccion ********************************
				$sumMonDed=0;
				$sqlSal="SELECT coalesce(SUM(MONTO),0) as montoded
						FROM NPLIQUIDACION_DET
						WHERE ASIDED='D' and
						codemp= '".$dato["cedula"]."'";
				$tbMonDed=$this->bd->select($sqlSal);
				if (!$tbMonDed->EOF)
				{
					$sumMonDed=$tbMonDed->fields["montoded"];
				}
				 //******************************************************************************************************
				 //*****************************************Buscar TOTAL Monto Vacaciones ********************************
				$sumMonVac=0;
				$sqlSal="SELECT coalesce(SUM(MONTO),0) as montovac
						FROM NPVACLIQUIDACION
						where codemp= '".$dato["cedula"]."'";

				$tbMonVac=$this->bd->select($sqlSal);
				if (!$tbMonVac->EOF)
				{
					$sumMonVac=$tbMonVac->fields["montovac"];
				}
				 //******************************************************************************************************

				//*****************************************TOTAL LIQUIDACION ********************************

				$TotalLiq=$sumMonAsi- $sumMonDed;
			    //******************************************************************************************************
				$this->setFont("Arial","B",8);
				$this->SetX(10);
				$this->SetTextColor(0,0,128);
				$this->cell(17,5,"1) Nombre:");
				$this->SetTextColor(0,0,0);
				$this->cell(66,5,strtoupper($dato["nombre"]));
				$this->SetTextColor(0,0,128);
				$this->cell(7,5,"C.I.:");
				$this->SetTextColor(0,0,0);
				$this->cell(20,5,H::FormatoMonto($dato["ci"],0,',','.'));
				$this->SetTextColor(0,0,128);
				$this->cell(11,5,"Cargo:");
				$this->SetTextColor(0,0,0);
				$this->multicell(60,3,$cargo);
				#$this->ln(5);
				$this->SetTextColor(0,0,128);
				$this->cell(15,5,"Tipo:");
				$this->SetTextColor(0,0,0);
				$this->cell(53,5,$this->tipegr);
				$this->SetTextColor(0,0,128);
				$this->cell(18,5,"Ubicación:");
				$this->SetTextColor(0,0,0);
				$this->cell(25,5,$ubicacion);
				$this->ln(5);
				$this->SetTextColor(0,0,128);
				//*$this->cell(32,5,"Salario al 31-12-1996:");
				$this->SetTextColor(0,0,0);
				//$this->cell(36,5,H::FormatoMonto($salario1996));
				$this->SetTextColor(0,0,128);
				//*$this->cell(32,5,"Salario al 18-06-1997:");
				$this->SetTextColor(0,0,0);
				//$this->cell(38,5,H::FormatoMonto($salario1997));
				$this->SetTextColor(0,0,128);
				$this->cell(27,5,"Salario Actual Bs.:");
				$this->SetTextColor(0,0,0);
				$this->cell(20,5, H::FormatoMonto($salarioAct));
				$this->ln(5);
				$this->SetTextColor(0,0,128);
				$this->cell(32,5,"Fecha de Ingreso:");
				$this->SetTextColor(0,0,0);
				$this->cell(36,5,$dato["fecing"]);
				$this->SetTextColor(0,0,128);
				$this->cell(32,5,"Fecha de Corte:");
				$this->SetTextColor(0,0,0);
				$this->cell(38,5,$dato["fechacorte"]);
				$this->SetTextColor(0,0,128);
				$this->cell(27,5,"Fecha de Egreso:");
 				$this->SetTextColor(0,0,0);
				$this->cell(20,5, $dato["fecret"]);
				$this->ln(6);
				$this->SetFillColor(255,255,255);
				$this->SetTextColor(0,0,128);
				$this->cell(60,5,"Tiempo Efectivo de Trabajo:",0,0,'C',1);
				$this->cell(7,5,"");
				//$this->cell(59,5,"Tiempo Nuevo Regimen:",0,0,'C',1);
				$this->cell(7,5,"");
				//$this->cell(59,5,"Tiempo Regimen Anterior:",0,0,'C',1);
				$this->ln(5);
				$this->SetTextColor(0,0,0);
				$this->cell(5,5,"  ");
				$this->cell(9,5,"Años:   ");
				$this->cell(8,5,$dato["ano"]);
				$this->cell(11,5,"Meses:   ");
				$this->cell(8,5,$dato["mes"]);
				$this->cell(8,5,"Días:   ");
				$this->cell(8,5,$dato["dia"]);
				$this->Rect(10 ,$this->getY()- 6,59,6);
				$this->Rect(10,$this->getY(),59,6);
				$this->cell(12,5,"  ");
				/*$this->cell(9,5,"Años:   ");
				$this->cell(8,5,$tb->fields["anoactual"]);
				$this->cell(11,5,"Meses:   ");
				$this->cell(8,5,$tb->fields["mesactual"]);
				$this->cell(8,5,"Días:   ");
				$this->cell(8,5,$tb->fields["diasactual"]);
				$this->Rect(75 ,$this->getY()- 6,59,6);
				$this->Rect(75,$this->getY(),59,6);
				$this->cell(15,5,"  ");
				$this->cell(9,5,"Años:   ");
				$this->cell(8,5,$tb->fields["anoanterior"]);
				$this->cell(11,5,"Meses:   ");
				$this->cell(8,5,$tb->fields["mesanterior"]);
				$this->cell(8,5,"Días:   ");
				$this->cell(8,5,$tb->fields["diasanterior"]);
				$this->Rect(141 ,$this->getY()- 6,59,6);
				$this->Rect(141,$this->getY(),59,6);

				//$this->cell(9,5,"Años:   ");
				//$this->cell(8,5,$tb->fields["anoanterior"]);
				//$this->cell(11,5,"Meses:   ");
				//$this->cell(8,5,$tb->fields["mesanterior"]);
				//$this->cell(8,5,"Días:   ");
				//$this->cell(8,5,$tb->fields["diasanterior"]);
				//$this->Rect(141 ,$this->getY()- 6,59,6);
				//$this->Rect(141,$this->getY(),59,6);*/

				$this->ln(8);
				$this->SetTextColor(0,0,128);
				$this->setFont("Arial","B",11);
				$this->cell(180,5,"Por Bs.:  ".H::FormatoMonto($TotalLiq),0,0,'C',1);
				$this->setFont("Arial","B",8);
				$this->ln(6);
				$this->cell(60,5,"2) He recibido de la Contraloria la cantidad de:");
				$this->SetTextColor(0,0,0);
				$this->ln(5);
				$this->Rect(10 ,$this->getY(),190,6);
				$this->Rect(10,$this->getY()+6,190,6);
				$this->ln(1);
				$this->SetX(11);
				$this->cell(188,4,H::FormatoMonto($TotalLiq)."  Bs.",0,0,'C',1);
				$this->ln(6);
				$this->SetX(11);
				$this->cell(188,4,montoescrito($TotalLiq,$this->bd),0,0,'C',1);
				$this->ln(6);
				$this->SetTextColor(0,0,128);
				$this->cell(190,5,"Que me corresponden por concepto de prestacion de antiguedad y otros pasivos, de acuerdo al ordenamiento Jurídico Laboral Vigente, según la");
				$this->ln(4);
				$this->cell(190,5,"discriminación siguiente:");
				$this->ln(6);
				$this->SetTextColor(0,0,0);

				$this->sqlAsi="	SELECT
							CODEMP as CODEEMPASI,
							CONCEPTO as CONCEPTOASI,
							MONTO as MONTOASI
							FROM NPLIQUIDACION_DET
							WHERE ASIDED='A'
							AND codemp= '".$dato["cedula"]."'
							ORDER BY NUMREG";

				$tbAsi=$this->bd->select($this->sqlAsi);
				while(!$tbAsi->EOF)
					{
						$this->Rect(15 ,$this->getY()-1,182,5);
						$this->cell(12,4,"");
						$this->cell(138,4,$tbAsi->fields["conceptoasi"]);
						$this->cell(30,4,H::FormatoMonto($tbAsi->fields["montoasi"]),0,0,'R',0);
						$this->ln(5);
						$tbAsi->MoveNext();
					} //while((!$tbAsi->EOF))  */
					$this->ln(1);
					$this->line(160,$this->getY(),195,$this->getY());
					$this->ln(2);
					$this->cell(120,5,"");
					$this->SetTextColor(0,0,128);
					$this->cell(30,4,"Subtotal  Bs.");
					$this->SetTextColor(0,0,0);
					$this->cell(30,4,H::FormatoMonto($sumMonAsi),0,0,'R',1);

					$this->sqlDed="	SELECT
							CODEMP as CODEEMPDED,
							CONCEPTO as CONCEPTODED,
							MONTO as MONTODED
							FROM NPLIQUIDACION_DET
							WHERE codemp= '".$dato["cedula"]."' and ASIDED='D'
							ORDER BY NUMREG";
                   //H::PrintR($this->sqlDed);exit;
					$tbDed=$this->bd->select($this->sqlDed);
					$this->SetTextColor(0,0,128);
					$this->ln(4);
					$this->cell(60,5,"3) DEDUCCIONES:");
					$this->ln(6);
					$this->SetTextColor(0,0,0);


					while(!$tbDed->EOF)
					{
					$this->Rect(15 ,$this->getY()-1,182,5);
						$this->cell(12,4,"");
						$this->cell(138,4,$tbDed->fields["conceptoded"]);
						$this->cell(30,4,H::FormatoMonto($tbDed->fields["montoded"]),0,0,'R',0);
						$this->ln(5);
						$tbDed->MoveNext();
					} //while((!$tbDed->EOF))
					$this->ln(1);
					$this->line(160,$this->getY(),195,$this->getY());
					$this->ln(2);
					$this->cell(120,5,"");
					$this->SetTextColor(0,0,128);
					$this->cell(30,4,"Subtotal  Bs.");
					$this->SetTextColor(0,0,0);
					$this->cell(30,4,H::FormatoMonto($sumMonDed),0,0,'R',1);
					///     TOTAL A PAGAR




					$this->ln(5);
					$this->line(160,$this->getY(),195,$this->getY());
					$this->line(160,$this->getY()+0.2,195,$this->getY()+0.2);
					$this->ln(2);


					$this->sqlVac="	SELECT
							CODEMP as CODEMPVAC,
							PERINI,
							PERFIN,
							DIADIS + DIASBONO as DIASCANCELAR,
							MONTO
							FROM NPVACLIQUIDACION
							WHERE codemp= '".$dato["cedula"]."'";


					$tbVac=$this->bd->select($this->sqlVac);

					$this->SetTextColor(0,0,128);
					if (!$tbVac->EOF){$texto="RELACION DE VACACIONES PENDIENTES";} else {$texto="";}
					$this->cell(120,5,$texto);
					$this->cell(30,4,"TOTAL A PAGAR Bs.");
					$this->SetTextColor(0,0,0);
					$this->cell(30,4,H::FormatoMonto($TotalLiq),0,0,'R',1);
					//VACACIONES
					$vac="N";
					if (!$tbVac->EOF)
					{
					    $this->ln(7);
						$vac="S";
					    $this->setFont("Arial","B",7);
						$this->Rect(11 ,$this->getY()-1,21,5);
						$this->cell(21,4,"   Periodo Desde");
					    $this->Rect(32 ,$this->getY()-1,21,5);
						$this->cell(21,4,"   Periodo Hasta");



						$this->Rect(53 ,$this->getY()-1,21,5);
						$this->cell(21,4,"  Días a Cancelar");
						$this->Rect(74 ,$this->getY()-1,21,5);

						$this->cell(21,4,"          Monto");
						$this->ln(5);
						$this->setFont("Arial","",7);
					}//if (!$tbVac->EOF)
					while(!$tbVac->EOF)
					{
						$this->Rect(11 ,$this->getY()-1,21,5.2);
						$this->cell(21,4,$tbVac->fields["perini"],0,0,'C',0);
					    $this->Rect(32 ,$this->getY()-1,21,5.2);
						$this->cell(21,4,$tbVac->fields["perfin"],0,0,'C',0);
						$this->Rect(53 ,$this->getY()-1,21,5.2);
						$this->cell(21,4,H::FormatoMonto($tbVac->fields["diascancelar"]),0,0,'C',0);
						$this->Rect(74 ,$this->getY()-1,21,5.2);
						$this->cell(21,4,H::FormatoMonto($tbVac->fields["monto"]),0,0,'R',0);
						$this->ln(5);
						$tbVac->MoveNext();

					} //while((!$tbVac->EOF))
					$this->setFont("Arial","B",7);
					if ($vac=="S") //totalizar monto vacaciones
					{
					 $this->SetX(30);
					 $this->SetTextColor(0,0,128);
					 $this->cell(43,4,"Total Monto Vacaciones Vencidas: ");
					 $this->SetTextColor(0,0,0);
					 $this->cell(21,4,H::FormatoMonto($sumMonVac),0,0,'R',0);
					}
					$this->ln(7);
					$this->setFont("Arial","B",8);
					$this->SetTextColor(0,0,128);
					$this->cell(50,5,"OBSERVACIONES:");
					$this->ln(5);
					$this->SetTextColor(0,0,0);
					$this->cell(200,5,$this->observ);


					/*if ($this->getY() > 200 )
					{
				  		$this->AddPage();
					}*/



					$this->SetTextColor(0,0,128);
					$this->ln(20);
					$this->line(23,$this->getY()-0.5,62,$this->getY()-0.5);
					$this->SetX(15);
					$this->cell(56,4,$this->elapor,0,0,'C',0);
					$this->line(86,$this->getY()-0.5,126,$this->getY()-0.5);
					$this->cell(70,4,$this->jefrellab,0,0,'C',0);
					$this->line(150,$this->getY()-0.5,190,$this->getY()-0.5);
					$this->cell(60,4,$this->dirrechum,0,0,'C',0);
					$this->ln(3);
					$this->SetX(15);
					$this->cell(56,4,"Elaborado por",0,0,'C',0);
					$this->cell(70,4,"Revisado por",0,0,'C',0);
					$this->cell(60,4,"Dirección de",0,0,'C',0);
					$this->ln(3);
					$this->SetX(15);
					$this->cell(56,4,"",0,0,'C',0);
					$this->cell(70,4,"",0,0,'C',0);
					$this->cell(60,4," Recursos Humanos",0,0,'C',0);
					////////////////
					$this->ln(15);
					$this->line(23,$this->getY()-0.5,62,$this->getY()-0.5);
					$this->SetX(15);
					$this->cell(56,4,$this->diradmini,0,0,'C',0);
					$this->line(86,$this->getY()-0.5,126,$this->getY()-0.5);
					$this->cell(70,4,$this->dirconint,0,0,'C',0);
					$this->line(150,$this->getY()-0.5,190,$this->getY()-0.5);
					$this->cell(60,4,$this->gobsecgen,0,0,'C',0);
					$this->ln(3);
					$this->SetX(15);
					$this->cell(56,4,"Dirección de ",0,0,'C',0);
					$this->cell(70,4,"Dirección de",0,0,'C',0);
					$this->cell(60,4,"Contralor(a)",0,0,'C',0);
					$this->ln(3);
					$this->SetX(15);
					$this->cell(56,4,"Planificación y Presupuesto",0,0,'C',0);
					$this->cell(70,4,"Administración",0,0,'C',0);
					//*$this->cell(60,4,"Secretario General del Gobierno",0,0,'C',0);

					if (!$tb->EOF)
					{
				  		$this->AddPage();
					}


			}	//if (!$tb->EOF)
		}// end cuerpo
	}//class
?>