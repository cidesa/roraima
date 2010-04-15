<?php
require_once("../../lib/modelo/baseClases.class.php");

class Atdonaciones extends baseClases
{
	function Sqlp($coddondes,$coddonhas,$id,$ih)
	{
		$sql="
			select
			a.atgrudon_id as id ,b.desgru as des,
			a.coddon as cod,
			a.desdon as desdon
			from atdonaciones a,atgrudon b
			where
			trim(a.coddon) >= trim('$coddondes')
			and trim(a.coddon) <= trim('$coddonhas')
			and a.atgrudon_id>='".$id."'
			and a.atgrudon_id<='".$ih."'
			and a.atgrudon_id=b.id
			order by a.coddon";
		return $this->select($sql);
	}


}