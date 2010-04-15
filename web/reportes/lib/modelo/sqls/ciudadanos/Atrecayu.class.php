<?php
require_once("../../lib/modelo/baseClases.class.php");

class Atrecayu extends baseClases
{
	function Sqlp($desdes,$deshas)
	{
		$sql="
			select
			a.atrubros_id as id,
			d.desrub as desrub,
			c.desayu as desgru,
			a.atrecaud_id as cod,
			b.desrec as desrec, a.requerido as req
			from atdetrecrub a, atrecaud b ,attipayu c, atrubros d
			where
			d.desrub >= '".$desdes."'
			and d.desrub <= '".$deshas."'
            and a.atrubros_id=d.id
            and a.atrecaud_id=b.id
			and d.attipayu_id=c.id
			order by a.id";

			/*print '<pre>';
						print_r(  $sql);
						 print '</pre>';
						exit;*/


		return $this->select($sql);
	}


}