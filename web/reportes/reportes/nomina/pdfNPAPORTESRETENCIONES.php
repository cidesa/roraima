<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{


		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulo=$_POST["titulo"];
			$this->codtipapodes=$_POST["codtipapodes"];
			$this->codtipapohas=$_POST["codtipapohas"];
			$this->codempdes=$_POST["codempdes"];
			$this->codemphas=$_POST["codemphas"];
			$this->tipnom=$_POST["tipnom"];
			$this->gendis=$_POST["gendis"];
			$this->eltipo=$_POST["eltipo"];
			$this->encabezado=$_POST["encabezado"];
			$this->elab=$_POST["elab"];
			$this->rev=$_POST["rev"];
			$this->auto=$_POST["auto"];
			$this->cab1="1";
			$this->sql="SELECT DISTINCT A.CODTIPAPO as codtipapo,A.DESTIPAPO as destipapo,A.PORAPO,A.PORRET,B.CODNOM as CODNOMAPO
						FROM NPTIPAPORTES A,NPCONTIPAPORET B  WHERE
						A.CODTIPAPO=B.CODTIPAPO AND
						A.CODTIPAPO>='".$this->codtipapodes."' AND
						A.CODTIPAPO<='".$this->codtipapohas."' AND
						B.CODNOM='".$this->tipnom."'
						 ";
			//print $this->sql;exit;
			$this->tb=$this->bd->select($this->sql);

			$this->sql2="SELECT
						DISTINCT
						A.CODEMP as codemp,
						B.CEDEMP as cedemp,
						A.CODNOM,
						A.CODCAR as codcar,
						SUM(A.SALDO) as MONTO,
						to_char(coalesce(FECREI,FECING),'dd/mm/yyyy') as  FECING,
						B.NOMEMP as nomemp,
						B.NACEMP,
						to_char(B.FECNAC,'dd/mm/yyyy') as fecnac,
						B.SEXEMP as sexemp,
						B.CODNIV,
						C.CODCAT
						 FROM
						   NPNOMCAL  A,NPHOJINT B,NPASICAREMP C
						 WHERE
						C.CODNOM = A.CODNOM AND
						C.CODCAR = A.CODCAR AND
						C.CODEMP = A.CODEMP AND
						B.CODEMP = A.CODEMP
						AND  A.CODNOM = '".$this->tipnom."'
						AND  B.CODEMP >=  RPAD('".$this->codempdes."',16,' ')
						AND  B.CODEMP <= RPAD('".$this->codemphas."',16,' ')
						GROUP BY A.CODEMP,B.CEDEMP,A.CODNOM,A.CODCAR,B.NOMEMP,B.NACEMP,B.CODNIV,C.CODCAT,
						B.FECNAC,B.SEXEMP,coalesce(FECREI,FECING)
						ORDER BY CODNOM,A.CODEMP ";

			//print $this->sql2;exit;
			//exit;

			$this->llenartitulosmaestro();
			$this->cab=new cabecera();

		}
		function CFnomnom($tipnom)
		{

			$tb0=$this->bd->select("SELECT DISTINCT(NOMNOM) as nombre
									FROM NPNOMINA WHERE CODNOM = '".$tipnom."' ");
			return $tb0->fields["nombre"];
		}
	    function CFfecha($tipnom,$num)
		{
			if ($num=1)
			{
				$tb0=$this->bd->select("SELECT to_char(ULTFEC,'dd/mm/yyyy') as VALOR FROM NPNOMINA WHERE CODNOM='".$tipnom."'");
				return $tb0->fields["valor"];
			}else
			{
				$tb0=$this->bd->select("SELECT to_char(profec,'dd/mm/yyyy') as VALOR FROM NPNOMINA WHERE CODNOM='".$tipnom."'");
				return $tb0->fields["valor"];
			}
		}
        //IMPRIME UNA CELDA POSICIONADA
		function celda($x,$y,$mensaje,$l=0,$r=0,$p='L')
		{
			if ($y==''){
				$this->setX($x);
				$this->cell(20,3,$mensaje,$l,$r,$p);
			}else
			{
				$this->setXY($x,$y);
				$this->cell(20,0,$mensaje,$l,$r,$p);
			}
		}

		function llenartitulosmaestro()
		{
		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s",$parte[$ubica]);
			$this->setFont("Arial","B",9);

			    $this->celda(15,43,'Direcci�n de Recursos Humanos');
				$this->setXY(15,53);

				$this->Multicell(190,4,$this->tb->fields["destipapo"],0,'C',0);
				$this->ln(10);
				$tipo = $this->CFnomnom($this->tipnom);

				$this->setX(20);
				$this->cell(70,0,'Nomina:   '.$this->tipnom.'  -  '.$tipo);
				$this->ln(6);
				$fechades = $this->CFfecha($this->tipnom,1);
				$fechahas = $this->CFfecha($this->tipnom,2);
				$this->setX(20);
				$this->cell(50,0,'Fecha desde:   '.$fechades.'   hasta:  '.$fechahas);

				if ($this->cab1=='1')
				{
					if ($this->encabezado=='TIPO1' )
					{
						//CUADRO DE EMPLEADOS
							$this->rect(20,80,180,180);
							//LINEAS HORIZONTAL
							$this->line(20,93,200,93);
							//LINEAS VERTICALES QUE COMPLEMENTAN EL CUADRO
							$this->line(40,80,40,260);
							$this->line(90,80,90,260);
							$this->line(113,80,113,260);
							$this->line(130,80,130,260);
							$this->line(152,80,152,260);
							$this->line(176,80,176,260);
							//////////////////////////////////////
							//ENCABEZADOS DEL CUADRO TIPO 1
							/* ESTA FUNCION CELDA SE ENCUENTRA DEFINIDA ARRIBA */
								$this->celda(23,85,'Cedula');
								$this->celda(55,85,'Empleado');
								$this->celda(95,85,'Sueldo');
								$this->celda(116,85,'Fecha');
								$this->celda(115,89,'Ingreso');
								$this->celda(133,85,'Retencion');
								$this->celda(156,85,'Aportes');
								$this->celda(183,85,'Total');
							/////////////////////////////7
							$this->setY(95);

					}else
					{
						//CUADRO DE EMPLEADOS
							$this->rect(20,80,180,180);
							//LINEAS HORIZONTAL
							$this->line(20,93,200,93);
							//LINEAS VERTICALES QUE COMPLEMENTAN EL CUADRO
							$this->line(40,80,40,260);
							$this->line(80,80,80,260);
							$this->line(86,80,86,260);
							$this->line(100,80,100,260);
							$this->line(122,80,122,260);
							$this->line(137,80,137,260);
							$this->line(158,80,158,260);
							$this->line(179,80,179,260);
							//////////////////////////////
							//ENCABEZADO DEL CUADRO TIPO 2
							/* ESTA FUNCION CELDA SE ENCUENTRA DEFINIDA ARRIBA */
								$this->celda(23,85,'Cedula');
								$this->celda(50,85,'Empleado');
								$this->celda(81,82,'S');
								$this->celda(81,85,'E');
								$this->celda(81,88,'X');
								$this->celda(81,91,'O');
								$this->celda(86,85,'FECHA');
								$this->celda(88,90,'NAC.');
								$this->celda(105,85,'Sueldo');
								$this->celda(124,85,'Fecha');
								$this->celda(123,89,'Ingreso');
								$this->celda(138,85,'Retencion');
								$this->celda(161,85,'Aportes');
								$this->celda(185,85,'Total');
							///////////////////////////////////////7
							$this->setY(95);

					}

				}



		}
		function Cuerpo()
		{



			while (!$this->tb->EOF)
			{

				$tb2=$this->bd->select($this->sql2);
				$cs_total = 0;
				$num_emp = 0;
				$cs_ret = 0;
				$cs_apo = 0;
				if ($this->encabezado=='TIPO1')
				{
					//DETALLE DEL TIPO DE APORTE Y RETENCION
						$this->setFont("Arial","B",7);
						while (!$tb2->EOF)
						{
							$num_emp++;
							$this->celda(23,'',$tb2->fields["cedemp"]);
							$this->celda(40,'','');
							//$this->celda(81,'',$tb2->fields["sexemp"]);
							//$this->celda(85.8,'',$tb2->fields["fecnac"]);
							$this->sql3="SELECT coalesce(SUM(MONTO)) as VALOR FROM NPASICONEMP A,NPCONSUELDO B
										WHERE (CODEMP) = RPAD('".$tb2->fields["codemp"]."',16,' ') AND
										(CODCAR) =RPAD('".$tb2->fields["codcar"]."',16,' ')
										AND A.CODCON=B.CODCON AND B.CODNOM='".$this->tipnom."'";
							$tb3= $this->bd->select($this->sql3);
							$this->celda(93,'',number_format($tb3->fields["valor"],2,',','.'),0,0,'R');
							$this->celda(114	,'',$tb2->fields["fecing"]);
							$this->sql4=("SELECT SUM(SALDO) as ELMONTO FROM NPNOMCAL A, NPHOJINT B, NPCONTIPAPORET C
										 WHERE
										 C.CODTIPAPO='".$this->tb->fields["codtipapo"]."' AND
										 A.CODNOM=C.CODNOM AND
										 A.CODCON=C.CODCON AND
										 C.TIPO='R' AND
										 B.CODEMP=A.CODEMP AND
										 B.CODEMP='".$tb2->fields["codemp"]);
							$tb4 = $this->bd->select($this->sql4);
							$this->celda(132,'',number_format($tb4->fields["elmonto"],2,',','.'),0,0,'R');
							$cs_ret = $cs_ret +  $tb4->fields["elmonto"];
							$this->sql5="SELECT SUM(SALDO) as ELMONTO FROM NPNOMCAL A, NPHOJINT B, NPCONTIPAPORET C
										 WHERE
										 C.CODTIPAPO='".$this->tb->fields["codtipapo"]."' AND
										 A.CODNOM=C.CODNOM AND
										 A.CODCON=C.CODCON AND
										 C.TIPO='A' AND
										 B.CODEMP=A.CODEMP AND
										 B.CODEMP='".$tb2->fields["codemp"]."' ";
							$tb5= $this->bd->select($this->sql5);
							$this->celda(156,'',number_format($tb5->fields["elmonto"],2,',','.'),0,0,'R');
							$cs_apo = $cs_apo +  $tb5->fields["elmonto"];

							$CF_total = $tb4->fields["elmonto"] + $tb5->fields["elmonto"];
							$cs_total = $cs_total  + $CF_total;
							$this->celda(180,'',number_format($CF_total,2,',','.'),0,0,'R');

							$this->setX(40);
							$this->multicell(40,3,$tb2->fields["nomemp"]);
							$this->ln(2);
						    $tb2->MoveNext();
						    if ($tb2->EOF)
						    {
						    	 $this->cab1="0";
						    	 $this->AddPage();
						    	 $this->cab1="1";
						    	 $this->rect(50,95,100,40);
						    	 $this->setFont("Arial","B",12);
						    	 $this->celda(100,85,'RESUMEN');
						    	 $this->setFont("Arial","B",9);
						    	 $this->celda(85,100,'Trabajadores:                   '.$num_emp);
						    	 $this->celda(85,110,'Monto Total:                     '.number_format($cs_total,2,',','.'));
						    	 $this->celda(85,120,'Retenciones:                    '.number_format($cs_ret,2,',','.'));
						    	 $this->celda(85,130,'Aportes:                           '.number_format($cs_apo,2,',','.'));
						    	 $this->setFont("Arial","B",14);
						    	 $this->celda(57,115,'TOTAL');


						    }
						}

						$this->setFont("Arial","B",9);




				}else
				{

					//DETALLE DEL TIPO DE APORTE Y RENTENCION
						$this->setFont("Arial","B",7);
						while (!$tb2->EOF)
						{
							$num_emp++;
							$this->celda(23,'',$tb2->fields["cedemp"]);
							$this->celda(40,'','');
							$this->celda(81,'',$tb2->fields["sexemp"]);
							$this->celda(85.8,'',$tb2->fields["fecnac"]);
							$this->sql3="SELECT coalesce(SUM(MONTO)) as VALOR FROM NPASICONEMP A,NPCONSUELDO B
										WHERE (CODEMP) = RPAD('".$tb2->fields["codemp"]."',16,' ') AND
										(CODCAR) =RPAD('".$tb2->fields["codcar"]."',16,' ')
										AND A.CODCON=B.CODCON AND B.CODNOM='".$this->tipnom."'";
							$tb3= $this->bd->select($this->sql3);
							$this->celda(102,'',number_format($tb3->fields["valor"],2,',','.'),0,0,'R');
							$this->celda(122,'',$tb2->fields["fecing"]);
							$this->sql4=("SELECT SUM(SALDO) as ELMONTO FROM NPNOMCAL A, NPHOJINT B, NPCONTIPAPORET C
										 WHERE
										 C.CODTIPAPO='".$this->tb->fields["codtipapo"]."' AND
										 A.CODNOM=C.CODNOM AND
										 A.CODCON=C.CODCON AND
										 C.TIPO='R' AND
										 B.CODEMP=A.CODEMP AND
										 B.CODEMP='".$tb2->fields["codemp"]."'
										");
							$tb4 = $this->bd->select($this->sql4);
							$this->celda(138,'',number_format($tb4->fields["elmonto"],2,',','.'),0,0,'R');
							$cs_ret = $cs_ret +  $tb4->fields["elmonto"];
							$this->sql5="SELECT SUM(SALDO) as ELMONTO FROM NPNOMCAL A, NPHOJINT B, NPCONTIPAPORET C
										 WHERE
										 C.CODTIPAPO='".$this->tb->fields["codtipapo"]."' AND
										 A.CODNOM=C.CODNOM AND
										 A.CODCON=C.CODCON AND
										 C.TIPO='A' AND
										 B.CODEMP=A.CODEMP AND
										 B.CODEMP='".$tb2->fields["codemp"]."' ";//print $this->sql5;exit;
							$tb5= $this->bd->select($this->sql5);
							$this->celda(159,'',number_format($tb5->fields["elmonto"],2,',','.'),0,0,'R');
							$cs_apo = $cs_apo +  $tb5->fields["elmonto"];

							$CF_total = $tb4->fields["elmonto"] + $tb5->fields["elmonto"];
							$cs_total = $cs_total  + $CF_total;
							$this->celda(180,'',number_format($CF_total,2,',','.'),0,0,'R');

							$this->setX(40);
							$this->multicell(40,3,$tb2->fields["nomemp"]);
							$this->ln(2);
						    $tb2->MoveNext();
						    if ($tb2->EOF)
						    {
						    	 $this->cab1="0";
						    	 $this->AddPage();
						    	 $this->cab1="1";
						    	 $this->rect(50,95,100,40);
						    	 $this->setFont("Arial","B",12);
						    	 $this->celda(100,85,'RESUMEN');
						    	 $this->setFont("Arial","B",9);
						    	 $this->celda(85,100,'Trabajadores:                   '.$num_emp);
						    	 $this->celda(85,110,'Monto Total:                     '.number_format($cs_total,2,',','.'));
						    	 $this->celda(85,120,'Retenciones:                    '.number_format($cs_ret,2,',','.'));
						    	 $this->celda(85,130,'Aportes:                           '.number_format($cs_apo,2,',','.'));
						    	 $this->setFont("Arial","B",14);
						    	 $this->celda(57,115,'TOTAL');


						    }
						}

						$this->setFont("Arial","B",9);

				}



			$this->tb->MoveNext();
			if (!$this->tb->EOF)
			{$this->AddPage();}
			}

		}//cuerpo
	}//clase
?>
