<?php
require_once("../../lib/modelo/baseClases.class.php");

class Atatipayu extends baseClases
{
	function sqlp($expdes,$exphas)
	  {
		$sql=     "select DISTINCT  c.desayu as tipo,a.priayu as prioridad
                  from
                    atayudas a, atciudadano b, attipayu c
                  WHERE
                   a.attipayu_id = c.id and
                   a.nroexp >= '".$expdes."' and
                   a.nroexp <= '".$exphas."'
                   order by tipo,prioridad";//H::PrintR($sql);exit;

		 return $this->select($sql);
	 }

	 function sqlp1($tipo)
	  {
		$sql=     "select DISTINCT  c.desayu as tipo,a.nroexp as expediente, b.nomciu as nombre, b.apeciu as apellido, a.monayu as monto

                  from
                    atayudas a, atciudadano b, attipayu c

                  WHERE
                   c.desayu= '".$tipo."'
                   order by expediente";//H::PrintR($sql);exit;

		 return $this->select($sql);
	 }
}