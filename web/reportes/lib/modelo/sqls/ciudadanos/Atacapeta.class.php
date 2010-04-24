<?php
require_once("../../lib/modelo/baseClases.class.php");

class Atacapeta extends baseClases
{
	function sqlp3($expdes,$exphas)
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

	 function sqlp($expdes,$exphas)
	  {
		$sql=     "select DISTINCT  CASE WHEN b.id=1 THEN 'Aprobada' WHEN b.id=2 THEN 'Referido'
      				   WHEN b.id=3 THEN 'Rechazado' END as estatus

                  from
                    atayudas a, atestayu b,attipayu c

                  WHERE
                   a.atestayu_id= b.id and
                   a.attipayu_id = c.id and
                   a.nroexp >= '".$expdes."' and
                   a.nroexp <= '".$exphas."'
                   order by estatus";//H::PrintR($sql);exit;

		 return $this->select($sql);
	 }

	  function sqlp2($estatus)
	  {
		$sql=     "select a.nroexp as expediente, b.nomciu as nombre, b.apeciu as apellido,a.monayu as monto, a.respat as diagnostico

                  from
                    atayudas a, atciudadano b, atestayu  c

                  WHERE
                   a.atbenefi=b.id and
                   a.atestayu_id = c.id and
                   c.desest= '".$estatus."'
                   order by expediente";//H::PrintR($sql);exit;

		 return $this->select($sql);
	 }
}