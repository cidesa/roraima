<?php
require_once("../../lib/modelo/baseClases.class.php");
class Atayudas extends baseClases
{
	function sqlp($expdes,$exphas){
		$sql= "select a.nroexp as expediente, to_char(a.fecsol,'dd/mm/YYYY') as fecha, extract(year from age(now(),b.fecnac)) as edad,
		a.monayu as monto,b.cedciu as cedula,b.nomciu as nombre, a.desayu as ayuda, a.proayu as proveedor  from atayudas a, atciudadano b
             WHERE
             a.atbenefi=b.id and
             a.nroexp >= '".$expdes."' and
             a.nroexp <= '".$exphas."' order by a.nroexp";//H::PrintR($sql);exit;
		return $this->select($sql);
	}
}