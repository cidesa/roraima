<?php
require_once("../../lib/modelo/baseClases.class.php");
class Libranza extends baseClases
{
  function sqlp($codigodesde,$codigohasta,$perdesde,$perhasta,$anopresu,$filtro)
  {
  	 $sql="select a.codpre as codpreasiini,a.nompre as nompreasiini,sum(a.monasi) as monasi
          from cpasiini a, cpdefniv b
          where a.codpre>= ('".$codigodesde."' ) and
          a.codpre<= ('".$codigohasta."' ) and
          a.perpre >= '".$perdesde."' and
          a.perpre <= '".$perhasta."' and
          a.anopre = '".$anopresu."' and
          a.codpre like  (('".$filtro."')) and
          b.codemp='001' group by a.codpre,a.nompre order by codpreasiini";
   return $this->select($sql);
  }

  function sql_cpasiini($codigodesde,$codigohasta,$perdesde,$perhasta,$filtro)
  {
  	$sql="select DISTINCT(A.Codpre) as CODPRE, A.Nompre as NOMPRE
	  		FROM CPASIINI A, CPDEFNIV B
	  		WHERE A.CODPRE>= ('".$codigodesde."' ) and
	        A.CODPRE<= ('".$codigohasta."' ) and
	        A.PERPRE >= '".$perdesde."' AND
	        A.PERPRE <= '".$perhasta."' AND
	        (A.ANOPRE = TO_CHAR(B.FECINI,'YYYY') OR  A.ANOPRE = TO_CHAR(B.FECCIE,'YYYY')) AND
	        A.CODPRE LIKE  ('".$filtro."') and	B.CODEMP='001'";
    return $this->select($sql);
  }

  function sql_cpdefniv()
  {
  	$sql="SELECT B.FECINI as fechaini,B.FECCIE as fechacie FROM CPDEFNIV B	WHERE B.CODEMP='001'";
  	return $this->select($sql);
  }

  function sql_cppereje($periodo)
  {
  	$sql="SELECT A.FECDES as FECINI, a.FECHAS as FECCIE FROM CPPEREJE A,CPDEFNIV B
      	  WHERE
          B.CODEMP='001' AND
          A.PEREJE='".$periodo."' AND
          A.FECINI=B.FECINI AND
          A.FECCIE=B.FECCIE";
  	return $this->select($sql);
  }


  function sql_consolidado_nuevo()
  {
  	$sql="truncate consolidado_nuevo; commit;";
  	$this->actualizar($sql);
  }

