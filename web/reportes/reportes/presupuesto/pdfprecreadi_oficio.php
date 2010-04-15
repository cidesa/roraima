<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/funciones.php");

	class pdfreporte extends fpdf
	{



		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->codadides=$_POST["codadides"];
			$this->codadihas=$_POST["codadihas"];
			$this->fecadides=$_POST["fecadides"];
			$this->fecadihas=$_POST["fecadihas"];
			$this->oficio=$_POST["oficio"];
			$this->fechaoficio=$_POST["fechaoficio"];
			$this->ciudadano=$_POST["ciudadano"];
			$this->gobernador=$_POST["gobernador"];
			$this->gobencargado=$_POST["gobencargado"];
			$this->nombresec=$_POST["nombresec"];
			$this->encargado=$_POST["encargado"];
			$this->cargodirector=$_POST["cargodirector"];


			$this->sql="SELECT
					A.REFADI as referencia,
					SUBSTR(A.REFADI,6,8) as REF,
					--TO_NUMBER(A.REFADI) as REF,
					A.FECADI as Fecha,
					TO_CHAR(A.FECADI,'YYYY') as ANO1,
					RTRIM(A.DESADI) as destra,
					A.TOTADI as totadi,
					A.FECCON,
					A.FECGOB,
					A.DESCON,
					A.DESGOB,
					A.ENUNCIADO as enunciado,
					A.JUSTIFICACION
					FROM
					CPSOLADIDIS  A
					WHERE
					A.REFADI >= '".$this->codadides."' AND
					A.REFADI <= '".$this->codadihas."' AND
					A.FECADI >= to_date('".$this->fecadides."','dd/mm/yyyy') AND
					A.FECADI <=to_date('".$this->fecadihas."','dd/mm/yyyy') AND
					ADIDIS='A'
					GROUP BY
					A.REFADI,
					A.FECADI,
					A.DESADI,
					A.TOTADI,
					A.FECCON,
					A.FECGOB,
					A.DESCON,
					A.DESGOB,
					A.ENUNCIADO,
					A.JUSTIFICACION
					ORDER BY A.REFADI limit 50 ";
//					print '<pre>'; print $this->sql;exit;


			$this->cab=new cabecera();


		}

		function Header()
		{
			//$this->cab->poner_cabecera($this,$this->titulo,"l","s");



		}
		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);



		    while (!$tb->EOF)
		    {

			    	$this->setFont('arial',"",8);
			    	$this->setXY(20,20);
			    	$this->cell(180,5,'Pagina:   '.$this->PageNo().'    de    {nb}',0,0,'R');

					$this->setFont('arial',"B",10);
			    	$this->setXY(20,35);
			    	$this->cell(180,5,'Ciudad San Cristobal,  '.$this->fechaoficio,0,0,'R');

			    	$this->setXY(20,40);
			    	$this->cell(180,5,'Oficio Nro.   '.$this->oficio,0,0,'R');

					$this->ln(12);
					$this->setX(20);
					$this->cell(40,4,'Ciudadano:');

					$this->setFont('arial',"",10);
					$this->ln();
					$this->setX(20);
					$this->cell(40,4,$this->ciudadano);

					$this->setFont('arial',"B",10);
					$this->ln(6);
					$this->setX(20);
					$this->multicell(60,3.5,'' .
							'Presidente y demas Miembros del' .
							'Consejo Legislativo del Estado Tachira' .
							'Su Despacho.-');

					$this->setFont('arial',"",9);
			    	$this->setXY(20,80);
					$this->multicell(180,4,'Tengo el honor de dirigirme a Ustedes actuando de conformidad con lo establecido en el Artículo No. 210 de la Constitución del Estado Tachira, en concordancia con lo previsto en el Artículo No. 33 de la Ley Orgánica del Regimen Presupuestario del Estado Tachira y el Artículo No. 27 de las Disposiciones Generales de la Ley de Presupuesto de Ingresos y Gastos Públicos del Estado Tachira, correspondiente al Ejercicio Fiscal '.$tb->fields["ano1"].', con la finalidad de solicitar la debida autorización para decretar un Crédito Adicional al Presupuesto de Gastos vigente, por la cantidad de: ');

					$this->ln();
					$this->setFont('arial',"",8);
					$this->setX(20);
			    	$this->multicell(180,5, montoescrito($tb->fields["totadi"],$this->bd).'.  Bs.  '.number_format($tb->fields["totadi"],2,'.',',').'     '.$tb->fields["enunciado"]);


					$this->setFont('arial',"",9);
			    	$this->setXY(20,$this->getY()+4);
			    	$this->cell(180,5,'La imputación de las asignaciones presupuestarias, comprendidas en este Crédito Adicional, se especifican a continuación:');

					$this->setFont('arial',"B",9);
			    	$this->setXY(20,$this->getY()+8);
			    	$this->multicell(180,5,'CREDITO ADICIONAL No.    :'.$tb->fields["ref"],0,'J',0);


			    $this->setXY(20,150);
			    $this->cell(45,5,'CODIGO PRESUPUESTARIO');
			    $this->setXY(20,153);
			    $this->setFont('arial',"",6);
			    $this->cell(45,5,'ST-PR-PY-OA-PAR-GE-ES-SE-NUM');

				$this->setFont('arial',"B",8);
			    $this->setXY(100,150);
			    $this->cell(45,5,'DENOMINACION');

			    $this->setXY(175,150);
			    $this->cell(45,5,'MONTO EN');
			    $this->setXY(175,153);
			    $this->cell(45,5,'BOLIVARES');

			    $this->rect(20,150,180,10);


			    $this->setXY(20,165);
			    $this->cell(45,5,'PRESUPUESTO DE GASTOS');
			    $this->setY(158);


		    	//Detalle PRESUPUESTO DE GASTOS

		    	$this->sql2="SELECT
						A.REFADI as REFERENCIA,
						SUBSTR(C.CODPRE,1,2) as DESTINO_FUN,
						SUM(B.MONMOV) as  MONTO_FUN
						FROM
						CPSOLADIDIS  A,
						CPSOLMOVADI B,
						CPDEFTIT C
						WHERE
						a.refadi = '".$tb->fields["referencia"]."' and
						A.REFADI = B.REFADI   AND
						B.CODPRE=C.CODPRE AND
						C.ESTATUS='F'               AND
						ADIDIS='A'
						GROUP BY A.REFADI,SUBSTR(C.CODPRE,1,2)

						UNION
						SELECT
						A.REFADI,
						SUBSTR(C.CODPRE,1,5),
						SUM(B.MONMOV)
						FROM
						CPSOLADIDIS  A,
						CPSOLMOVADI B,
						CPDEFTIT C
						WHERE
						a.refadi = '".$tb->fields["referencia"]."' and
						A.REFADI = B.REFADI   AND
						B.CODPRE=C.CODPRE AND
						C.ESTATUS='F'               AND
						ADIDIS='A'
						GROUP BY A.REFADI,SUBSTR(C.CODPRE,1,5)


						UNION
						SELECT                                         --- AÑADIDO EL 11-03-2005. NO SALIA TOTALIZADOR NIVEL PROYECTO
						A.REFADI,
						SUBSTR(C.CODPRE,1,8),
						SUM(B.MONMOV)
						FROM
						CPSOLADIDIS  A,
						CPSOLMOVADI B,
						CPDEFTIT C
						WHERE
						a.refadi = '".$tb->fields["referencia"]."' and
						A.REFADI = B.REFADI   AND
						B.CODPRE=C.CODPRE AND
						C.ESTATUS='F'               AND
						ADIDIS='A'
						GROUP BY A.REFADI,SUBSTR(C.CODPRE,1,8)


						UNION
						SELECT
						A.REFADI,
						SUBSTR(C.CODPRE,1,11),
						SUM(B.MONMOV)
						FROM
						CPSOLADIDIS  A,
						CPSOLMOVADI B,
						CPDEFTIT C
						WHERE
						a.refadi = '".$tb->fields["referencia"]."' and
						A.REFADI = B.REFADI   AND
						B.CODPRE=C.CODPRE AND
						C.ESTATUS='F'               AND
						ADIDIS='A'
						GROUP BY A.REFADI,SUBSTR(C.CODPRE,1,11)

						UNION
						SELECT
						A.REFADI,
						SUBSTR(C.CODPRE,1,15),
						SUM(B.MONMOV)
						FROM
						CPSOLADIDIS  A,
						CPSOLMOVADI B,
						CPDEFTIT C
						WHERE
						a.refadi = '".$tb->fields["referencia"]."' and
						A.REFADI = B.REFADI   AND
						B.CODPRE=C.CODPRE AND
						C.ESTATUS='F'               AND
						ADIDIS='A'
						GROUP BY A.REFADI,SUBSTR(C.CODPRE,1,15)

						UNION
						SELECT
						A.REFADI,
						SUBSTR(C.CODPRE,1,18),
						SUM(B.MONMOV)
						FROM
						CPSOLADIDIS  A,
						CPSOLMOVADI B,
						CPDEFTIT C
						WHERE
						a.refadi = '".$tb->fields["referencia"]."' and
						A.REFADI = B.REFADI   AND
						B.CODPRE=C.CODPRE AND
						C.ESTATUS='F'               AND
						ADIDIS='A'
						GROUP BY A.REFADI,SUBSTR(C.CODPRE,1,18)

						UNION
						SELECT
						A.REFADI,
						SUBSTR(C.CODPRE,1,21),
						SUM(B.MONMOV)
						FROM
						CPSOLADIDIS  A,
						CPSOLMOVADI B,
						CPDEFTIT C
						WHERE
						a.refadi = '".$tb->fields["referencia"]."' and
						A.REFADI = B.REFADI   AND
						B.CODPRE=C.CODPRE AND
						C.ESTATUS='F'               AND
						ADIDIS='A'
						GROUP BY A.REFADI,SUBSTR(C.CODPRE,1,21)

						UNION
						SELECT
						A.REFADI,
						SUBSTR(C.CODPRE,1,24),
						SUM(B.MONMOV)
						FROM
						CPSOLADIDIS  A,
						CPSOLMOVADI B,
						CPDEFTIT C
						WHERE
						a.refadi = '".$tb->fields["referencia"]."' and
						A.REFADI = B.REFADI   AND
						B.CODPRE=C.CODPRE AND
						C.ESTATUS='F'               AND
						ADIDIS='A'
						GROUP BY A.REFADI,SUBSTR(C.CODPRE,1,24)

						UNION
						SELECT
						A.REFADI,
						SUBSTR(C.CODPRE,1,28),
						SUM(B.MONMOV)
						FROM
						CPSOLADIDIS  A,
						CPSOLMOVADI B,
						CPDEFTIT C
						WHERE
						a.refadi = '".$tb->fields["referencia"]."' and
						A.REFADI = B.REFADI   AND
						B.CODPRE=C.CODPRE AND
						C.ESTATUS='F'               AND
						ADIDIS='A'
						GROUP BY A.REFADI,SUBSTR(C.CODPRE,1,28)

						ORDER BY 1,2";
					//print $this->sql2;exit;
		    	$tb2=$this->bd->select($this->sql2);

				$this->setFont('arial',"",7);
				$cf_tot_fun = 0;
				while (!$tb2->EOF)
				{
					$this->setX(20);
					$this->cell(45,5,$tb2->fields["destino_fun"]);
					$sql21="SELECT NOMPRE as NOMBRE
						     FROM CPDEFTIT
						    WHERE CODPRE=RPAD('".$tb2->fields["destino_fun"]."',32,' ')";
					$tb21=$this->bd->Select($sql21);
					$cf_tot_fun = $cf_tot_fun + $tb2->fields["monto_fun"];
					$this->cell(105,5,'');
					$this->cell(25,5,number_format($tb2->fields["monto_fun"],2,'.',','),0,0,'R');
					$this->setX(65);
					$this->multicell(105,4,$tb21->fields["nombre"]);
					$tb2->MoveNext();
				}
				$this->setFont('arial',"B",8);
				$this->ln(4);
				$this->setX(120);
				$this->cell(60,5,'TOTAL PRESUPUESTO DE GASTOS.......'.number_format($cf_tot_fun,2,'.',','));

				$this->setXY(20,$this->GetY()+10);
			    $this->cell(45,5,'PRESUPUESTO DE INVERSION');
			    $this->ln(6);

				$this->sql3="SELECT
						A.REFADI as  REFERENCIA,
						SUBSTR(C.CODPRE,1,2) as  DESTINO_INV,
						SUM(B.MONMOV) as MONTO_INV
						FROM
						CPSOLADIDIS  A,
						CPSOLMOVADI B,
						CPDEFTIT C
						WHERE
						a.refadi = '".$tb->fields["referencia"]."' and
						A.REFADI = B.REFADI   AND
						B.CODPRE=C.CODPRE AND
						C.ESTATUS='I'               AND
						ADIDIS='A'
						GROUP BY A.REFADI,SUBSTR(C.CODPRE,1,2)

						UNION
						SELECT
						A.REFADI,
						SUBSTR(C.CODPRE,1,5),
						SUM(B.MONMOV)
						FROM
						CPSOLADIDIS  A,
						CPSOLMOVADI B,
						CPDEFTIT C
						WHERE
						a.refadi = '".$tb->fields["referencia"]."' and
						A.REFADI = B.REFADI   AND
						B.CODPRE=C.CODPRE AND
						C.ESTATUS='I'               AND
						ADIDIS='A'
						GROUP BY A.REFADI,SUBSTR(C.CODPRE,1,5)


						UNION
						SELECT                                           --- AÑADIDO EL 11-03-2005. NO SALIA TOTALIZADOR NIVEL PROYECTO
						A.REFADI,
						SUBSTR(C.CODPRE,1,8),
						SUM(B.MONMOV)
						FROM
						CPSOLADIDIS  A,
						CPSOLMOVADI B,
						CPDEFTIT C
						WHERE
						a.refadi = '".$tb->fields["referencia"]."' and
						A.REFADI = B.REFADI   AND
						B.CODPRE=C.CODPRE AND
						C.ESTATUS='I'               AND
						ADIDIS='A'
						GROUP BY A.REFADI,SUBSTR(C.CODPRE,1,8)


						UNION
						SELECT
						A.REFADI,
						SUBSTR(C.CODPRE,1,11),
						SUM(B.MONMOV)
						FROM
						CPSOLADIDIS  A,
						CPSOLMOVADI B,
						CPDEFTIT C
						WHERE
						a.refadi = '".$tb->fields["referencia"]."' and
						A.REFADI = B.REFADI   AND
						B.CODPRE=C.CODPRE AND
						C.ESTATUS='I'               AND
						ADIDIS='A'
						GROUP BY A.REFADI,SUBSTR(C.CODPRE,1,11)

						UNION
						SELECT
						A.REFADI,
						SUBSTR(C.CODPRE,1,15),
						SUM(B.MONMOV)
						FROM
						CPSOLADIDIS  A,
						CPSOLMOVADI B,
						CPDEFTIT C
						WHERE
						a.refadi = '".$tb->fields["referencia"]."' and
						A.REFADI = B.REFADI   AND
						B.CODPRE=C.CODPRE AND
						C.ESTATUS='I'               AND
						ADIDIS='A'
						GROUP BY A.REFADI,SUBSTR(C.CODPRE,1,15)

						UNION
						SELECT
						A.REFADI,
						SUBSTR(C.CODPRE,1,18),
						SUM(B.MONMOV)
						FROM
						CPSOLADIDIS  A,
						CPSOLMOVADI B,
						CPDEFTIT C
						WHERE
						a.refadi = '".$tb->fields["referencia"]."' and
						A.REFADI = B.REFADI   AND
						B.CODPRE=C.CODPRE AND
						C.ESTATUS='I'               AND
						ADIDIS='A'
						GROUP BY A.REFADI,SUBSTR(C.CODPRE,1,18)

						UNION
						SELECT
						A.REFADI,
						SUBSTR(C.CODPRE,1,21),
						SUM(B.MONMOV)
						FROM
						CPSOLADIDIS  A,
						CPSOLMOVADI B,
						CPDEFTIT C
						WHERE
						a.refadi = '".$tb->fields["referencia"]."' and
						A.REFADI = B.REFADI   AND
						B.CODPRE=C.CODPRE AND
						C.ESTATUS='I'               AND
						ADIDIS='A'
						GROUP BY A.REFADI,SUBSTR(C.CODPRE,1,21)

						UNION
						SELECT
						A.REFADI,
						SUBSTR(C.CODPRE,1,24),
						SUM(B.MONMOV)
						FROM
						CPSOLADIDIS  A,
						CPSOLMOVADI B,
						CPDEFTIT C
						WHERE
						a.refadi = '".$tb->fields["referencia"]."' and
						A.REFADI = B.REFADI   AND
						B.CODPRE=C.CODPRE AND
						C.ESTATUS='I'               AND
						ADIDIS='A'
						GROUP BY A.REFADI,SUBSTR(C.CODPRE,1,24)

						UNION
						SELECT
						A.REFADI,
						SUBSTR(C.CODPRE,1,28),
						SUM(B.MONMOV)
						FROM
						CPSOLADIDIS  A,
						CPSOLMOVADI B,
						CPDEFTIT C
						WHERE
						a.refadi = '".$tb->fields["referencia"]."' and
						A.REFADI = B.REFADI   AND
						B.CODPRE=C.CODPRE AND
						C.ESTATUS='I'               AND
						ADIDIS='A'
						GROUP BY A.REFADI,SUBSTR(C.CODPRE,1,28)

						ORDER BY 1,2";
				//print $this->sql3;exit;

				$tb3=$this->bd->select($this->sql3);
				$this->setFont('arial',"",7);
				$this->ln();
				$cf_tot_inv = 0;
				while (!$tb3->EOF)
				{
					$this->setX(20);
					$this->cell(45,5,$tb3->fields["destino_inv"]);
					$sql31="SELECT NOMPRE as NOMBRE
						     FROM CPDEFTIT
						    WHERE CODPRE=RPAD('".$tb3->fields["destino_inv"]."',32,' ')";
					$tb31=$this->bd->Select($sql31);
					$cf_tot_inv = $cf_tot_inv + $tb3->fields["monto_inv"];
					$this->cell(105,5,'');
					$this->cell(25,5,number_format($tb3->fields["monto_inv"],2,'.',','),0,0,'R');
					$this->setX(65);
					$this->multicell(105,4,$tb31->fields["nombre"]);
					$tb3->MoveNext();
				}
						$this->setFont('arial',"B",8);
						$this->ln(4);
						$this->setX(120);
						$this->cell(60,5,'TOTAL PRESUPUESTO DE INVERSION.......'.number_format($cf_tot_inv,2,'.',','));

						$this->ln(8);
						$this->setX(110);
						$this->cell(60,5,'TOTAL CREDITO ADICIONAL.......'.number_format($cf_tot_inv + $cf_tot_fun,2,'.',','));

						$this->setFont('arial',"",8);
						$this->ln(12);
						$this->setX(20);
						$this->multicell(180,4,$tb->fields["justificacion"].'    '.$tb->fields["justificacion1"].'    '.$tb->fields["justificacion2"].'    '.$tb->fields["justificacion3"].'    '.$tb->fields["justificacion4"].'    '.$tb->fields["justificacion5"].'    '.$tb->fields["justificacion6"].'    '.$tb->fields["justificacion7"].'    '.$tb->fields["justificacion8"].'    '.$tb->fields["justificacion9"].'    ',0,'J',0);

				$tb->MoveNext();
				if (!$tb->EOF)
				{
					$this->Addpage();
				}
		    }


			$this->setXY(35,$this->getY()+15);
			$this->cell(160,4,'Al estimar la atención dispensada, se suscribe.');
			$this->setXY(45,$this->getY()+5);
			$this->cell(160,4,'Atentamente,                                         V°    B°');
			$this->setXY(35,$this->GetY()+20);
			$this->cell(160,5,$this->gobernador,0,0,'L');
			$this->setXY(30,$this->GetY()+5);
			$this->cell(60,5,'Gobernador del Estado Tachira',0,0,'L'); $this->cell(20,5,'    ('.$this->gobencargado.')');
			$this->setXY(20,$this->GetY()-5);
			$this->cell(140,5,$this->nombresec,0,0,'R');
			$this->setXY(20,$this->GetY()+5);
			$this->cell(145,5,$this->cargodirector,0,0,'R');$this->cell(20,5,'    ('.$this->encargado.')');



		}
	}
?>
