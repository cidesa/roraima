<?php
require_once("../../lib/modelo/baseClases.class.php");

class Atunidades extends baseClases
{
	function Sqlp($codunides,$codunihas)
	{
		$sql="
			select
			a.coduni,
			a.desuni,
			a.diruni,
			a.telfuni,
			a.percon,
			a.telpercon,
			a.mailpercon,
			a.horario
			from atunidades a
			where
			trim(a.coduni) >= trim('$codunides')
			and trim(a.coduni) <= trim('$codunihas')
			order by a.coduni";

	/*	print '<pre>';
						print_r(  $sql);
						 print '</pre>';
						exit;*/

		return $this->select($sql);
	}


}