  function generaconsolidado($codpre,$nompre,$fecha_ini,$fecha_cie)
  {
    //Precompromisos
    $sql_cpimpprc="insert into CONSOLIDADO_NUEVO (IDENTI,TIPMOV,REFPRC,REFCOM,REFCAU,REFPAG,FECMOV,CEDRIF,MONMOV,DESMOV,AFEDIS)
 		 (SELECT 'EEE',B.TIPPRC,B.REFPRC,'NULO','NULO','NULO',B.FECPRC,B.CEDRIF,A.MONIMP,B.DESPRC,'R'
			FROM CPIMPPRC A,CPPRECOM B
			WHERE
			A.CODPRE =  ('".$codpre."' ) AND
			B.FECPRC>='".$fecha_ini."' AND
			B.FECPRC<='".$fecha_cie."' AND (A.STAIMP='A' OR (A.STAIMP='N' AND B.FECANU>'".$fecha_cie."'))  AND
			A.REFPRC = B.REFPRC)";
		//print $sql_cpimpprc; exit;
	$this->actualizar($sql_cpimpprc);

	//Compromisos
	$sql_cpimpcom="insert into CONSOLIDADO_NUEVO (IDENTI,TIPMOV,REFPRC,REFCOM,REFCAU,REFPAG,FECMOV,CEDRIF,MONMOV,DESMOV,AFEDIS)
		 (SELECT 'FFF',B.TIPCOM,A.REFERE,B.REFCOM,'NULO','NULO',B.FECCOM,B.CEDRIF,A.MONIMP,B.DESCOM,C.AFEDIS
			FROM CPIMPCOM A,CPCOMPRO B, CPDOCCOM C
			WHERE
			A.CODPRE =  ('".$codpre."' ) AND
			B.FECCOM >= '".$fecha_ini."' AND
			B.FECCOM <= '".$fecha_cie."' AND
			A.REFCOM = B.REFCOM AND
			C.TIPCOM=B.TIPCOM)";
			//print $sql_cpimpcom; exit;
    $this->actualizar($sql_cpimpcom);

    //Compromisos Anulados
    $sql_cpimpcomanu="insert into CONSOLIDADO_NUEVO (IDENTI,TIPMOV,REFPRC,REFCOM,REFCAU,REFPAG,FECMOV,CEDRIF,MONMOV,DESMOV,AFEDIS)
				 (SELECT 'FFG',B.TIPCOM,A.REFERE,B.REFCOM,'NULO','NULO',B.FECANU,B.CEDRIF,A.MONIMP*(-1),B.DESCOM,C.AFEDIS
				 FROM CPIMPCOM A,CPCOMPRO B, CPDOCCOM C
				 WHERE
		         A.CODPRE =  ('".$codpre."' ) AND
		         B.FECANU >= '".$fecha_ini."' AND
		         B.FECANU <= '".$fecha_cie."' AND
	             A.REFCOM = B.REFCOM AND
			     C.TIPCOM=B.TIPCOM)";
    $this->actualizar($sql_cpimpcomanu);

    //Causados
    $sql_cpimpcau="insert into CONSOLIDADO_NUEVO (IDENTI,TIPMOV,REFPRC,REFCOM,REFCAU,REFPAG,FECMOV,CEDRIF,MONMOV,DESMOV,AFEDIS)
			(SELECT  'GGG',B.TIPCAU,A.REFPRC,A.REFERE,B.REFCAU,'NULO',B.FECCAU,B.CEDRIF,A.MONIMP,B.DESCAU,C.AFEDIS
	 		FROM CPIMPCAU A,CPCAUSAD B, CPDOCCAU C
	 		WHERE
	        A.CODPRE =  ('".$codpre."' ) AND
	        B.FECCAU>='".$fecha_ini."' AND
	        B.FECCAU<='".$fecha_cie."' AND
            A.REFCAU = B.REFCAU AND
		    C.TIPCAU=B.TIPCAU)";
    $this->actualizar($sql_cpimpcau);

    //Causados Anulados
    $sql_cpimpcauanu="insert into CONSOLIDADO_NUEVO (IDENTI,TIPMOV,REFPRC,REFCOM,REFCAU,REFPAG,FECMOV,CEDRIF,MONMOV,DESMOV,AFEDIS)
			(SELECT  'GGH',B.TIPCAU,A.REFPRC,A.REFERE,B.REFCAU,'NULO',B.FECANU,B.CEDRIF,A.MONIMP*(-1),B.DESCAU,C.AFEDIS
	 		FROM CPIMPCAU A,CPCAUSAD B, CPDOCCAU C
	 		WHERE
	        A.CODPRE =  ('".$codpre."' ) AND
	        B.FECANU>='".$fecha_ini."' AND
	        B.FECANU<='".$fecha_cie."' AND
            A.REFCAU = B.REFCAU AND
		    C.TIPCAU=B.TIPCAU)";
    $this->actualizar($sql_cpimpcauanu);

    //Pagados
    $sql_cpimppag="insert into CONSOLIDADO_NUEVO (IDENTI,TIPMOV,REFPRC,REFCOM,REFCAU,REFPAG,FECMOV,CEDRIF,MONMOV,DESMOV,AFEDIS)
			(SELECT  'HHH',B.TIPPAG,A.REFPRC,A.REFCOM,A.REFERE,B.REFPAG,B.FECPAG,B.CEDRIF,A.MONIMP,B.DESPAG,C.AFEDIS
	 		FROM CPIMPPAG A,CPPAGOS B,CPDOCPAG C
	 		WHERE
	        A.CODPRE =  ('".$codpre."' ) AND
	        B.FECPAG>='".$fecha_ini."' AND
	        B.FECPAG<='".$fecha_cie."' AND
            A.REFPAG = B.REFPAG AND
		    C.TIPPAG=B.TIPPAG)";
    $this->actualizar($sql_cpimppag);

    //Pagados Anulados
    $sql_cpimppaganu="insert into CONSOLIDADO_NUEVO (IDENTI,TIPMOV,REFPRC,REFCOM,REFCAU,REFPAG,FECMOV,CEDRIF,MONMOV,DESMOV,AFEDIS)
			(SELECT  'HHI',B.TIPPAG,A.REFPRC,A.REFCOM,A.REFERE,B.REFPAG,B.FECANU,B.CEDRIF,A.MONIMP*(-1),B.DESPAG,C.AFEDIS
	 		FROM CPIMPPAG A,CPPAGOS B,CPDOCPAG C
	 		WHERE
	        A.CODPRE =  ('".$codpre."' ) AND
	        B.FECANU>='".$fecha_ini."' AND
	        B.FECANU<='".$fecha_cie."' AND
            A.REFPAG = B.REFPAG AND
		    C.TIPPAG=B.TIPPAG)";
    $this->actualizar($sql_cpimppaganu);

/*INI ajustes*/

    //Ajustes Precompromisos
    $sql_cpmovajupre="insert into CONSOLIDADO_NUEVO (IDENTI,TIPMOV,REFPRC,REFCOM,REFCAU,REFPAG,FECMOV,CEDRIF,MONMOV,DESMOV,AFEDIS)
			(SELECT 'EEI',B.TIPAJU,B.REFERE,'NULO','NULO','NULO',B.FECAJU,' ',A.MONAJU*-1,B.DESAJU,'R'
	 		FROM CPMOVAJU A,CPAJUSTE B,CPDOCAJU C
	 		WHERE
	        A.CODPRE =  ('".$codpre."' ) AND
	        B.FECAJU >= '".$fecha_ini."' AND
	        B.FECAJU <= '".$fecha_cie."' AND
            C.REFIER='P' AND
            A.REFAJU = B.REFAJU AND
	        C.TIPAJU=B.TIPAJU)";
    $this->actualizar($sql_cpmovajupre);//print $sql_cpmovajupre;exit;

    //Ajustes Compromisos
    $sql_cpmovajucom="insert into CONSOLIDADO_NUEVO (IDENTI,TIPMOV,REFPRC,REFCOM,REFCAU,REFPAG,FECMOV,CEDRIF,MONMOV,DESMOV,AFEDIS)
			(SELECT 'FFI',B.TIPAJU,'NULO',B.REFERE,'NULO','NULO',B.FECAJU,' ',A.MONAJU*-1,B.DESAJU,E.AFEDIS
	 		FROM CPMOVAJU A,CPAJUSTE B,CPDOCAJU C,CPCOMPRO D,CPDOCCOM E
	 		WHERE
	        A.CODPRE =  ('".$codpre."' ) AND
	        B.FECAJU >= '".$fecha_ini."' AND
	        B.FECAJU <= '".$fecha_cie."' AND
            C.REFIER='C' AND
            A.REFAJU = B.REFAJU AND
		    D.REFCOM = B.REFERE AND
	        C.TIPAJU=B.TIPAJU AND
		    D.TIPCOM=E.TIPCOM)";
    $this->actualizar($sql_cpmovajucom);

    //Ajustes Causados
    $sql_cpmovajucau="insert into CONSOLIDADO_NUEVO (IDENTI,TIPMOV,REFPRC,REFCOM,REFCAU,REFPAG,FECMOV,CEDRIF,MONMOV,DESMOV,AFEDIS)
				(SELECT 'GGI',B.TIPAJU,'NULO','NULO',B.REFERE,'NULO',B.FECAJU,' ',A.MONAJU*-1,B.DESAJU,E.AFEDIS
				FROM CPMOVAJU A,CPAJUSTE B,CPDOCAJU C,CPCAUSAD D,CPDOCCAU E
				WHERE
				A.CODPRE =  ('".$codpre."' ) AND
				B.FECAJU >= '".$fecha_ini."' AND
				B.FECAJU <= '".$fecha_cie."' AND
				C.REFIER='A' AND
				A.REFAJU = B.REFAJU AND
				D.REFCAU = B.REFERE AND
				C.TIPAJU=B.TIPAJU AND
				D.TIPCAU=E.TIPCAU)";
    $this->actualizar($sql_cpmovajucau);

    //Ajustes Pagados
    $sql_cpmovajupag="insert into CONSOLIDADO_NUEVO (IDENTI,TIPMOV,REFPRC,REFCOM,REFCAU,REFPAG,FECMOV,CEDRIF,MONMOV,DESMOV,AFEDIS)
		(SELECT 'HHA',B.TIPAJU,'NULO','NULO','NULO',B.REFERE,B.FECAJU,' ',A.MONAJU*-1,B.DESAJU,E.AFEDIS
		FROM CPMOVAJU A,CPAJUSTE B,CPDOCAJU C,CPPAGOS D,CPDOCPAG E
		WHERE
		A.CODPRE =  ('".$codpre."' ) AND
		B.FECAJU >= '".$fecha_ini."' AND
		B.FECAJU <= '".$fecha_cie."' AND
		C.REFIER='G' AND
		A.REFAJU = B.REFAJU AND
		D.REFPAG = B.REFERE AND
		C.TIPAJU=B.TIPAJU AND
		D.TIPPAG=E.TIPPAG)";
    $this->actualizar($sql_cpmovajupag);

    //Ajustes Precompromisos Anulados
    $sql_cpmovajupreanu="insert into CONSOLIDADO_NUEVO (IDENTI,TIPMOV,REFPRC,REFCOM,REFCAU,REFPAG,FECMOV,CEDRIF,MONMOV,DESMOV,AFEDIS)
		(SELECT 'EEN',B.TIPAJU,B.REFERE,'NULO','NULO','NULO',B.FECANU,' ',A.MONAJU,B.DESAJU,'R'
		FROM CPMOVAJU A,CPAJUSTE B,CPDOCAJU C
		WHERE
	        A.CODPRE =  ('".$codpre."' ) AND
	        B.FECANU >= '".$fecha_ini."' AND
	        B.FECANU <= '".$fecha_cie."' AND
            C.REFIER='P' AND
            A.REFAJU = B.REFAJU AND
	        C.TIPAJU=B.TIPAJU)";
    $this->actualizar($sql_cpmovajupreanu);

    //Ajustes Compromisos Anulados
    $sql_cpmovajucomanu="insert into CONSOLIDADO_NUEVO (IDENTI,TIPMOV,REFPRC,REFCOM,REFCAU,REFPAG,FECMOV,CEDRIF,MONMOV,DESMOV,AFEDIS)
			(SELECT 'FFN',B.TIPAJU,'NULO',B.REFERE,'NULO','NULO',B.FECANU,' ',A.MONAJU,B.DESAJU,E.AFEDIS
			FROM CPMOVAJU A,CPAJUSTE B,CPDOCAJU C,CPCOMPRO D,CPDOCCOM E
			WHERE
	        A.CODPRE =  ('".$codpre."' ) AND
	        B.FECANU >= '".$fecha_ini."' AND
	        B.FECANU <= '".$fecha_cie."' AND
            C.REFIER='P' AND
            A.REFAJU = B.REFAJU AND
		    D.REFCOM = B.REFERE AND
	        C.TIPAJU=B.TIPAJU AND
		    D.TIPCOM=E.TIPCOM)";
    $this->actualizar($sql_cpmovajucomanu);

    //Ajustes Causados Anulados
    $sql_cpmovajucauanu="insert into CONSOLIDADO_NUEVO (IDENTI,TIPMOV,REFPRC,REFCOM,REFCAU,REFPAG,FECMOV,CEDRIF,MONMOV,DESMOV,AFEDIS)
		(SELECT 'GGN',B.TIPAJU,'NULO','NULO',B.REFERE,'NULO',B.FECANU,' ',A.MONAJU,B.DESAJU,E.AFEDIS
		FROM CPMOVAJU A,CPAJUSTE B,CPDOCAJU C,CPCAUSAD D,CPDOCCAU E
		WHERE
	        A.CODPRE =  ('".$codpre."' ) AND
	        B.FECANU >= '".$fecha_ini."' AND
	        B.FECANU <= '".$fecha_cie."' AND
            C.REFIER='A' AND
            A.REFAJU = B.REFAJU AND
		    D.REFCAU = B.REFERE AND
	        C.TIPAJU=B.TIPAJU AND
		    D.TIPCAU=E.TIPCAU)";

    $this->actualizar($sql_cpmovajucauanu);

    //Ajustes Pagados Anulados
    $sql_cpmovajupaganu="insert into CONSOLIDADO_NUEVO (IDENTI,TIPMOV,REFPRC,REFCOM,REFCAU,REFPAG,FECMOV,CEDRIF,MONMOV,DESMOV,AFEDIS)
			(SELECT 'HHN',B.TIPAJU,'NULO','NULO','NULO',B.REFERE,B.FECANU,' ',A.MONAJU,B.DESAJU,E.AFEDIS
	 		FROM CPMOVAJU A,CPAJUSTE B,CPDOCAJU C,CPPAGOS D,CPDOCPAG E
	 		WHERE
	        A.CODPRE =  ('".$codpre."' ) AND
	        B.FECANU >= '".$fecha_ini."' AND
	        B.FECANU <= '".$fecha_cie."' AND
            C.REFIER='G' AND
            A.REFAJU = B.REFAJU AND
		    D.REFPAG = B.REFERE AND
	        C.TIPAJU=B.TIPAJU AND
		    D.TIPPAG=E.TIPPAG)";
    $this->actualizar($sql_cpmovajupaganu);

/*fin ajustes*/

    //Traslados Negativos
    $sql_cpmovtraneg="insert into CONSOLIDADO_NUEVO (IDENTI,TIPMOV,REFPRC,REFCOM,REFCAU,REFPAG,FECMOV,CEDRIF,MONMOV,DESMOV,AFEDIS)
			(SELECT 'MMM','TRA-',B.REFTRA,'NULO','NULO','NULO',B.FECTRA,' ',sum(A.MONMOV),B.DESTRA,'R'
 			FROM CPMOVTRA A,CPTRASLA B
 			WHERE
      		A.CODORI =  ('".$codpre."' ) AND
       		B.FECTRA >= '".$fecha_ini."' AND
       		B.FECTRA <= '".$fecha_cie."' AND
            A.REFTRA = B.REFTRA
            group by B.REFTRA,B.FECTRA,B.DESTRA)";
    $this->actualizar($sql_cpmovtraneg);

    //Traslados Negativos Anulados
    $sql_cpmovtraneganu="insert into CONSOLIDADO_NUEVO (IDENTI,TIPMOV,REFPRC,REFCOM,REFCAU,REFPAG,FECMOV,CEDRIF,MONMOV,DESMOV,AFEDIS)
			(SELECT 'DDD','TRA-',B.REFTRA,'NULO','NULO','NULO',B.FECANU,' ',sum(A.MONMOV),B.DESTRA,'R'
 			FROM CPMOVTRA A,CPTRASLA B
 			WHERE
      		A.CODORI =  ('".$codpre."' ) AND
       		B.FECANU >= '".$fecha_ini."' AND
       		B.FECANU <= '".$fecha_cie."' AND
            A.REFTRA = B.REFTRA
            group by B.REFTRA,B.FECTRA,B.DESTRA)";
    $this->actualizar($sql_cpmovtraneganu);

    //Traslados Positivos
    $sql_cpmovtrapos="insert into CONSOLIDADO_NUEVO (IDENTI,TIPMOV,REFPRC,REFCOM,REFCAU,REFPAG,FECMOV,CEDRIF,MONMOV,DESMOV,AFEDIS)
			(SELECT 'BBB','TRA+',B.REFTRA,'NULO','NULO','NULO',B.FECTRA,' ',sum(A.MONMOV),B.DESTRA,'S'
	 		FROM CPMOVTRA A,CPTRASLA B
	 		WHERE
	        A.CODDES =  ('".$codpre."' ) AND
	        B.FECTRA >= '".$fecha_ini."' AND
	        B.FECTRA <= '".$fecha_cie."'  and
             A.REFTRA = B.REFTRA
            group by B.REFTRA,B.FECTRA,B.DESTRA)";
    $this->actualizar($sql_cpmovtrapos);

    //Traslados Positivos Anulados
    $sql_cpmovtraposanu="insert into CONSOLIDADO_NUEVO (IDENTI,TIPMOV,REFPRC,REFCOM,REFCAU,REFPAG,FECMOV,CEDRIF,MONMOV,DESMOV,AFEDIS)
			(SELECT 'BBB','TRA+',B.REFTRA,'NULO','NULO','NULO',B.FECANU,' ',sum(A.MONMOV),B.DESTRA,'S'
	 		FROM CPMOVTRA A,CPTRASLA B
	 		WHERE
	        A.CODDES =  ('".$codpre."' ) AND
	        B.FECANU>= '".$fecha_ini."' AND
	        B.FECANU <= '".$fecha_cie."' AND
            A.REFTRA = B.REFTRA
            group by B.REFTRA,B.FECTRA,B.DESTRA)";
    $this->actualizar($sql_cpmovtraposanu);

    //Adiciones
    $sql_cpmovadi="insert into CONSOLIDADO_NUEVO (IDENTI,TIPMOV,REFPRC,REFCOM,REFCAU,REFPAG,FECMOV,CEDRIF,MONMOV,DESMOV,AFEDIS)
		(SELECT 'AAA','ADI',B.REFADI,'NULO','NULO','NULO',B.FECADI,' ',A.MONMOV,B.DESADI,'S'
 		FROM CPMOVADI A,CPADIDIS B
 		WHERE
        A.CODPRE =  ('".$codpre."' ) AND
        B.FECADI >= '".$fecha_ini."' AND
        B.FECADI <= '".$fecha_cie."'  AND B.ADIDIS='A' AND
        A.REFADI = B.REFADI)";
    $this->actualizar($sql_cpmovadi);

    //Adiciones Anuladas
    $sql_cpmovadianu="insert into CONSOLIDADO_NUEVO (IDENTI,TIPMOV,REFPRC,REFCOM,REFCAU,REFPAG,FECMOV,CEDRIF,MONMOV,DESMOV,AFEDIS)
		(SELECT 'AAB','ADI',B.REFADI,'NULO','NULO','NULO',B.FECANU,' ',A.MONMOV,B.DESADI,'S'
 		FROM CPMOVADI A,CPADIDIS B
 		WHERE
        A.CODPRE =  ('".$codpre."' ) AND
        B.FECANU >= '".$fecha_ini."' AND
        B.FECANU <= '".$fecha_cie."'  AND B.ADIDIS='A' AND A.REFADI = B.REFADI)";
    $this->actualizar($sql_cpmovadianu);

    //Disminuciones
    $sql_cpmovadidis="insert into CONSOLIDADO_NUEVO (IDENTI,TIPMOV,REFPRC,REFCOM,REFCAU,REFPAG,FECMOV,CEDRIF,MONMOV,DESMOV,AFEDIS)
		(SELECT 'MMM','DIM',B.REFADI,'NULO','NULO','NULO',B.FECADI,' ',A.MONMOV,B.DESADI,'R'
 		FROM CPMOVADI A,CPADIDIS B
 		WHERE
        A.CODPRE =  ('".$codpre."' ) AND
        B.FECADI >= '".$fecha_ini."' AND
        B.FECADI <= '".$fecha_cie."' AND
        B.ADIDIS='D' AND
        A.REFADI = B.REFADI)";
    $this->actualizar($sql_cpmovadidis);

    //Disminuciones Anuladas
    $sql_cpmovadidisanu="insert into CONSOLIDADO_NUEVO (IDENTI,TIPMOV,REFPRC,REFCOM,REFCAU,REFPAG,FECMOV,CEDRIF,MONMOV,DESMOV,AFEDIS)
		(SELECT 'MMN','DIM',B.REFADI,'NULO','NULO','NULO',B.FECANU,' ',A.MONMOV,B.DESADI,'R'
 		FROM CPMOVADI A,CPADIDIS B
 		WHERE
        A.CODPRE =  ('".$codpre."' ) AND
        B.FECANU >= '".$fecha_ini."' AND
        B.FECANU <= '".$fecha_cie."' AND
        B.ADIDIS='D' AND
        A.REFADI = B.REFADI)";
    $this->actualizar($sql_cpmovadidisanu);

    //Update Final
    $sql_consolidado_nuevo="UPDATE CONSOLIDADO_NUEVO SET CODPRE= ('".$codpre."' ),NOMPRE='".$nompre."' WHERE CODPRE IS NULL;
  			COMMIT;";
    $this->actualizar($sql_consolidado_nuevo);

  }

