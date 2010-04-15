<?php
require_once("../../lib/modelo/baseClases.class.php");

class Atmunicipio extends baseClases
{
	function Sqlp($iddes,$idhas)
	{
		$sql="select a.id,a.desmun,b.desest from atmunicipios a,
		atestados b where a.atestados_id = b.id and a.id >= trim('".$iddes."')
		and a.id <= trim('".$idhas."') order by a.id";
		return $this->select($sql);
	}
}