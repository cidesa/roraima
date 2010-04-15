<?php

require_once("../../lib/modelo/baseClases.class.php");

class Tsrrepfoncaj extends baseClases
{

 function sqlp($fecdes,$fechas)
  {
  	 $sql="	select a.cedrifcajchi as cedrif,b.nomben as nomben,
  	 		sum(c.monsal) as montot from opdefemp a,opbenefi b,tssalcaj c
  	 		where a.cedrifcajchi=b.cedrif and c.fecsal>=to_date('".$fecdes."','dd/mm/yyyy')
  	 		and c.fecsal<=to_date('".$fechas."','dd/mm/yyyy') and c.stasal='R'group by a.cedrifcajchi,b.nomben";

   //H::printR($sql);exit;
   return $this->select($sql);
  }

}
?>