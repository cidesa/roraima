<?php
require_once("../../lib/modelo/baseClases.class.php");

class Attipayu extends baseClases
{
	function Sqlp($codayudes,$codayuhas,$codpredes,$codprehas)
	{
		$sql="
			select
			a.codayu,
			a.desayu,
			a.codpre
			from attipayu a
			where
			trim(a.codayu) >= trim('$codayudes')
			and trim(a.codayu) <= trim('$codayuhas')
			and trim(a.codpre) >= trim('$codpredes')
			and trim(a.codpre) <= trim('$codprehas')
			order by a.codayu";

			/*print '<pre>';
						print_r(  $sql);
						 print '</pre>';
						exit;*/

		return $this->select($sql);
	}


}