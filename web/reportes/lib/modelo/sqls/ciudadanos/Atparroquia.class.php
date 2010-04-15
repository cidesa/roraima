<?php
require_once("../../lib/modelo/baseClases.class.php");

class Atparroquia extends baseClases
{
	function Sqlp($iddes,$idhas)
	{
		$sql="select a.id,a.despar,b.desmun,c.desest from atparroquias a,
		atmunicipios b , atestados c where a.atmunicipios_id = b.id and b.atestados_id=c.id and
		a.id >= trim('".$iddes."') and a.id <= trim('".$idhas."') order by a.id";
		return $this->select($sql);
	}
}