  function enletras2($mes)
  {
	if($mes==01)
	{
	  $mesletras='Enero';
	}
	else if($mes==02)
	{
	  $mesletras='Febrero';
	}
	else if($mes==03)
	{
	  $mesletras='Marzo';
	}
	else if($mes==04)
	{
	  $mesletras='Abril';
	}
	else if($mes==05)
	{
	  $mesletras='Mayo';
	}
	else if($mes==06)
	{
	  $mesletras='Junio';
	}
	else if($mes==07)
	{
	  $mesletras='Julio';
	}
	else if($mes==08)
	{
	  $mesletras='Agosto';
	}
	else if($mes==09)
	{
	  $mesletras='Septiembre';
	}
	else if($mes==10)
	{
	  $mesletras='Octubre';
	}
	else if($mes==11)
	{
	  $mesletras='Noviembre';
	}
	else if($mes==12)
	{
	  $mesletras='Diciembre';
	}
  return $mesletras;
  }

  function sql_cuerpo_cpasiini($codpre,$filtro)
  {
  	$sql="SELECT MONASI as ASIGNA
		  FROM CPASIINI
		  WHERE CODPRE= ('".$codpre."' ) AND PERPRE='00' and  codpre like  (('".$filtro."'))";
		  //print $sql; exit;
    return $this->select($sql);


  }

function sql_cuerpo_disponibilidad($codpre,$ano,$filtro)
  {
  	$sql="SELECT SUM(MONASI +
COALESCE(obtener_ejecucion( (codpre),'01','12','".$ano."','TRA'),0) +
COALESCE(obtener_ejecucion( (codpre),'01','12','".$ano."','ADI'),0) -
COALESCE(obtener_ejecucion( (codpre),'01','12','".$ano."','TRN'),0) -
COALESCE(obtener_ejecucion( (codpre),'01','12','".$ano."','DIS'),0) -
COALESCE(obtener_ejecucion( (codpre),'01','12','".$ano."','PRC'),0)) AS MONDIS
from CPAsiIni where  (CodPre) =  ('".$codpre."') and AnoPre='2008' and PerPre='00' and a.codpre like  (('".$filtro."'))";

