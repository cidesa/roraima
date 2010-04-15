<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/modelo/sqls/contabilidad/Conbalgen20.class.php");
	require_once("../../lib/modelo/business/contabilidad.class.php");



	class pdfreporte extends fpdf
	{



		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->ctades = H::GetPost('ctades');
			$this->ctahas = H::GetPost('ctahas');
			$this->perdesde = H::GetPost('perdesde');
			$this->diradm = H::GetPost('diradm');
			$this->jefadm = H::GetPost('jefcon');
			$this->comodin = H::GetPost('comodin');
			$this->actualizar= H::GetPost('actualizar');

			$this->bd        = new basedatosAdo();
			$this->cab = new Cabecera();
 			$this->objeto = new Conbalgen20();
 			 $objconta = new contabilidad();

			if($this->actualizar=='SI')
		    	$objconta->actsaldos();

 			$arrfec = $this->objeto->sqlfechas($this->perdesde);

 			$this->fechades = $arrfec[0]["fecdes"];
 			$this->fechahas = $arrfec[0]["fechas"];
 			$this->tipcuentas="CUENTAS DEL TESORO";

 			$this->arracttes = $this->objeto->sqlacttes($this->ctades,$this->ctahas,$this->perdesde,$this->comodin);
			$salsum  = $this->objeto->sqlsumacttes($this->ctades,$this->ctahas,$this->perdesde,$this->comodin);

 			$this->arrpastes = $this->objeto->sqlpastes($this->ctades,$this->ctahas,$this->perdesde,$this->comodin);

 			$arr=array("0"=>"199",
							"codctapastes"=>"199",
							"1"=>"Situacion Financiera del Tesoro",
							"desctapastes"=>"Situacion Financiera del Tesoro",
							"2"=>H::FormatoMonto(H::formatonum($salsum)-H::Formatonum($this->arrpastes[count($this->arrpastes)-1]["salactpastes"])),
							"salactpastes"=>H::FormatoMonto(H::formatonum($salsum)-H::Formatonum($this->arrpastes[count($this->arrpastes)-1]["salactpastes"])));

			$arr2=array("0"=>"200",
							"codctaacthac"=>"200",
							"1"=>"Situacion Fiscal del Tesoro",
							"desctaacthac"=>"Situacion Fiscal del Tesoro",
							"2"=>H::FormatoMonto(H::formatonum($salsum)-H::Formatonum($this->arrpastes[count($this->arrpastes)-1]["salactpastes"])),
							"salactacthac"=>H::FormatoMonto(H::formatonum($salsum)-H::Formatonum($this->arrpastes[count($this->arrpastes)-1]["salactpastes"])));

 			$this->arrpastes = array_merge($this->arrpastes,array($arr));
 			$this->arracthac = $this->objeto->sqlacthac($this->ctades,$this->ctahas,$this->perdesde,$this->comodin);
 			$this->arracthac = array_merge(array($arr2),$this->arracthac);
 			$this->arrpashac = $this->objeto->sqlpashac($this->ctades,$this->ctahas,$this->perdesde,$this->comodin);
 			$this->arractpre = $this->objeto->sqlactpre($this->ctades,$this->ctahas,$this->perdesde,$this->comodin);
 			$this->arringpre = $this->objeto->sqlingpre($this->ctades,$this->ctahas,$this->perdesde,$this->comodin);
 			$this->arrctaorddes = $this->objeto->sqlctaorddeu($this->ctades,$this->ctahas,$this->perdesde,$this->comodin);
 			$this->arrctaordacr = $this->objeto->sqlctaordacr($this->ctades,$this->ctahas,$this->perdesde,$this->comodin);

 			$this->arrp=$this->arracttes;
 			$this->setAutoPageBreak(true,40);

		}

		function Header()
		{
			$this->cab->poner_cabecera($this,H::GetPost('titulo'),"l","p");
			$this->setFont("arial","B",10);
			$this->setTextColor(0,0,155);
			$this->multicell(260,5,"Del :  $this->fechades   Al   $this->fechahas",0,'C');
			if($this->perdesde=='01')
				$permes='ENERO';
			elseif($this->perdesde=='02')
				$permes='FEBRERO';
			elseif($this->perdesde=='03')
				$permes='MARZO';
			elseif($this->perdesde=='04')
				$permes='ABRIL';
			elseif($this->perdesde=='05')
				$permes='MAYO';
			elseif($this->perdesde=='06')
				$permes='JUNIO';
			elseif($this->perdesde=='07')
				$permes='JULIO';
			elseif($this->perdesde=='08')
				$permes='AGOSTO';
			elseif($this->perdesde=='09')
				$permes='SEPTIEMBRE';
			elseif($this->perdesde=='10')
				$permes='OCTUBRE';
			elseif($this->perdesde=='11')
				$permes='NOVIEMBRE';
			elseif($this->perdesde=='12')
				$permes='DICIEMBRE';

			$this->multicell(260,5,"(Período: $permes)",0,'C');
			$this->ln(2);
			$this->setTextColor(155,0,0);
			$this->setFont("arial","B",9);
			$this->cell(85,5,"ACTIVOS",0,0,'C');
			$this->cell(85,5,$this->tipcuentas,0,0,'C');
			$this->cell(85,5,"PASIVOS",0,0,'C');
			$this->setTextColor(0,0,0);
			$this->ln(6);
			$this->setWidths(array(20,80,30,20,80,30));
			$this->setAligns(array("C","L","R","C","L","R"));
		}

