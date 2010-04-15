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
		//	$this->codtipapohas=$_POST["codtipapohas"];
			$this->codempdes=$_POST["codempdes"];
			$this->codemphas=$_POST["codemphas"];
			$this->tipnomdes=$_POST["tipnomdes"];
			$this->tipnomhas=$_POST["tipnomhas"];
			$this->fecdesde=$_POST["fecdesde"];
			$this->fechasta=$_POST["fechasta"];
            $this->especial=$_POST["especial"];
			$this->elab=$_POST["elab"];
			$this->rev=$_POST["rev"];
			$this->auto=$_POST["auto"];
			$this->cab1="1";
			$this->sql="SELECT DISTINCT A.CODTIPAPO as codtipapo,A.DESTIPAPO as destipapo,
						A.PORAPO,A.PORRET,B.CODNOM as CODNOMAPO,C.NOMNOM as nomnom
                        FROM NPCONTIPAPORET B,NPTIPAPORTES A,NPNOMINA C
						WHERE
						B.CODTIPAPO='".$this->codtipapodes."' AND
					--	B.CODTIPAPO<='".$this->codtipapohas."' AND
						B.CODNOM='".$this->tipnomdes."' AND
						--B.CODNOM<='".$this->tipnomhas."' AND
						 B.CODNOM=C.CODNOM
						AND B.CODTIPAPO=A.CODTIPAPO";
				//print "<pre>"; print $this->sql;exit;
			$this->tb=$this->bd->select($this->sql);



		//	print "<pre>"; print $this->sql2;exit;


			$this->llenartitulosmaestro();
			$this->cab=new cabecera();

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
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","B",9);

			    $this->celda(15,43,'Dirección de Recursos Humano');
				$this->setXY(15,53);

				$this->Multicell(190,4,$this->tb->fields["destipapo"],0,'C',0);
				$this->ln(10);




				if ($this->cab1=='1')
				{
						$this->setX(20);
						$this->cell(70,0,'Nomina:   '.$this->tb->fields["codnomapo"].'  -  '.$this->tb->fields["nomnom"]);
						$this->ln(6);
						$this->setX(20);
						$this->cell(50,0,'Fecha desde:   '.$this->fecdesde.'   hasta:  '.$this->fechasta);

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


				}



		}
		function Cuerpo()
		{
			$tot_cs_total = 0;
			$tot_num_emp = 0;
			$tot_cs_ret = 0;
			$tot_cs_apo = 0;
			$cs_total = 0;
			$num_emp = 0;
			$cs_ret = 0;
			$cs_apo = 0;

			while (!$this->tb->EOF)
			{
                $this->este=$this->tb->fields["codnomapo"];
              /*  $this->sql2="SELECT
						DISTINCT
						A.CODEMP as codemp,
						D.CODTIPAPO as codtipapo,
						A.CODNOM,
						A.CODCAR as codcar,
						--SUM(A.monto) as  CF_MONRETENCION,
						(A.monto) as  CF_MONRETENCION,
						to_char(FECING,'dd/mm/yyyy') as  FECING,
						B.NOMEMP as nomemp
						FROM
						NPhiscon A,NPCONTIPAPORET D,NPHOJINT B,npcargos c
						WHERE
                        A.CODNOM='".$this->tb->fields["codnomapo"]."' AND
						A.CODEMP >=  '".$this->codempdes."'
						AND  A.CODEMP <= '".$this->codemphas."'
						AND A.FECNOM>=to_date('".$this->fecdesde."','dd/mm/yyyy') AND
						A.FECNOM<=to_date('".$this->fechasta."','dd/mm/yyyy') and
						A.CODEMP=B.CODEMP and
						a.codcar=c.codcar and
						A.CODCON = D.CODCON and D.TIPO='R' AND
                        D.CODTIPAPO='".$this->tb->fields["codtipapo"]."'
						GROUP BY CODTIPAPO,A.CODEMP,A.CODNOM,A.CODCAR,B.NOMEMP,B.FECING,A.monto
						ORDER BY A.CODNOM,b.nomEMP";*/


					$this->sql2="SELECT
                        DISTINCT
                        A.CODEMP as codemp,
                        A.CODNOM,
                        A.CODCAR as codcar,
                        montorethist('".$this->tb->fields["codtipapo"]."','R',A.CODNOM,A.CODemp,A.CODCAR,'".$this->fecdesde."','".$this->fechasta."')::numeric as  CF_MONRETENCION,
                        to_char(FECING,'dd/mm/yyyy') as  FECING,
                        B.NOMEMP as nomemp
                        FROM
                        NPhiscon A,NPHOJINT B,npcargos c
                        WHERE
                        A.CODNOM='".$this->tb->fields["codnomapo"]."' AND
                        A.CODEMP >=  '".$this->codempdes."'  AND
                        A.CODEMP <= '".$this->codemphas."' AND
                        A.FECNOM>=to_date('".$this->fecdesde."','dd/mm/yyyy') and
                        A.FECNOM<=to_date('".$this->fechasta."','dd/mm/yyyy') and
                        A.CODEMP=B.CODEMP and
                        a.codcar=c.codcar and   a.especial='".$this->especial."' AND
                        montorethist('".$this->tb->fields["codtipapo"]."','A',A.CODNOM,A.CODemp,A.CODCAR,'".$this->fecdesde."','".$this->fechasta."')+montorethist('".$this->tb->fields["codtipapo"]."','R',A.CODNOM,A.CODemp,A.CODCAR,'".$this->fecdesde."','".$this->fechasta."')>0
                        GROUP BY A.CODEMP,A.CODNOM,A.CODCAR,B.NOMEMP,B.FECING,A.monto
                        ORDER BY A.CODEMP,A.CODNOM ";

						//	print "<pre>"; print $this->sql2;exit;
				$tb2=$this->bd->select($this->sql2);
				$cs_total = 0;
				$num_emp = 0;
				$cs_ret = 0;
				$cs_apo = 0;
				if($this->tb->fields["codtipapo"]=='0001' || $this->tb->fields["codtipapo"]=='0005')
					$tabla='NPCONSUELDO';
				else
					$tabla='NPCONSALINT';
				//DETALLE DEL TIPO DE APORTE Y RENTENCION
						$this->setFont("Arial","B",7);
						while (!$tb2->EOF)
						{
							$num_emp++;
							$tot_num_emp++;
							$this->celda(23,'',$tb2->fields["codemp"]);
							$this->celda(40,'','');
							$this->sql3="SELECT coalesce(SUM(MONTO),0) as VALOR
								  FROM NPHISCON A, $tabla B
                                  WHERE
								  CODEMP =('".$tb2->fields["codemp"]."') AND
								  (CODCAR) =('".$tb2->fields["codcar"]."') AND
								  FECNOM>=to_date('".$this->fecdesde."','dd/mm/yyyy') AND
								  FECNOM<=to_date('".$this->fechasta."','dd/mm/yyyy') AND
								  a.codnom=b.codnom and
								  A.CODCON=B.CODCON ";

								  //print "<pre>";print $this->sql3;exit;

							$tb3= $this->bd->select($this->sql3);
							$this->celda(93,'',number_format($tb3->fields["valor"],2,',','.'),0,0,'R');
							$this->celda(114,'',$tb2->fields["fecing"]);
                          /*  if  ($this->tb->fields["codtipapo"]=='0005'){
                             $tb2->fields["cf_monretencion"]=0.00;
                            }*/
							$this->celda(132,'',number_format($tb2->fields["cf_monretencion"],2,',','.'),0,0,'R');
							$cs_ret = $cs_ret +  $tb2->fields["cf_monretencion"];
							$tot_cs_ret = $tot_cs_ret  +  $tb2->fields["cf_monretencion"];
							$this->sql5="SELECT SUM(MONTO) as  ELMONTO
										 FROM NPCONTIPAPORET C, NPHOJINT B, NPHISCON A
										 WHERE
										 C.CODTIPAPO='".$this->tb->fields["codtipapo"]."' AND
										 B.CODEMP='".$tb2->fields["codemp"]."' AND
										 FECNOM>=to_date('".$this->fecdesde."','dd/mm/yyyy') AND
								  		 FECNOM<=to_date('".$this->fechasta."','dd/mm/yyyy') AND
										 A.CODCAR='".$tb2->fields["codcar"]."' AND
										 A.CODNOM=C.CODNOM AND
										 A.CODCON=C.CODCON AND
										 C.TIPO='A' AND
										 B.CODEMP=A.CODEMP
										 ";//print $this->sql5;exit;
							$tb5= $this->bd->select($this->sql5);
							$this->celda(156,'',number_format($tb5->fields["elmonto"],2,',','.'),0,0,'R');
							$cs_apo = $cs_apo +  $tb5->fields["elmonto"];
							$tot_cs_apo = $tot_cs_apo +  $tb5->fields["elmonto"];

							$CF_total = $tb2->fields["cf_monretencion"] + $tb5->fields["elmonto"];
							$cs_total = $cs_total  + $CF_total;
							$tot_cs_total = $tot_cs_total + $CF_total;
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

$this->SetXY(30,200);
			$this->setFont("Arial","B",8);
			$this->cell(10,40,'Elaborado por: '.$this->elab);
			$this->SetXY(90,200);
			$this->cell(10,40,'Revisado por: '.$this->rev);
			$this->SetXY(140,200);
			$this->cell(10,40,'Autorizado por: '.$this->auto);
						    }
						}

						$this->setFont("Arial","B",9);

			$this->tb->MoveNext();
			if (!$this->tb->EOF)
			{$this->AddPage();}
			}
			$this->cab1="0";
		//	$this->AddPage();

			$this->rect(50,95,100,40);
			$this->setFont("Arial","B",12);
			$this->celda(100,85,'RESUMEN TOTAL');
			$this->setFont("Arial","B",9);
			$this->celda(85,100,'Trabajadores:                   '.$tot_num_emp);
			$this->celda(85,110,'Monto Total:                     '.number_format($tot_cs_total,2,',','.'));
			$this->celda(85,120,'Retenciones:                    '.number_format($tot_cs_ret,2,',','.'));
			$this->celda(85,130,'Aportes:                           '.number_format($tot_cs_apo,2,',','.'));
			$this->setFont("Arial","B",14);
			$this->celda(57,115,'TOTAL');



		}//cuerpo
	}//clase
?>