    return $this->select($sql);


  }

  function sql_cuerpo_cpmovtrapos($codpre,$perdesde,$perhasta)
  {
    $sql="SELECT coalesce(SUM(A.MONMOV),0) AS TRA_DES FROM CPMOVTRA A, CPTRASLA B
          WHERE
          A.CODDES= ('".$codpre."' ) AND
          B.PERTRA<'".$perdesde."' AND
          (B.STATRA='A' OR (B.STATRA='N' AND SUBSTR(TO_CHAR(B.FECANU,'DD-MM-YYYY'),4,2)>'".$perhasta."')) AND
          A.REFTRA=B.REFTRA";
    return $this->select($sql);
  }

  function sql_cuerpo_cpmovtraneg($codpre,$perdesde,$perhasta)
  {
  	$sql="SELECT coalesce(SUM(A.MONMOV),0) as TRA_ORI FROM CPMOVTRA A, CPTRASLA B
          WHERE
          A.CODORI= ('".$codpre."' ) AND
          B.PERTRA<'".$perdesde."' AND
          (B.STATRA='A' OR (B.STATRA='N' AND SUBSTR(TO_CHAR(B.FECANU,'DD-MM-YYYY'),4,2)>'".$perhasta."')) AND
          A.REFTRA=B.REFTRA";
    return $this->select($sql);
  }

  function sql_cuerpo_cpmovadi($codpre,$perdesde,$perhasta)
  {
  	$sql="SELECT coalesce(SUM(A.MONMOV),0) as TOTAL_ADI FROM CPMOVADI A, CPADIDIS B
          WHERE
          A.CODPRE= ('".$codpre."' ) AND
          A.PERPRE<'".$perdesde."' AND
          (B.STAADI='A' OR (B.STAADI='N' AND SUBSTR(TO_CHAR(B.FECANU,'DD-MM-YYYY'),4,2)>'".$perhasta."')) AND
          B.ADIDIS='A' AND
          A.REFADI=B.REFADI";
    return $this->select($sql);
  }

  function sql_cuerpo_cpmovadidis($codpre,$perdesde,$perhasta)
  {
  	$sql="SELECT coalesce(SUM(A.MONMOV),0) as TOTAL_DIS FROM CPMOVADI A, CPADIDIS B
          WHERE
          A.CODPRE= ('".$codpre."' ) AND
          A.PERPRE<'".$perdesde."' AND
          (B.STAADI='A' OR (B.STAADI='N' AND SUBSTR(TO_CHAR(B.FECANU,'DD-MM-YYYY'),4,2)>'".$perhasta."')) AND
          B.ADIDIS='D' AND
          A.REFADI=B.REFADI";
    return $this->select($sql);

  }

  function sql_cuerpo_cpimpcom($codpre,$perdesde,$perhasta)
  {
  	$sql="SELECT coalesce(SUM(A.MONIMP),0) as MONCOMC FROM CPIMPCOM A, CPCOMPRO B
		  WHERE
		  A.CODPRE= ('".$codpre."' ) AND
		  SUBSTR(TO_CHAR(B.FECCOM,'DD/MM/YYYY'),4,2)<".$perdesde." AND
		  (A.STAIMP='A'OR
		  (A.STAIMP='N' AND
		  SUBSTR(TO_CHAR(B.FECANU,'DD/MM/YYYY'),4,2)>=".$perdesde."
		  AND ".$perhasta."<>00)) AND
          A.REFCOM=B.REFCOM";
          //print $sql; exit;
    return $this->select($sql);
  }

  function sql_cuerpo_cpimpcau($codpre,$perdesde,$perhasta)
  {
  	$sql="SELECT coalesce(SUM(A.MONIMP),0) as MONCOMCAU FROM CPIMPCAU A, CPCAUSAD B, CPDOCCAU C
          WHERE
          A.CODPRE= ('".$codpre."' ) AND
          SUBSTR(TO_CHAR(B.FECCAU,'DD/MM/YYYY'),4,2)<'".$perdesde."' AND
          (A.STAIMP='A'OR
          (A.STAIMP='N' AND
          SUBSTR(TO_CHAR(B.FECANU,'DD/MM/YYYY'),4,2)>='".$perhasta."'
          AND '".$perhasta."'<>'00')) AND
          C.AFECOM='S' AND
  	      A.REFCAU=B.REFCAU AND
	      B.TIPCAU=C.TIPCAU";
     return $this->select($sql);
  }

  function sql_cuerpo_cpimppag($codpre,$perdesde,$perhasta)
  {
  	$sql="SELECT coalesce(SUM(A.MONIMP),0) as MONCOMPAG FROM CPIMPPAG A, CPPAGOS B, CPDOCPAG C
          WHERE
          A.CODPRE= ('".$codpre."' ) AND
          SUBSTR(TO_CHAR(B.FECPAG,'DD/MM/YYYY'),4,2)<'".$perdesde."' AND
          (A.STAIMP='A'OR
          (A.STAIMP='N' AND
          SUBSTR(TO_CHAR(B.FECANU,'DD/MM/YYYY'),4,2)>='".$perhasta."'
          AND '".$perhasta."'<>'00')) AND
          C.AFECOM='S' AND
          A.REFPAG=B.REFPAG AND
          B.TIPPAG=C.TIPPAG ";
     return $this->select($sql);
  }

  function sql_cuerpo_cpimpcomaju($codpre,$perdesde,$perhasta)
  {
  	$sql="SELECT coalesce(SUM(D.MONAJU),0) as MONCOMCAUAJU FROM CPIMPCAU A, CPCAUSAD B, CPAJUSTE C, CPMOVAJU D,
          CPDOCCAU E WHERE
          A.CODPRE= ('".$codpre."' ) AND
          SUBSTR(TO_CHAR(C.FECAJU,'DD/MM/YYYY'),4,2)<'".$perdesde."' AND
          (C.STAAJU='A' OR (C.STAAJU='N' AND SUBSTR(TO_CHAR(C.FECANU,'DD/MM/YYYY'),4,2)>'".$perdesde."')) AND
          (A.STAIMP='A'OR
          (A.STAIMP='N' AND
          SUBSTR(TO_CHAR(B.FECANU,'DD/MM/YYYY'),4,2)>'".$perhasta."'
          AND '".$perhasta."'<>'00')) AND
          E.AFECOM='S' AND
          A.REFCAU=B.REFCAU AND
          A.REFCAU=C.REFERE AND
          A.REFERE=D.REFCOM AND
          C.REFAJU=D.REFAJU AND
          A.CODPRE=D.CODPRE AND
          B.TIPCAU=E.TIPCAU ";
     return $this->select($sql);
  }

  function sql_cuerpo_cpimpcauaju($codpre,$perdesde,$perhasta)
  {
  	$sql="SELECT coalesce(SUM(D.MONAJU),0) as MONCOMCAUAJU FROM CPIMPCAU A, CPCAUSAD B, CPAJUSTE C, CPMOVAJU D,
          CPDOCCAU E WHERE
          A.CODPRE= ('".$codpre."' ) AND
          SUBSTR(TO_CHAR(C.FECAJU,'DD/MM/YYYY'),4,2)<'".$perdesde."' AND
          (C.STAAJU='A' OR (C.STAAJU='N' AND SUBSTR(TO_CHAR(C.FECANU,'DD/MM/YYYY'),4,2)>'".$perdesde."')) AND
          (A.STAIMP='A'OR
          (A.STAIMP='N' AND
          SUBSTR(TO_CHAR(B.FECANU,'DD/MM/YYYY'),4,2)>'".$perhasta."'
          AND '".$perhasta."'<>'00')) AND
          E.AFECOM='S' AND
          A.REFCAU=C.REFERE AND
          A.REFCAU=B.REFCAU AND
          A.REFERE=D.REFCOM AND
          C.REFAJU=D.REFAJU AND
          A.CODPRE=D.CODPRE AND
          B.TIPCAU=E.TIPCAU";
     return $this->select($sql);
  }

  function sql_cuerpo_cpimppagaju($codpre,$perdesde,$perhasta)
  {
  	$sql="SELECT coalesce(SUM(D.MONAJU),0) as MONCOMPAGAJU FROM CPIMPPAG A, CPPAGOS B, CPAJUSTE C, CPMOVAJU D,
          CPDOCPAG E WHERE
          A.CODPRE= ('".$codpre."' ) AND
          SUBSTR(TO_CHAR(C.FECAJU,'DD/MM/YYYY'),4,2)<'".$perdesde."' AND
          (C.STAAJU='A' OR (C.STAAJU='N' AND SUBSTR(TO_CHAR(C.FECANU,'DD/MM/YYYY'),4,2)>'".$perdesde."')) AND
          (A.STAIMP='A'OR
          (A.STAIMP='N' AND
          SUBSTR(TO_CHAR(B.FECANU,'DD/MM/YYYY'),4,2)>'".$perhasta."'
          AND '".$perhasta."'<>'00')) AND
          E.AFECAU='S' AND
          A.REFPAG=C.REFERE AND
          A.REFPAG=B.REFPAG AND
          A.REFCOM=D.REFCOM AND
          C.REFAJU=D.REFAJU AND
          A.CODPRE=D.CODPRE AND
          B.TIPPAG=E.TIPPAG";
    return $this->select($sql);
  }

  function sql_cuerpo_consolidado_nuevo($codpre,$filtro)
  {
  	$sql2="select
  		  codpre as codpre,
		  nompre as nompre,
		  to_char(fecmov,'dd/mm/YYYY') as fecmov,fecmov as fecha,
		  identi as identi,
          (case when substr(identi,1,2)='EE' or tipmov='C/PD' then monmov else 0 end) as monprc,
          (case when substr(identi,1,2)='FF' or tipmov='C/PD' then monmov else 0 end) as moncom,
          (case when substr(identi,1,2)='GG' then monmov else 0 end) as moncau,
          (case when substr(identi,1,2)='HH' then monmov else 0 end) as monpag,
          (case when (substr(identi,1,2)<>'HH' and substr(identi,1,2)<>'FF' and substr(identi,1,2)<>'GG' and substr(identi,1,2)<>'EE') then monmov else 0 end) as monmod,
		  refprc as refprc,refcom as refcom,
		  refcau as refcau,refpag as refpag,
		  monmov as monmov,afedis as afedis, b.nomben as bene
		  from consolidado_nuevo a left outer join opbenefi b on (a.cedrif=b.cedrif)
		  where codpre= ('".$codpre."' )
		  and codpre like  (('".$filtro."'))
		  order by codpre,fecha,identi";

		  	$sql="
		    select
			tipmov,codpre as codpre,
			nompre as nompre,
			to_char(fecmov,'dd/mm/YYYY') as fecmov,fecmov as fecha,
			identi as identi,
			(case when substr(identi,1,2)='EE'
	        or tipmov=(select tipcau from cpdoccau c where c.refier='N' and c.afeprc='S' and c.afecom='S' and c.afecau='S' and c.tipcau=tipmov)
	        or tipmov=(select tippag from cpdocpag c where c.refier='N' and c.afeprc='S' and c.afecom='S' and c.afecau='S' and c.tippag=tipmov)
	        or tipmov=(select tipcom from cpdoccom c where c.refprc='N' and c.afeprc='S' and c.afecom='S' and c.tipcom=tipmov)
	        then monmov else 0 end) as monprc,
	        (case when substr(identi,1,2)='FF'
	        or tipmov=(select tipcau from cpdoccau c where c.refier='N' and c.afeprc='S' and c.afecom='S' and c.afecau='S' and c.tipcau=tipmov)
	        or tipmov=(select tippag from cpdocpag c where c.refier='N' and c.afeprc='S' and c.afecom='S' and c.afecau='S' and c.tippag=tipmov)
	        or tipmov=(select tipcom from cpdoccom c where c.refprc='N' and c.afeprc='S' and c.afecom='S' and c.tipcom=tipmov)
			then monmov else 0 end) as moncom,
			(case when substr(identi,1,2)='GG'
      		 or tipmov=(select tipcau from cpdoccau c where c.refier='N' and c.afeprc='S' and c.afecom='S' and c.afecau='S' and c.tipcau=tipmov)
      		 or tipmov=(select tippag from cpdocpag c where c.refier='N' and c.afeprc='S' and c.afecom='S' and c.afecau='S' and c.tippag=tipmov)
      		 or tipmov=(select tipcom from cpdoccom c where c.refprc='N' and c.afeprc='S' and c.afecom='S' and c.tipcom=tipmov)
	        then monmov else 0 end) as moncau,
			(case when substr(identi,1,2)='HH'
		    or tipmov=(select tippag from cpdocpag c where c.refier='N' and c.afeprc='S' and c.afecom='S' and c.afecau='S' and c.tippag=tipmov)
			then monmov else 0 end) as monpag,
			(case when (substr(identi,1,2)<>'HH' and substr(identi,1,2)<>'FF' and substr(identi,1,2)<>'GG' and substr(identi,1,2)<>'EE') then monmov else 0 end) as monmod,
			refprc as refprc,refcom as refcom,
			refcau as refcau,refpag as refpag,
			monmov as monmov,a.afedis as afedis, b.nomben||' '||a.desmov as bene
			from consolidado_nuevo a left outer join opbenefi b on (a.cedrif=b.cedrif)
			where codpre= ('".$codpre."' )
			and codpre like  (('".$filtro."'))
			order by codpre,fecha,identi";
		//  print '<pre>'; print $sql; exit;
   return $this->select($sql);
  }

  function sql_total_comprometido($perdesde,$perhasta,$coddesde,$codhasta)
  {
  	$sql="SELECT coalesce(SUM(B.MONIMP),0) as MONCOMP FROM CPCOMPRO A, CPIMPCOM B
          WHERE
          SUBSTR(TO_CHAR(A.FECCOM,'DD/MM/YYYY'),4,2)>='".$perdesde."' AND
          SUBSTR(TO_CHAR(A.FECCOM,'DD/MM/YYYY'),4,2)<='".$perhasta."' AND
          B.CODPRE>= ('".$coddesde."' ) AND
          B.CODPRE<= ('".$codhasta."' ) AND
          B.CODPRE IN (SELECT CODPRE FROM CONSOLIDADO_NUEVO) AND
          (A.STACOM='A' OR
          (A.STACOM='N' AND SUBSTR(TO_CHAR(A.FECANU,'DD/MM/YYYY'),4,2)>'".$perhasta."')) AND
          A.REFCOM=B.REFCOM";
    return $this->select($sql);
  }

  function sql_total_comcausado($perdesde,$perhasta,$coddesde,$codhasta)
  {
  	$sql="SELECT coalesce(SUM(A.MONIMP),0) as MONCOMCAU FROM CPIMPCAU A, CPCAUSAD B, CPDOCCAU C
		  WHERE
		  SUBSTR(TO_CHAR(B.FECCAU,'DD/MM/YYYY'),4,2)>='".$perdesde."' AND
		  SUBSTR(TO_CHAR(B.FECCAU,'DD/MM/YYYY'),4,2)<='".$perhasta."' AND
		  A.CODPRE>= ('".$coddesde."' ) AND
		  A.CODPRE<= ('".$codhasta."' ) AND
		  A.CODPRE IN (SELECT CODPRE FROM CONSOLIDADO_NUEVO) AND
		  (A.STAIMP='A'OR
		  (A.STAIMP='N' AND
		  SUBSTR(TO_CHAR(B.FECANU,'DD/MM/YYYY'),4,2)>'".$perhasta."')) AND
		  C.AFECOM='S' AND
		  B.TIPCAU=C.TIPCAU AND
		  A.REFCAU=B.REFCAU";
    return $this->select($sql);
  }

  function sql_total_compagado($perdesde,$perhasta,$coddesde,$codhasta)
  {
  	$sql="SELECT coalesce(SUM(A.MONIMP),0) as MONCOMPAG FROM CPIMPPAG A, CPPAGOS B, CPDOCPAG C
		  WHERE
		  SUBSTR(TO_CHAR(B.FECPAG,'DD/MM/YYYY'),4,2)>='".$perdesde."' AND
		  SUBSTR(TO_CHAR(B.FECPAG,'DD/MM/YYYY'),4,2)<='".$perhasta."' AND
		  A.CODPRE>= ('".$coddesde."' ) AND
		  A.CODPRE<= ('".$codhasta."' ) AND
		  A.CODPRE IN (SELECT CODPRE FROM CONSOLIDADO_NUEVO) AND
		  (A.STAIMP='A'OR
		  (A.STAIMP='N' AND
		  SUBSTR(TO_CHAR(B.FECANU,'DD/MM/YYYY'),4,2)>'".$perhasta."')) AND
		  C.AFECOM='S' AND
		  B.TIPPAG=C.TIPPAG AND
		  A.REFPAG=B.REFPAG";
    return $this->select($sql);
  }

  function sql_total_causado($perdesde,$perhasta,$coddesde,$codhasta)
  {
  	$sql="SELECT coalesce(SUM(B.MONIMP),0) as MONCAUS FROM CPCAUSAD A, CPIMPCAU B
		  WHERE
		  B.CODPRE>= ('".$coddesde."' ) AND
		  B.CODPRE<= ('".$codhasta."' ) AND
		  B.CODPRE IN (SELECT CODPRE FROM CONSOLIDADO_NUEVO) AND
		  SUBSTR(TO_CHAR(A.FECCAU,'DD/MM/YYYY'),4,2)>='".$perdesde."' AND
		  SUBSTR(TO_CHAR(A.FECCAU,'DD/MM/YYYY'),4,2)<='".$perhasta."' AND
		  (A.STACAU='A' OR (A.STACAU='N' AND SUBSTR(TO_CHAR(A.FECANU,'DD/MM/YYYY'),4,2)>'".$perhasta."')) AND
		  A.REFCAU=B.REFCAU";
    return $this->select($sql);
  }

  function sql_total_pagado($perdesde,$perhasta,$coddesde,$codhasta)
  {
  	$sql="SELECT coalesce(SUM(B.MONIMP),0) as MONPAGA FROM CPPAGOS A, CPIMPPAG B
		  WHERE
		  SUBSTR(TO_CHAR(A.FECPAG,'DD/MM/YYYY'),4,2)>='".$perdesde."' AND
		  SUBSTR(TO_CHAR(A.FECPAG,'DD/MM/YYYY'),4,2)<='".$perhasta."' AND
		  B.CODPRE>= ('".$coddesde."' ) AND
		  B.CODPRE<= ('".$codhasta."' ) AND
		  B.CODPRE IN (SELECT CODPRE FROM CONSOLIDADO_NUEVO) AND
		  (A.STAPAG='A' OR (A.STAPAG='N' AND SUBSTR(TO_CHAR(A.FECANU,'DD-MM-YYYY'),4,2)>'".$perhasta."')) AND
		  A.REFPAG=B.REFPAG";
    return $this->select($sql);
  }

  function sql_total_traslados($perdesde,$perhasta,$coddesde,$codhasta)
  {
  	$sql="SELECT coalesce(SUM(A.MONMOV),0) as TRA_DES FROM CPMOVTRA A, CPTRASLA B
		  WHERE
		  B.PERTRA>='01' AND
		  B.PERTRA<='".$perdesde."' AND
		  A.CODDES>= ('".$coddesde."' ) AND
		  A.CODDES<= ('".$codhasta."' ) AND
		  A.CODDES IN (SELECT CODPRE FROM CONSOLIDADO_NUEVO) AND
		  (B.STATRA='A' OR (B.STATRA='N' AND SUBSTR(TO_CHAR(B.FECANU,'DD/MM/YYYY'),4,2)>'".$perhasta."')) AND
		  A.REFTRA=B.REFTRA";
    return $this->select($sql);
  }

  function sql_total_ajustecom($perdesde,$perhasta,$coddesde,$codhasta)
  {
  	$sql="SELECT coalesce(SUM(D.MONAJU),0) as MONCOMAJU
		  FROM CPIMPCOM A, CPCOMPRO B, CPAJUSTE C, CPMOVAJU D, CPDOCAJU E
		  WHERE
		  SUBSTR(TO_CHAR(C.FECAJU,'DD/MM/YYYY'),4,2)>='".$perdesde."' AND
		  SUBSTR(TO_CHAR(C.FECAJU,'DD/MM/YYYY'),4,2)<='".$perhasta."' AND
		  A.CODPRE>= ('".$coddesde."' ) AND
		  A.CODPRE<= ('".$codhasta."' ) AND
		  A.CODPRE IN (SELECT CODPRE FROM CONSOLIDADO_NUEVO) AND
		  (C.STAAJU='A' OR (C.STAAJU='N' AND SUBSTR(TO_CHAR(C.FECANU,'DD/MM/YYYY'),4,2)>'".$perdesde."')) AND
		  (A.STAIMP='A'OR
		  (A.STAIMP='N' AND
		  SUBSTR(TO_CHAR(B.FECANU,'DD/MM/YYYY'),4,2)>'".$perhasta."'
		  AND '".$perhasta."'<>'00')) AND
		  E.REFIER='C' AND
		  A.CODPRE=D.CODPRE AND
		  C.TIPAJU=E.TIPAJU AND
		  A.REFCOM=B.REFCOM AND
		  A.REFCOM=C.REFERE AND
		  C.REFAJU=D.REFAJU";
    return $this->select($sql);
  }

  function sql_total_ajustecau($perdesde,$perhasta,$coddesde,$codhasta)
  {
  	$sql="SELECT coalesce(SUM(D.MONAJU),0) as MONCAUAJU FROM CPIMPCAU A, CPCAUSAD B, CPAJUSTE C, CPMOVAJU D, CPDOCAJU E
		  WHERE
		  SUBSTR(TO_CHAR(C.FECAJU,'DD/MM/YYYY'),4,2)>='".$perdesde."' AND
		  SUBSTR(TO_CHAR(C.FECAJU,'DD/MM/YYYY'),4,2)<='".$perhasta."' AND
		  (C.STAAJU='A' OR (C.STAAJU='N' AND SUBSTR(TO_CHAR(C.FECANU,'DD/MM/YYYY'),4,2)>'".$perdesde."')) AND
		  A.CODPRE>= ('".$coddesde."' ) AND
		  A.CODPRE<= ('".$codhasta."' ) AND
		  A.CODPRE IN (SELECT CODPRE FROM CONSOLIDADO_NUEVO) AND
		  (A.STAIMP='A'OR
		  (A.STAIMP='N' AND
		  SUBSTR(TO_CHAR(B.FECANU,'DD/MM/YYYY'),4,2)>'".$perhasta."'
		  AND '".$perhasta."'<>'00')) AND
		  E.REFIER='A' AND
		  A.CODPRE=D.CODPRE AND
		  A.REFCAU=B.REFCAU AND
		  A.REFCAU=C.REFERE AND
		  A.REFERE=D.REFCOM AND
		  C.REFAJU=D.REFAJU AND
		  E.TIPAJU=C.TIPAJU";
    return $this->select($sql);
  }

  function sql_total_ajustepag($perdesde,$perhasta,$coddesde,$codhasta)
  {
  	$sql="SELECT coalesce(SUM(D.MONAJU),0) as  MONPAGAJU FROM CPIMPPAG A, CPPAGOS B, CPAJUSTE C, CPMOVAJU D, CPDOCAJU E
		WHERE
		SUBSTR(TO_CHAR(C.FECAJU,'DD/MM/YYYY'),4,2)>='".$perdesde."' AND
		SUBSTR(TO_CHAR(C.FECAJU,'DD/MM/YYYY'),4,2)<='".$perhasta."' AND
		A.CODPRE>= ('".$coddesde."' ) AND
		A.CODPRE<= ('".$codhasta."' ) AND
		A.CODPRE IN (SELECT CODPRE FROM CONSOLIDADO_NUEVO) AND
		(C.STAAJU='A' OR (C.STAAJU='N' AND SUBSTR(TO_CHAR(C.FECANU,'DD/MM/YYYY'),4,2)>'".$perdesde."')) AND
		(A.STAIMP='A'OR
		(A.STAIMP='N' AND
		SUBSTR(TO_CHAR(B.FECANU,'DD/MM/YYYY'),4,2)>'".$perhasta."'
		AND '".$perhasta."'<>'00')) AND
		E.REFIER='G' AND
		A.CODPRE=D.CODPRE AND
		A.REFERE=D.REFCAU AND
		A.REFPAG=B.REFPAG AND
		A.REFPAG=C.REFERE AND
		A.REFCOM=D.REFCOM AND
		C.REFAJU=D.REFAJU AND
		E.TIPAJU=C.TIPAJU";
    return $this->select($sql);
  }

  function sql_total_adiciones($perdesde,$perhasta,$coddesde,$codhasta)
  {
  	$sql="SELECT coalesce(SUM(A.MONMOV),0) as TOTAL_ADI FROM CPMOVADI A, CPADIDIS B
		WHERE
		A.PERPRE>='01' AND
		A.PERPRE<='".$perhasta."' AND
		A.CODPRE>= ('".$coddesde."' ) AND
		A.CODPRE<= ('".$codhasta."' ) AND
		A.CODPRE IN (SELECT CODPRE FROM CONSOLIDADO_NUEVO) AND
		(B.STAADI='A' OR (B.STAADI='N' AND SUBSTR(TO_CHAR(B.FECANU,'DD/MM/YYYY'),4,2)>'".$perhasta."')) AND
		B.ADIDIS='A' AND
		A.REFADI=B.REFADI";
    return $this->select($sql);
  }

  function sql_total_disminuciones($perdesde,$perhasta,$coddesde,$codhasta)
  {
  	$sql="SELECT coalesce(SUM(A.MONMOV),0) as TOTAL_ADI FROM CPMOVADI A, CPADIDIS B
		WHERE
		A.PERPRE>='01' AND
		A.PERPRE<='".$perhasta."' AND
		A.CODPRE>= ('".$coddesde."' ) AND
		A.CODPRE<= ('".$codhasta."' ) AND
		A.CODPRE IN (SELECT CODPRE FROM CONSOLIDADO_NUEVO) AND
		(B.STAADI='A' OR (B.STAADI='N' AND SUBSTR(TO_CHAR(B.FECANU,'DD/MM/YYYY'),4,2)>".$perhasta.")) AND
		B.ADIDIS='D' AND
		A.REFADI=B.REFADI";
		//print $sql; exit;
    return $this->select($sql);

  }

  function sql_total_ajucomcauaju($perdesde,$perhasta,$coddesde,$codhasta)
  {
  	$sql="SELECT coalesce(SUM(D.MONAJU),0) as MONCOMCAUAJU FROM CPIMPCAU A, CPCAUSAD B, CPAJUSTE C, CPMOVAJU D,
		CPDOCCAU E WHERE
		SUBSTR(TO_CHAR(C.FECAJU,'DD/MM/YYYY'),4,2)>='".$perdesde."' AND
		SUBSTR(TO_CHAR(C.FECAJU,'DD/MM/YYYY'),4,2)<='".$perhasta."' AND
		A.CODPRE>= ('".$coddesde."' ) AND
		A.CODPRE<= ('".$codhasta."' ) AND
		A.CODPRE IN (SELECT CODPRE FROM CONSOLIDADO_NUEVO) AND
		(C.STAAJU='A' OR (C.STAAJU='N' AND SUBSTR(TO_CHAR(C.FECANU,'DD/MM/YYYY'),4,2)>'".$perdesde."')) AND
		(A.STAIMP='A'OR
		(A.STAIMP='N' AND
		SUBSTR(TO_CHAR(B.FECANU,'DD/MM/YYYY'),4,2)>'".$perhasta."'
		AND '".$perhasta."'<>'00')) AND
		E.AFECOM='S' AND
		A.CODPRE=D.CODPRE AND
		A.REFCAU=B.REFCAU AND
		A.REFCAU=C.REFERE AND
		A.REFERE=D.REFCOM AND
		C.REFAJU=D.REFAJU AND
		B.TIPCAU=E.TIPCAU";
   return $this->select($sql);
  }

  function sql_total_ajucompagaju($perdesde,$perhasta,$coddesde,$codhasta)
  {
  	$sql="SELECT coalesce(SUM(D.MONAJU),0) as MONCOMPAGAJU FROM CPIMPPAG A, CPPAGOS B, CPAJUSTE C, CPMOVAJU D,
		CPDOCPAG E
		WHERE
		SUBSTR(TO_CHAR(C.FECAJU,'DD/MM/YYYY'),4,2)>='".$perdesde."' AND
		SUBSTR(TO_CHAR(C.FECAJU,'DD/MM/YYYY'),4,2)<='".$perhasta."' AND
		A.CODPRE>= ('".$coddesde."' ) AND
		A.CODPRE<= ('".$codhasta."' ) AND
		A.CODPRE IN (SELECT CODPRE FROM CONSOLIDADO_NUEVO) AND
		(C.STAAJU='A' OR (C.STAAJU='N' AND SUBSTR(TO_CHAR(C.FECANU,'DD/MM/YYYY'),4,2)>'".$perdesde."')) AND
		(A.STAIMP='A'OR
		(A.STAIMP='N' AND
		SUBSTR(TO_CHAR(B.FECANU,'DD/MM/YYYY'),4,2)>'".$perhasta."'
		AND '".$perhasta."'<>'00')) AND
		E.AFECAU='S' AND
		A.CODPRE=D.CODPRE AND
		A.REFPAG=B.REFPAG AND
		A.REFPAG=C.REFERE AND
		A.REFCOM=D.REFCOM AND
		C.REFAJU=D.REFAJU AND
		B.TIPPAG=E.TIPPAG";
    return $this->select($sql);
  }

  function sql_total_trasori($perdesde,$perhasta,$coddesde,$codhasta)
  {
  	$sql="SELECT coalesce(SUM(A.MONMOV),0) as TRA_ORI FROM CPMOVTRA A, CPTRASLA B
		WHERE
		B.PERTRA>='01' AND
		B.PERTRA<='".$perhasta."' AND
		A.CODORI>= ('".$coddesde."' ) AND
		A.CODORI<= ('".$codhasta."' ) AND
		A.CODORI IN (SELECT CODPRE FROM CONSOLIDADO_NUEVO) AND
		(B.STATRA='A' OR (B.STATRA='N' AND SUBSTR(TO_CHAR(B.FECANU,'DD-MM-YYYY'),4,2)>'".$perhasta."')) AND
		A.REFTRA=B.REFTRA";
    return $this->select($sql);
  }

  function sql_total_asireal($coddesde,$codhasta)
  {
  	$sql="SELECT coalesce(SUM(MONASI),0) as TOTAL_REAL
		FROM CPASIINI WHERE
		PERPRE='00' AND
		CODPRE>= ('".$coddesde."' ) AND
		CODPRE<= ('".$codhasta."' ) AND
		CODPRE IN (SELECT CODPRE FROM CONSOLIDADO_NUEVO)";
    return $this->select($sql);
  }

}
?>