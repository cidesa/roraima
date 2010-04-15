<?php
require_once("../../lib/modelo/baseClases.class.php");

class Atrecaud extends baseClases
{
	function Sqlp($codrecdes,$codrechas)
	{
		$sql="
			select
			a.codrec,
			a.desrec,a.requerido
			from atrecaud a
			where
			trim(a.codrec) >= trim('$codrecdes')
			and trim(a.codrec) <= trim('$codrechas')
			order by a.codrec";

		/*print '<pre>';
						print_r(  $sql);
						 print '</pre>';
						exit;*/

		return $this->select($sql);
	}


}