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
			$this->nro_decreto=$_POST["nro_decreto"];
			$this->fecadides=$_POST["fecadides"];
			$this->ano_independ=$_POST["ano_independ"];
			$this->nro_federacion=$_POST["nro_federacion"];
			$this->nombregob=$_POST["nombregob"];
			$this->encargado=$_POST["encargado"];
			$this->nombresec=$_POST["nombresec"];
			$this->fecha=$_POST["fecha"];
			$this->pag = true;

			$this->sql="SELECT
					A.REFADI as  Referencia,
					TO_NUMBER(A.REFADI,99999999) as  REF,
					A.FECADI as Fecha,
					TO_CHAR(A.FECADI,'YYYY') as ANO1,
					RTRIM(A.DESADI) as Destra,
					A.TOTADI as totadi,
					A.FECCON as feccon,
					A.FECGOB as fecgob,
					A.DESCON as descon,
					A.DESGOB as desgob,
					A.ENUNCIADO as enunciado
					FROM
					CPSOLADIDIS  A,
					CPADIDIS B
					WHERE
					A.REFADI=B.REFADI AND
					A.REFADI = '".$this->codadides."' AND
					A.FECADI >=to_date('".$this->fecadides."','dd/mm/yyyy')   AND
					A.ADIDIS='A'
					GROUP BY
					A.REFADI,
					A.FECADI,
					A.DESADI,
					A.TOTADI,
					A.FECCON,
					A.FECGOB,
					A.DESCON,
					A.DESGOB,
					A.ENUNCIADO
					ORDER BY A.REFADI  limit 10";

			//print '<pre>';print $this->sql;exit;

			$this->cab=new cabecera();


		}

		function Header()
		{
			//$this->cab->poner_cabecera($this,$this->titulo,"l","s");


			if (!$this->pag)
			{
				$this->setXY(20,20);
			    $this->setFont('arial',"B",8);
			    $this->cell(45,5,'CODIGO PRESUPUESTARIO');
			    $this->setXY(20,23);
			    $this->setFont('arial',"B",6);
			    $this->cell(45,5,'ST-PR-PY-OA-PAR-GE-ES-SE-NUM');

				$this->setFont('arial',"B",8);
			    $this->setXY(100,20);
			    $this->cell(45,5,'DENOMINACION');

			    $this->setXY(178,20);
			    $this->cell(45,5,'MONTO EN');
			    $this->setXY(178,23);
			    $this->cell(45,5,'BOLIVARES');

			    $this->rect(20,18,180,10);
			    $this->setY(30);
			}




		}
		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);


		    while (!$tb->EOF)
		    {

			    	$this->setFont('arial',"B",12);
			    	$this->setXY(20,20);
			    	$this->cell(160,5,'DECRETO NUMERO: '.$this->nro_decreto,0,0,'C');

					$this->setFont('arial',"",12);
			    	$this->setXY(20,35);
			    	$this->cell(160,5,$this->nombregob,0,0,'C');

			    	$this->setXY(20,40);
			    	$this->cell(160,5,'GOBERNADOR DEL ESTADO TACHIRA'.'      '.$this->encargado,0,0,'C');

					$this->setFont('arial',"",9);
			    	$this->setXY(20,55);
					$this->multicell(160,4,'En uso de las atribuciones legales, que le confiere el artículo 160 de la Constitución de la República Bolivariana de Venezuela, en concordancia con los artículos 163 y 164 de la Constitución del Estado Tachira y de conformidad con lo dispuesto en la Ley Orgánica de Régimen Presupuestario del Estado Tachira, en su artículo 33.');

					$this->setFont('arial',"B",12);
					$this->setXY(20,75);
			    	$this->cell(160,5,'CONSIDERANDO',0,0,'C');

					$this->setFont('arial',"B",9);
			    	$this->setXY(20,88);
			    	$this->multicell(160,4,'Que de acuerdo a lo establecido en la Ley Orgánica de Régimen Presupuestario del Estado tachira, el ciudadano Gobernador,  está  facultado  previa  autorización  del Consejo Legislativo  del  Estado  Tachira,  a decretar Créditos Adicionales.');

					$this->setFont('arial',"B",12);
					$this->setXY(20,105);
			    	$this->cell(160,5,'CONSIDERANDO',0,0,'C');

					$this->setFont('arial',"",8);
			    	$this->setXY(20,115);
			    	$this->multicell(160,5,'Que el Consejo Legislativo del Estado Tachira, en su sesión Ordinaria el día '.$tb->fields["feccon"].' , según Oficio Nro. '.$tb->fields["descon"].' , aprobo autorizar para decretar Créditos Adicionales solicitado por el Ciudadano Gobernador a través del Oficio '.$tb->fields["desgob"].'  de fecha '.$tb->fields["fecgob"]);

					$this->setFont('arial',"B",12);
					$this->setXY(20,132);
			    	$this->cell(160,5,'DECRETA',0,0,'C');

			    	$this->setFont('arial',"",8);
			    	$this->setXY(20,140);
			    	$this->cell(160,5,'ARTÍCULO PRIMERO:   Distribuyase Crédito Adicional, Nro. '.$tb->fields["ref"].' por la cantidad de:');

			    	$this->setFont('arial',"",8);
			    	$this->setXY(20,145);
			    	$this->multicell(160,5,montoescrito($tb->fields["totadi"],$this->bd).'.  Bs.  '.number_format($tb->fields["totadi"],2,'.',',').'    '.$tb->fields["enunciado"]);



			    	$this->setXY(20,175);
			    $this->setFont('arial',"B",8);
			    $this->cell(45,5,'CODIGO PRESUPUESTARIO');
			    $this->setXY(20,178);
			    $this->setFont('arial',"B",6);
			    $this->cell(45,5,'ST-PR-PY-OA-PAR-GE-ES-SE-NUM');

				$this->setFont('arial',"B",8);
			    $this->setXY(100,175);
			    $this->cell(45,5,'DENOMINACION');

			    $this->setXY(178,175);
			    $this->cell(45,5,'MONTO EN');
			    $this->setXY(178,178);
			    $this->cell(45,5,'BOLIVARES');

			    $this->rect(20,175,180,10);


			    $this->setXY(20,185);
			    $this->cell(45,5,'PRESUPUESTO DE GASTOS');
			    $this->setY(190);

		    	//Detalle PRESUPUESTO DE GASTOS

		    	$this->sql2="SELECT
							A.REFADI as  REFERENCIA,
							SUBSTR(C.CODPRE,1,2) as DESTINO_FUN,
							SUM(B.MONMOV) as MONTO_FUN
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
							SELECT
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
				$this->pag=false;
				$cf_tot_fun = 0;
				$this->setFont('arial',"",6);
				while (!$tb2->EOF)
				{
					$this->setX(25);
					$this->cell(45,4,$tb2->fields["destino_fun"]);
					$sql21="SELECT NOMPRE as NOMBRE
						     FROM CPDEFTIT
						    WHERE CODPRE=RPAD('".$tb2->fields["destino_fun"]."',32,' ')";
					$tb21=$this->bd->Select($sql21);
					$cf_tot_fun = $cf_tot_fun + $tb2->fields["monto_fun"];
					$this->cell(105,4,'');
					$this->cell(25,4,number_format($tb2->fields["monto_fun"],2,'.',','),0,0,'R');
					$this->setX(65);
					$this->multicell(110,4,$tb21->fields["nombre"]);
					//$this->ln(4);
					$tb2->MoveNext();
				}
				$this->ln(4);
				$this->setFont('arial',"B",8);
				$this->setX(120);
				$this->cell(60,5,'TOTAL PRESUPUESTO DE GASTOS.......'.number_format($cf_tot_fun,2,'.',','));

				$this->setXY(20,$this->GetY()+10);
			    $this->cell(45,5,'PRESUPUESTO DE INVERSION');
			    $this->ln(8);

				$this->sql3="SELECT
							A.REFADI as REFERENCIA,
							SUBSTR(C.CODPRE,1,2) as DESTINO_INV,
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
							SELECT
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
				$this->setFont('arial',"",6);
				$cf_tot_inv = 0;
				while (!$tb3->EOF)
				{
					$this->setX(25);
					$this->cell(45,4,$tb3->fields["destino_inv"]);
					$sql31="SELECT NOMPRE as NOMBRE
						     FROM CPDEFTIT
						    WHERE CODPRE=RPAD('".$tb3->fields["destino_inv"]."',32,' ')";
					$tb31=$this->bd->Select($sql31);
					$cf_tot_inv = $cf_tot_inv + $tb3->fields["monto_inv"];
					$this->cell(110,4,'');
					$this->cell(45,4,number_format($tb3->fields["monto_inv"],2,'.',','));
					$this->setX(65);
					$this->multicell(110,4,$tb31->fields["nombre"]);
					//$this->ln(4);
					$tb3->MoveNext();
				}
				$this->setFont('arial',"B",8);
						$this->ln(4);
						$this->setX(120);
						$this->cell(60,5,'TOTAL PRESUPUESTO DE INVERSION.......'.number_format($cf_tot_inv,2,'.',','));

						$this->ln(6);
						$this->setX(110);
						$this->cell(60,5,'TOTAL RECTIFICACION PRESUPUESTARIA.......'.number_format($cf_tot_inv + $cf_tot_fun,2,'.',','));

				$this->pag=true;

						$this->setFont('arial',"",8);
						//$this->ln(4);
						$this->setX(20);
						$this->multicell(180,5,$tb->fields["justificacion"].'     '.$tb->fields["justificacion1"].'     '.$tb->fields["justificacion2"].'     '.$tb->fields["justificacion3"].'     '.$tb->fields["justificacion4"].'     '.$tb->fields["justificacion5"].'     '.$tb->fields["justificacion6"].'     '.$tb->fields["justificacion7"].'     '.$tb->fields["justificacion8"].'     '.$tb->fields["justificacion9"],0,'J',0);

						$this->setFont('arial',"",7);
						//$this->ln(8);
						$this->setX(20);
						$this->multicell(180,5,'ARTÍCULO TERCERO:  La Secretaría General de Gobierno y la Secretaría de Administración y Finanzas, quedan encargadas de velar por el cumplimiento y ejecución del presente decreto.
												ARTICULO CUARTO:  Comuníquese al Consejo Legislativo y a la Contraloría General del Estado Bolívar.',0,'J',0);


				$ori=$tb->fields["origen"];
				$tb->MoveNext();
				if (!$tb->EOF)
				{

					$this->Addpage();
				}
		    }

			$this->setFont('arial',"B",8);
			$this->setXY(20,$this->GetY()+20);
			$this->cell(160,5,$this->nombregob,0,0,'R');
			$this->setXY(20,$this->GetY()+5);
			$this->cell(165,5,'Gobernador del Estado Tachira',0,0,'R');
			$this->setXY(20,$this->GetY()+10);
			$this->cell(160,5,'Refrendado Por:',0,0,'R');
			$this->setXY(20,$this->GetY()+10);
			$this->cell(160,5,$this->nombresec,0,0,'R');
			$this->setXY(20,$this->GetY()+5);
			$this->cell(165,5,'Secretario General de Gobierno',0,0,'R');



		}
	}
?>
