<?php
require_once("../../lib/modelo/baseClases.class.php");

class Atestado extends baseClases
{
	function Sqlp($iddes,$idhas)
	{
		$sql="select id,desest from atestados a where id>=trim('".$iddes."') and id<=trim('".$idhas."')";
		return $this->select($sql);
	}
}