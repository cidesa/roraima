<?php
require_once("../../lib/modelo/baseClases.class.php");
class Prerasiini extends baseClases
{
  function sqlp($lonniv1,$lonniv2,$lonniv3,$codigodesde,$codigohasta,$perdesde,$perhasta,$filtro)
  {
  	 $sql="select substr(b.codpre,1,".$lonniv3[0][0].") as grupo,b.codpre as codigopre, b.nompre as nombre, sum(a.monasi) as monasi
          from cpasiini a, cpdeftit b
          where a.codpre like b.codpre||'%' and  a.perpre >= '$perdesde' and a.perpre <= '$perhasta'and
          length(b.codpre)>=".$lonniv1[0][0]." and length(b.codpre)<=".$lonniv2[0][0]." and
          trim(A.codpre) >= trim('".$codigodesde."') and
          trim(A.codpre) <= trim('".$codigohasta."') and
          trim(A.codpre) LIKE trim('".$filtro."')
          group by codigopre, grupo, nombre  order by codigopre";
        #print '<pre>'; print  $sql; exit;
   return $this->select($sql);
  }

  function sql_cpniveles($consec)
  {
  	$sql="SELECT coalesce((SUM(LONNIV)+COUNT(CATPAR)-1),0) as longrupo FROM CPNIVELES WHERE CONSEC<=".$consec."";
  	return $this->select($sql);
  }

  function sql_cpniveles2($consec)
  {
  	if ($consec=="")
  	{
  	  $consec=0;
  	}
  	$sql="SELECT coalesce((SUM(LONNIV)+COUNT(CATPAR)-1),0) as longrupo FROM CPNIVELES WHERE  CONSEC<=".$consec."";
  	return $this->select($sql);
  }

  function sql_cpdefniv()
  {
  	$sql="SELECT TO_CHAR(FECPER,'YYYY') as anno FROM CPDEFNIV";
  	return $this->select($sql);
  }
  function sql_cat()
  {
  	$sql="select sum(lonniv+1) from cpniveles where catpar='C'";
  	return $this->select($sql);
  }
}
?>