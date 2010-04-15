<?php
require_once("../../lib/modelo/baseClases.class.php");

class Atayupprov extends baseClases
{
	function sqlp($expdes,$exphas)
	  {
		$sql=     "select DISTINCT a.fecsol as fecha
                  from
                    atayudas a, caprovee b
                  WHERE
                   a.caprovee_id = b.id and
                   a.nroexp >= '".$expdes."' and
                   a.nroexp <= '".$exphas."'
                   order by fecha";//H::PrintR($sql);exit;

		 return $this->select($sql);
	 }

	 function sqlp1($fecha)
	  {
		$sql=     "select DISTINCT  a.nroexp as expediente, b.nompro as nombre,a.monayu as monto

                  from
                    atayudas a, caprovee b

                  WHERE
                   a.caprovee_id = b.id and
                   a.fecsol= to_date('$fecha','YYYY/mm/dd')
                   order by expediente";//H::PrintR($sql);exit;

		 return $this->select($sql);
	 }
}