<?php
require_once("../../lib/modelo/baseClases.class.php");

class Attipvivienda extends baseClases
{
	function Sqlp($iddes,$idhas)
	{
		$sql="select id,tipviv from attipviv a where id>=trim('".$iddes."') and id<=trim('".$idhas."')";
		return $this->select($sql);
	}
}