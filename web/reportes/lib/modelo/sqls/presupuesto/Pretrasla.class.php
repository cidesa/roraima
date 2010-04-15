<?php
require_once("../../lib/modelo/baseClases.class.php");


class Pretrasla extends baseClases
{
function sqlp($reftrades,$reftrahas,$fecdes,$fechas)
  {
  	 $sql="	select reftra,fectra,tottra from cptrasla
			where reftra>='".$reftrades."' and reftra<='".$reftrahas."'
			and fectra>=to_date('".$fecdes."','dd/mm/yyyy') and fectra<=to_date('".$fechas."','dd/mm/yyyy') order by fectra asc,reftra ";

   //H::printR($sql);exit;
   return $this->select($sql);

  }

  function sqldet($reftra)
  {
  	 $sql="	select reftra,codori,coddes,monmov from cpmovtra
			where reftra='".$reftra."'";

   return $this->select($sql);
  }

}
?>