//		function actsaldos()
//		{
//			$sql="
//				UPDATE CONTABB
//				SET SALANT=SALANT*-1 WHERE DEBCRE='C';
//
//				CREATE OR REPLACE VIEW SALDOS AS (
//				SELECT SUBSTR(CODCTA,1,1) AS CUENTA,SUM(SALANT) AS SALDO
//				FROM CONTABB
//				WHERE CARGAB='C'
//				GROUP BY SUBSTR(CODCTA,1,1)
//				UNION
//				SELECT SUBSTR(CODCTA,1,3) AS CUENTA,SUM(SALANT) AS SALDO
//				FROM CONTABB
//				WHERE CARGAB='C'
//				GROUP BY SUBSTR(CODCTA,1,3)
//				UNION
//				SELECT SUBSTR(CODCTA,1,7) AS CUENTA,SUM(SALANT) AS SALDO
//				FROM CONTABB
//				WHERE CARGAB='C'
//				GROUP BY SUBSTR(CODCTA,1,7)
//				UNION
//				SELECT SUBSTR(CODCTA,1,10) AS CUENTA,SUM(SALANT) AS SALDO
//				FROM CONTABB
//				WHERE CARGAB='C'
//				GROUP BY SUBSTR(CODCTA,1,10)
//				UNION
//				SELECT SUBSTR(CODCTA,1,13) AS CUENTA,SUM(SALANT) AS SALDO
//				FROM CONTABB
//				WHERE CARGAB='C'
//				GROUP BY SUBSTR(CODCTA,1,13)
//				UNION
//				SELECT SUBSTR(CODCTA,1,18) AS CUENTA,SUM(SALANT) AS SALDO
//				FROM CONTABB
//				WHERE CARGAB='C'
//				GROUP BY SUBSTR(CODCTA,1,18));
//
//
//				CREATE OR REPLACE VIEW CONBB1 AS SELECT * FROM CONTABB1 WHERE PEREJE='01';
//				CREATE OR REPLACE VIEW CONBB2 AS SELECT * FROM CONTABB1 WHERE PEREJE='02';
//				CREATE OR REPLACE VIEW CONBB3 AS SELECT * FROM CONTABB1 WHERE PEREJE='03';
//				CREATE OR REPLACE VIEW CONBB4 AS SELECT * FROM CONTABB1 WHERE PEREJE='04';
//				CREATE OR REPLACE VIEW CONBB5 AS SELECT * FROM CONTABB1 WHERE PEREJE='05';
//				CREATE OR REPLACE VIEW CONBB6 AS SELECT * FROM CONTABB1 WHERE PEREJE='06';
//				CREATE OR REPLACE VIEW CONBB7 AS SELECT * FROM CONTABB1 WHERE PEREJE='07';
//				CREATE OR REPLACE VIEW CONBB8 AS SELECT * FROM CONTABB1 WHERE PEREJE='08';
//				CREATE OR REPLACE VIEW CONBB9 AS SELECT * FROM CONTABB1 WHERE PEREJE='09';
//				CREATE OR REPLACE VIEW CONBB10 AS SELECT * FROM CONTABB1 WHERE PEREJE='10';
//				CREATE OR REPLACE VIEW CONBB11 AS SELECT * FROM CONTABB1 WHERE PEREJE='11';
//				CREATE OR REPLACE VIEW CONBB12 AS SELECT * FROM CONTABB1 WHERE PEREJE='12';
//
//				CREATE OR REPLACE VIEW SALDOS_DEBCRE AS (
//				SELECT SUBSTR(A.CODCTA,1,1) AS CUENTA,TO_CHAR(A.FECCOM,'MM') AS PERIODO,SUM(CASE A.DEBCRE WHEN 'D' THEN A.MONASI ELSE 0 END) AS DEBITO,SUM(CASE A.DEBCRE WHEN 'C' THEN A.MONASI ELSE 0 END) AS CREDITO
//				FROM CONTABC1 A,CONTABC B
//				WHERE B.STACOM='A'AND
//				A.NUMCOM=B.NUMCOM AND
//				A.FECCOM=B.FECCOM
//				GROUP BY SUBSTR(CODCTA,1,1),TO_CHAR(A.FECCOM,'MM')
//				UNION
//				SELECT SUBSTR(A.CODCTA,1,3) AS CUENTA,TO_CHAR(A.FECCOM,'MM') AS PERIODO,SUM(CASE A.DEBCRE WHEN 'D' THEN A.MONASI ELSE 0 END) AS DEBITO,SUM(CASE A.DEBCRE WHEN 'C' THEN A.MONASI ELSE 0 END) AS CREDITO
//				FROM CONTABC1 A,CONTABC B
//				WHERE B.STACOM='A'AND
//				A.NUMCOM=B.NUMCOM AND
//				A.FECCOM=B.FECCOM
//				GROUP BY SUBSTR(CODCTA,1,3),TO_CHAR(A.FECCOM,'MM')
//				UNION
//				SELECT SUBSTR(A.CODCTA,1,7) AS CUENTA,TO_CHAR(A.FECCOM,'MM') AS PERIODO,SUM(CASE A.DEBCRE WHEN 'D' THEN A.MONASI ELSE 0 END) AS DEBITO,SUM(CASE A.DEBCRE WHEN 'C' THEN A.MONASI ELSE 0 END) AS CREDITO
//				FROM CONTABC1 A,CONTABC B
//				WHERE B.STACOM='A'AND
//				A.NUMCOM=B.NUMCOM AND
//				A.FECCOM=B.FECCOM
//				GROUP BY SUBSTR(CODCTA,1,7),TO_CHAR(A.FECCOM,'MM')
//				UNION
//				SELECT SUBSTR(A.CODCTA,1,10) AS CUENTA,TO_CHAR(A.FECCOM,'MM') AS PERIODO,SUM(CASE A.DEBCRE WHEN 'D' THEN A.MONASI ELSE 0 END) AS DEBITO,SUM(CASE A.DEBCRE WHEN 'C' THEN A.MONASI ELSE 0 END) AS CREDITO
//				FROM CONTABC1 A,CONTABC B
//				WHERE B.STACOM='A'AND
//				A.NUMCOM=B.NUMCOM AND
//				A.FECCOM=B.FECCOM
//				GROUP BY SUBSTR(CODCTA,1,10),TO_CHAR(A.FECCOM,'MM')
//				UNION
//				SELECT SUBSTR(A.CODCTA,1,13) AS CUENTA,TO_CHAR(A.FECCOM,'MM') AS PERIODO,SUM(CASE A.DEBCRE WHEN 'D' THEN A.MONASI ELSE 0 END) AS DEBITO,SUM(CASE A.DEBCRE WHEN 'C' THEN A.MONASI ELSE 0 END) AS CREDITO
//				FROM CONTABC1 A,CONTABC B
//				WHERE B.STACOM='A'AND
//				A.NUMCOM=B.NUMCOM AND
//				A.FECCOM=B.FECCOM
//				GROUP BY SUBSTR(CODCTA,1,13),TO_CHAR(A.FECCOM,'MM')
//				UNION
//				SELECT SUBSTR(A.CODCTA,1,18) AS CUENTA,TO_CHAR(A.FECCOM,'MM') AS PERIODO,SUM(CASE A.DEBCRE WHEN 'D' THEN A.MONASI ELSE 0 END) AS DEBITO,SUM(CASE A.DEBCRE WHEN 'C' THEN A.MONASI ELSE 0 END) AS CREDITO
//				FROM CONTABC1 A,CONTABC B
//				WHERE B.STACOM='A'AND
//				A.NUMCOM=B.NUMCOM AND
//				A.FECCOM=B.FECCOM
//				GROUP BY SUBSTR(CODCTA,1,18),TO_CHAR(A.FECCOM,'MM'));
//
//				UPDATE CONTABB
//				SET SALANT=SALDOS.SALDO
//				FROM SALDOS
//				WHERE CUENTA=RTRIM(CONTABB.CODCTA);
//
//				UPDATE CONTABB1
//				SET SALACT=CONTABB.SALANT
//				FROM CONTABB
//				WHERE CONTABB.CODCTA=CONTABB1.CODCTA;
//
//				UPDATE CONTABB1
//				SET TOTDEB=SALDOS_DEBCRE.DEBITO,
//				TOTCRE=SALDOS_DEBCRE.CREDITO
//				FROM SALDOS_DEBCRE
//				WHERE SALDOS_DEBCRE.Cuenta=RTRIM(CONTABB1.CODCTA)  AND
//				SALDOS_DEBCRE.PERIODO=CONTABB1.PEREJE;
//
//				update contabb1
//				set salact=salact+totdeb-totcre;
//
//				UPDATE CONTABB1
//				SET SALACT=CONBB1.SALACT+CONTABB1.TOTDEB-CONTABB1.TOTCRE
//				FROM CONBB1
//				WHERE CONBB1.CODCTA=CONTABB1.CODCTA  AND
//				CONTABB1.PEREJE='02';
//
//				UPDATE CONTABB1
//				SET SALACT=CONBB2.SALACT+CONTABB1.TOTDEB-CONTABB1.TOTCRE
//				FROM CONBB2
//				WHERE CONBB2.CODCTA=CONTABB1.CODCTA  AND
//				CONTABB1.PEREJE='03';
//
//				UPDATE CONTABB1
//				SET SALACT=CONBB3.SALACT+CONTABB1.TOTDEB-CONTABB1.TOTCRE
//				FROM CONBB3
//				WHERE CONBB3.CODCTA=CONTABB1.CODCTA  AND
//				CONTABB1.PEREJE='04';
//
//				UPDATE CONTABB1
//				SET SALACT=CONBB4.SALACT+CONTABB1.TOTDEB-CONTABB1.TOTCRE
//				FROM CONBB4
//				WHERE CONBB4.CODCTA=CONTABB1.CODCTA  AND
//				CONTABB1.PEREJE='05';
//
//				UPDATE CONTABB1
//				SET SALACT=CONBB5.SALACT+CONTABB1.TOTDEB-CONTABB1.TOTCRE
//				FROM CONBB5
//				WHERE CONBB5.CODCTA=CONTABB1.CODCTA  AND
//				CONTABB1.PEREJE='06';
//
//				UPDATE CONTABB1
//				SET SALACT=CONBB6.SALACT+CONTABB1.TOTDEB-CONTABB1.TOTCRE
//				FROM CONBB6
//				WHERE CONBB6.CODCTA=CONTABB1.CODCTA  AND
//				CONTABB1.PEREJE='07';
//
//				UPDATE CONTABB1
//				SET SALACT=CONBB7.SALACT+CONTABB1.TOTDEB-CONTABB1.TOTCRE
//				FROM CONBB7
//				WHERE CONBB7.CODCTA=CONTABB1.CODCTA  AND
//				CONTABB1.PEREJE='08';
//
//				UPDATE CONTABB1
//				SET SALACT=CONBB8.SALACT+CONTABB1.TOTDEB-CONTABB1.TOTCRE
//				FROM CONBB8
//				WHERE CONBB8.CODCTA=CONTABB1.CODCTA  AND
//				CONTABB1.PEREJE='09';
//
//				UPDATE CONTABB1
//				SET SALACT=CONBB9.SALACT+CONTABB1.TOTDEB-CONTABB1.TOTCRE
//				FROM CONBB9
//				WHERE CONBB9.CODCTA=CONTABB1.CODCTA  AND
//				CONTABB1.PEREJE='10';
//
//				UPDATE CONTABB1
//				SET SALACT=CONBB10.SALACT+CONTABB1.TOTDEB-CONTABB1.TOTCRE
//				FROM CONBB10
//				WHERE CONBB10.CODCTA=CONTABB1.CODCTA  AND
//				CONTABB1.PEREJE='11';
//
//				UPDATE CONTABB1
//				SET SALACT=CONBB11.SALACT+CONTABB1.TOTDEB-CONTABB1.TOTCRE
//				FROM CONBB11
//				WHERE CONBB11.CODCTA=CONTABB1.CODCTA  AND
//				CONTABB1.PEREJE='12'";
//
//			return $this->bd->select($sql);
//		}

		function Cuerpo()
		{
			$this->setFont("arial","",8);
			/***CUENTAS DEL TESORO***/
			$r=0;
			$canacttes = count($this->arracttes);
			$canpastes = count($this->arrpastes);
			if($canacttes>=$canpastes)
			{
				$arrdato1= $this->arracttes;
				$arrdato2= $this->arrpastes;
				$mayor="ACT";
			}
			else
			{
				$arrdato2= $this->arracttes;
				$arrdato1= $this->arrpastes;
				$mayor="PAS";
			}
			foreach($arrdato1 as $dato)
			{
				//$arrcombinado[$r]=array_merge($this->arracttes[$r],$this->arrpastes[$r]);
				if($r<count($arrdato2))
				{
					$this->rowm(array_merge($this->arracttes[$r],$this->arrpastes[$r]));
					$tot_acttes+=H::FormatoNum($this->arracttes[$r]["salactacttes"]);
					$tot_pastes+=H::FormatoNum($this->arrpastes[$r]["salactpastes"]);
				}
				if($r>=count($arrdato2) && $mayor=='ACT')
				{
					$this->rowm(array_merge($this->arracttes[$r],array("","","")));
					$tot_acttes+=H::FormatoNum($this->arracttes[$r]["salactacttes"]);
				}
				if($r>=count($arrdato2) && $mayor=='PAS')
				{
					$this->rowm(array_merge(array("","",""),$this->arrpastes[$r]));
					$tot_pastes+=H::FormatoNum($this->arrpastes[$r]["salactpastes"]);
				}
				$r++;
			}

			//TOTALES
			if($arrdato1)
			{
				$tot_pastes = H::FormatoNum($this->arrpastes[$r-1]["salactpastes"])+H::FormatoNum($this->arrpastes[$r-2]["salactpastes"]);
				$this->setAutoPageBreak(false);
				$this->setFont("arial","B",9);
				$this->ln(3);
				$this->setlinewidth(0.4);
				$this->line(115,$this->gety(),140,$this->gety());
				$this->line(247,$this->gety(),270,$this->gety());
				$this->row(array("","",H::FormatoMonto($tot_acttes),"","",H::FormatoMonto($tot_pastes)));
				$this->setAutoPageBreak(true,40);
			}


			/***CUENTAS DE LA HACIENDA***/

			$r=0;
			$canacthac = count($this->arracthac);
			$canpashac = count($this->arrpashac);
			if($canacthac>=$canpashac)
			{
				$arrdato1= $this->arracthac;
				$arrdato2= $this->arrpashac;
				$mayor="ACT";
			}
			else
			{
				$arrdato2= $this->arracthac;
				$arrdato1= $this->arrpashac;
				$mayor="PAS";
			}
			if($arrdato1)
			{
				$this->ln(2);
				$this->setTextColor(155,0,0);
				$this->multicell(260,5,'CUENTAS DE LA HACIENDA',0,'C');
				$this->ln(2);
				$this->setTextColor(0,0,0);
				$this->setFont("arial","",8);
			}
			foreach($arrdato1 as $dato)
			{
				//$arrcombinado[$r]=array_merge($this->arracttes[$r],$this->arrpastes[$r]);
				if($r<count($arrdato2))
				{
					$this->rowm(array_merge($this->arracthac[$r],$this->arrpashac[$r]));
					$tot_acthac+=H::FormatoNum($this->arracthac[$r]["salactacthac"]);
					$tot_pashac+=H::FormatoNum($this->arrpashac[$r]["salactpashac"]);
					$tot_gen_hac+=H::FormatoNum($this->arracthac[$r]["salactacthac"]);
					$tot_gen_hac2+=H::FormatoNum($this->arrpashac[$r]["salactpashac"]);
				}
				if($r>=count($arrdato2) && $mayor=='ACT')
				{
					$this->rowm(array_merge($this->arracthac[$r],array("","","")));
					$tot_acthac+=H::FormatoNum($this->arracthac[$r]["salactacthac"]);
					$tot_gen_hac+=H::FormatoNum($this->arracthac[$r]["salactacthac"]);
				}
				if($r>=count($arrdato2) && $mayor=='PAS')
				{
					$this->rowm(array_merge(array("","",""),$this->arrpashac[$r]));
					$tot_pashac+=H::FormatoNum($this->arrpashac[$r]["salactpashac"]);
					$tot_gen_hac2+=H::FormatoNum($this->arrpashac[$r]["salactpashac"]);
				}
				$r++;
			}
			if($arrdato1)
			{
				//TOTALES
				$this->setAutoPageBreak(false);
				$this->setFont("arial","B",9);
				$this->ln(3);
				$this->setlinewidth(0.4);
				$this->line(115,$this->gety(),140,$this->gety());
				$this->line(247,$this->gety(),270,$this->gety());
				$this->row(array("","",H::FormatoMonto($tot_acthac),"","",H::FormatoMonto($tot_pashac)));
				$this->setAutoPageBreak(true,40);
			}

			/***CUENTAS DE LA PRESUPUESTO***/

			$r=0;
			$canactpre = count($this->arractpre);
			$caningpre = count($this->arringpre);
			if($canactpre>=$caningpre)
			{
				$arrdato1= $this->arractpre;
				$arrdato2= $this->arringpre;
				$mayor="ACT";
			}
			else
			{
				$arrdato2= $this->arractpre;
				$arrdato1= $this->arringpre;
				$mayor="PAS";
			}
			if($arrdato1)
			{
				$this->ln(2);
				$this->setTextColor(155,0,0);
				$this->multicell(260,5,'CUENTAS DEL PRESUPUESTO',0,'C');
				$this->ln(2);
				$this->setTextColor(0,0,0);
				$this->setFont("arial","",8);
			}
			foreach($arrdato1 as $dato)
			{
				//$arrcombinado[$r]=array_merge($this->arracttes[$r],$this->arrpastes[$r]);
				if($r<count($arrdato2))
				{
					$this->rowm(array_merge($this->arractpre[$r],$this->arringpre[$r]));
					$tot_actpre+=H::FormatoNum($this->arractpre[$r]["salactactpre"]);
					$tot_ingpre+=H::FormatoNum($this->arringpre[$r]["salactingpre"]);
					$tot_gen_hac+=H::FormatoNum($this->arractpre[$r]["salactactpre"]);
					$tot_gen_hac2+=H::FormatoNum($this->arringpre[$r]["salactingpre"]);
				}
				if($r>=count($arrdato2) && $mayor=='ACT')
				{
					$this->rowm(array_merge($this->arractpre[$r],array("","","")));
					$tot_actpre+=H::FormatoNum($this->arractpre[$r]["salactactpre"]);
					$tot_gen_hac+=H::FormatoNum($this->arractpre[$r]["salactactpre"]);
				}
				if($r>=count($arrdato2) && $mayor=='PAS')
				{
					$this->rowm(array_merge(array("","",""),$this->arringpre[$r]));
					$tot_ingpre+=H::FormatoNum($this->arringpre[$r]["salactingpre"]);
					$tot_gen_hac2+=H::FormatoNum($this->arringpre[$r]["salactingpre"]);
				}
				$r++;
			}
			if($arrdato1)
			{
				//TOTALES
				$this->setAutoPageBreak(false);
				$this->setFont("arial","B",9);
				$this->ln(3);
				$this->setlinewidth(0.4);
				$this->line(115,$this->gety(),140,$this->gety());
				$this->line(247,$this->gety(),270,$this->gety());
				$this->row(array("","",H::FormatoMonto($tot_actpre),"","",H::FormatoMonto($tot_ingpre)));
				$this->ln(3);
				$this->line(115,$this->gety(),140,$this->gety());
				$this->line(247,$this->gety(),270,$this->gety());
				$this->row(array("","",H::FormatoMonto($tot_gen_hac),"","",H::FormatoMonto($tot_gen_hac2)));
				$this->setAutoPageBreak(true,40);
			}


			/***CUENTAS DE ORDER***/

			$r=0;
			$canctaorddeu = count($this->arrctaorddeu);
			$canctaordacr = count($this->arrctaordacr);
			if($canctaorddeu>=$canctaordacr)
			{
				$arrdato1= $this->arrctaorddeu;
				$arrdato2= $this->arrctaordacr;
				$mayor="ACT";
			}
			else
			{
				$arrdato2= $this->arrctaorddeu;
				$arrdato1= $this->arrctaordacr;
				$mayor="PAS";
			}
			if($arrdato1)
			{
				$this->ln(2);
				$this->setTextColor(155,0,0);
				$this->multicell(260,5,'CUENTAS DE ORDEN',0,'C');
				$this->ln(2);
				$this->setTextColor(0,0,0);
				$this->setFont("arial","",8);
			}
			foreach($arrdato1 as $dato)
			{
				//$arrcombinado[$r]=array_merge($this->arracttes[$r],$this->arrpastes[$r]);
				if($r<count($arrdato2))
				{
					$this->rowm(array_merge($this->arrctaorddeu[$r],$this->arrctaordacr[$r]));
					$tot_ctaorddeu+=H::FormatoNum($this->arrctaorddeu[$r]["salactctaorddeu"]);
					$tot_ctaordacr+=H::FormatoNum($this->arrctaordacr[$r]["salactctaordacr"]);
				}
				if($r>=count($arrdato2) && $mayor=='ACT')
				{
					$this->rowm(array_merge($this->arrctaorddeu[$r],array("","","")));
					$tot_ctaorddeu+=H::FormatoNum($this->arrctaorddeu[$r]["salactctaorddeu"]);
				}
				if($r>=count($arrdato2) && $mayor=='PAS')
				{
					$this->rowm(array_merge(array("","",""),$this->arrctaordacr[$r]));
					$tot_ctaordacr+=H::FormatoNum($this->arrctaordacr[$r]["salactctaordacr"]);
				}
				$r++;
			}
			if($arrdato1)
			{
				//TOTALES
				$this->setAutoPageBreak(false);
				$this->setFont("arial","B",9);
				$this->ln(3);
				$this->setlinewidth(0.4);
				$this->line(115,$this->gety(),140,$this->gety());
				$this->line(247,$this->gety(),270,$this->gety());
				$this->row(array("","",H::FormatoMonto($tot_ctaorddeu),"","",H::FormatoMonto($tot_ctaordacr)));
			}
			$this->setAutoPageBreak(false);
			$this->ln(10);
			$this->setAligns(array("","C","","","C",""));
			$this->rowm(array("","$this->diradm \n Director general de Finanzas Publicas","","","$this->jefadm  \n Jefe de Departamento de Contabilidad General",""));


		}
	}
?>