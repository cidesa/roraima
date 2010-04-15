<?php
require_once("../../lib/modelo/baseClases.class.php");

class Attipingreso extends baseClases
{
	function Sqlp($iddes,$idhas)
	{
		$sql="select id,tiping from attiping a where id>=trim('".$iddes."') and id<=trim('".$idhas."')";
		return $this->select($sql);
	}
}