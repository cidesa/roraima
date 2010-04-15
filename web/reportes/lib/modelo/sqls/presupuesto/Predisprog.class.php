<?php
require_once("../../lib/modelo/baseClases.class.php");
class Predisprog extends baseClases
{
function sqlp($longrupo,$inipartida,$lonpartida,$perasidesde,$perasihasta,$perdesde,$perhasta,$codigodesde,$codigohasta,$filtro,$anno,$permovdesde,$permovhasta)
  {
  	 $sql="SELECT SUBSTR(EJECUCION.CODPRE,1,".$longrupo[0][0].") AS CATEGORIA,
			SUBSTR(EJECUCION.CODPRE,".$inipartida[0][0].",".$lonpartida[0][0].") AS CODPRES,
			MAX(CPDEFTIT.NOMPRE) AS NOMPRE,
			SUM(MONASI) AS ASIGNACION,
			SUM(PRECOMPROMISO) AS PRECOMPROMISO,
			SUM(COMPROMISO) AS COMPROMISO,
			SUM(CAUSADO) AS CAUSADO,
			SUM(PAGADO) AS PAGADO,
			SUM(MODIFICACION) AS MODIFICADO
			FROM
			(
			SELECT CODPRE AS CODPRE, SUM(MONASI) AS MONASI, 0 AS PRECOMPROMISO, 0 AS COMPROMISO, 0 AS CAUSADO, 0 AS PAGADO, 0 AS MODIFICACION   FROM CPASIINI
			WHERE  PERPRE >= '".$perasidesde."' AND PERPRE <='".$perasidesde."'  GROUP BY CODPRE,PERPRE
			UNION ALL
			SELECT CODPRE AS CODPRE, 0 AS MONASI, coalesce(obtener_ejecucion(rtrim(codpre),'".$permovdesde."','".$permovhasta."','".$anno."','PRC'),0) AS PRECOMPROMISO, 0 AS COMPROMISO, 0 AS CAUSADO, 0 AS PAGADO, 0 AS MODIFICACION
			from CPAsiIni where trim(CodPre) >= trim('".$codigodesde."') and  trim(CODPRE)<= trim('".$codigohasta."') AND PerPre='00'
			UNION ALL
			SELECT CODPRE AS CODPRE, 0 AS MONASI, 0 AS PRECOMPROMISO, coalesce(obtener_ejecucion(rtrim(codpre),'".$permovdesde."','".$permovhasta."','".$anno."','COM'),0) AS COMPROMISO, 0 AS CAUSADO, 0 AS PAGADO, 0 AS MODIFICACION
			from CPAsiIni where trim(CodPre) >= trim('".$codigodesde."') and  trim(CODPRE)<= trim('".$codigohasta."') AND PerPre='00'
			UNION ALL
			SELECT CODPRE AS CODPRE, 0 AS MONASI, 0 AS PRECOMPROMISO, 0 AS COMPROMISO, coalesce(obtener_ejecucion(rtrim(codpre),'".$permovdesde."','".$permovhasta."','".$anno."','CAU'),0) AS CAUSADO, 0 AS PAGADO, 0 AS MODIFICACION
			from CPAsiIni where trim(CodPre) >= trim('".$codigodesde."') and  trim(CODPRE)<= trim('".$codigohasta."') AND PerPre='00'
			UNION ALL
			SELECT CODPRE AS CODPRE, 0 AS MONASI, 0 AS PRECOMPROMISO, 0 AS COMPROMISO, 0 AS CAUSADO, coalesce(obtener_ejecucion(rtrim(codpre),'".$permovdesde."','".$permovhasta."','".$anno."','PAG'),0) AS PAGADO, 0 AS MODIFICACION
			from CPAsiIni where trim(CodPre) >= trim('".$codigodesde."') and  trim(CODPRE)<= trim('".$codigohasta."') AND PerPre='00'
			UNION ALL
			SELECT CODPRE AS CODPRE, 0 AS MONASI, 0 AS PRECOMPROMISO, 0 AS COMPROMISO, 0 AS CAUSADO, 0 AS PAGADO, SUM(MONTO) AS MODIFICACION FROM
			(
			 SELECT CODPRE AS CODPRE, coalesce(obtener_ejecucion(rtrim(codpre),'".$permovdesde."','".$permovhasta."','".$anno."','TRN')*-1,0) AS MONTO
			 from CPAsiIni where trim(CodPre) >= trim('".$codigodesde."') and  trim(CODPRE)<= trim('".$codigohasta."') AND PerPre='00'
			 UNION ALL
			 SELECT CODPRE AS CODPRE, coalesce(obtener_ejecucion(rtrim(codpre),'".$permovdesde."','".$permovhasta."','".$anno."','TRA'),0) AS MONTO
			 from CPAsiIni where trim(CodPre) >= trim('".$codigodesde."') and  trim(CODPRE)<= trim('".$codigohasta."') AND PerPre='00'
			 UNION ALL
			 SELECT CODPRE AS CODPRE, coalesce(obtener_ejecucion(rtrim(codpre),'".$permovdesde."','".$permovhasta."','".$anno."','ADI'),0) AS MONTO
			 from CPAsiIni where trim(CodPre) >= trim('".$codigodesde."') and  trim(CODPRE)<= trim('".$codigohasta."') AND PerPre='00'
			 UNION ALL
			 SELECT CODPRE AS CODPRE, coalesce(obtener_ejecucion(rtrim(codpre),'".$permovdesde."','".$permovhasta."','".$anno."','DIS')*-1,0) AS MONTO
			 from CPAsiIni where trim(CodPre) >= trim('".$codigodesde."') and  trim(CODPRE)<= trim('".$codigohasta."') AND PerPre='00')  AS MODIFICACIONES GROUP BY CODPRE
			)
			EJECUCION, CPDEFTIT WHERE trim(EJECUCION.CODPRE)>=trim('".$codigodesde."') AND trim(EJECUCION.CODPRE)<=trim('".$codigohasta."') AND EJECUCION.CODPRE LIKE '".$filtro."' AND EJECUCION.CODPRE=CPDEFTIT.CODPRE
			GROUP BY CATEGORIA,CODPRES ORDER BY CATEGORIA,CODPRES;";

     return $this->select($sql);
  }

    function sql_cpniveles($consec)
  {
  	$sql="SELECT coalesce((SUM(LONNIV)+COUNT(CATPAR)-1),0) as longrupo FROM CPNIVELES WHERE CONSEC<=".$consec."";
  	return $this->select($sql);
  }

  function sql_cpniveles2($nivhasta)
  {
  	$sql="SELECT (SUM(LONNIV)+COUNT(CATPAR)-1) as LONPARTIDA FROM CPNIVELES WHERE CATPAR='P' AND CONSEC<=".$nivhasta.";";
  	return $this->select($sql);
  }

  function sql_cpniveles3()
  {
  	$sql="SELECT (SUM(LONNIV)+COUNT(CATPAR)+1) as inipartida FROM CPNIVELES WHERE CATPAR='C';";
  	return $this->select($sql);
  }
}
?>