<?php
require_once("../../lib/modelo/baseClases.class.php");

class Atatipayuva extends baseClases
{
	function sqlp($expdes,$exphas)
	  {
		$sql=     "select DISTINCT  c.desayu as tipo
                  from
                    atayudas a, atciudadano b, attipayu c
                  WHERE
                   a.attipayu_id = c.id and
                   a.nroexp >= '".$expdes."' and
                   a.nroexp <= '".$exphas."'
                   order by tipo";//H::PrintR($sql);exit;

		 return $this->select($sql);
	 }

	 function sqlp1($tipo)
	  {
		$sql=     "select DISTINCT  c.desayu as tipo,a.nroexp as expediente, b.nomciu as nombre, b.apeciu as apellido, a.monayu as monto, d.nompro as proveedor

                  from
                    atayudas a, atciudadano b, attipayu c,caprovee d

                  WHERE
                   a.caprovee_id = d.id and
                   c.desayu= '".$tipo."'
                   order by expediente";//H::PrintR($sql);exit;

		 return $this->select($sql);
	 }
}