<?php
require_once("../../lib/modelo/baseClases.class.php");
class Concatcue extends baseClases
{
 function sqlp($codigodesde,$codigohasta,$filtro)
  {
  	 $sql="select codcta, descta, (case when cargab='C' then 'SI' else 'NO' end) as cargable, salant
		from  contabb
		where
		trim(codcta) >= '".$codigodesde."' and
		trim(codcta) <= '".$codigohasta."' and
		(trim(codcta) like trim('".$filtro."'))
		order by codcta";

     return $this->select($sql);
  }
}
?>