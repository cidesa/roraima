<?php
require_once("../../lib/modelo/baseClases.class.php");
class Precatpar extends baseClases
{
function sqlp($codigodesde,$codigohasta,$filtro)
  {
  	 if ($filtro == ""){
  	   $sql="SELECT B.CODPRE as codigo, B.NOMPRE as descripcion,
			B.CODCTA as cuenta
			FROM  CPDEFTIT B
			WHERE
			(B.CODPRE Between  '".$codigodesde."' AND '".$codigohasta."')/* AND
			(trim(B.CODPRE) LIKE trim('".$filtro."'))*/
			ORDER BY CODPRE";
  	 }
  	 else
  	 {
  	   $sql="SELECT B.CODPRE as codigo, B.NOMPRE as descripcion,
			B.CODCTA as cuenta
			FROM  CPDEFTIT B
			WHERE
			(B.CODPRE Between  '".$codigodesde."' AND '".$codigohasta."') AND
			(trim(B.CODPRE) LIKE trim('".$filtro."'))
			ORDER BY CODPRE";
  	 }

   return $this->select($sql);
  }
}
?>