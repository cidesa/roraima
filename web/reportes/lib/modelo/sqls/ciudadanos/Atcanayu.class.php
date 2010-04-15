<?php
require_once("../../lib/modelo/baseClases.class.php");

class Atcanayu extends baseClases
{
	function sqlp($expdes,$exphas)
	  {
		$sql=     "select DISTINCT desayu as tipo, attipayu_id as id
                  from
                    atayudas
                  WHERE
                   nroexp >= '".$expdes."' and
                   nroexp <= '".$exphas."'
                   order by tipo";

		 return $this->select($sql);
	   }


	 function sqlp1($tipo,$mes)
	  {
		$sql="select count(*) as cantidad, sum(monayu) as monto, desayu
		from atayudas where TO_CHAR(fecsol,'MM')='".$mes."' AND attipayu_id='".$tipo."' GROUP BY desayu";

		 return $this->select($sql);
	  }
}