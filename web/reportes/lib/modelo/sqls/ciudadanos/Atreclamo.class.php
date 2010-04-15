<?php
require_once("../../lib/modelo/baseClases.class.php");

class Atreclamo extends baseClases
{
	function Sqlp($iddes,$idhas,$fechades,$fechahas,$cedula)
	{
		$sql="select a.id,c.cedciu,c.nomciu,c.telhab,a.desrec,b.desuni,
		to_char(a.fechaa,'dd/mm/YYYY') as fechaa,to_char(a.fechar,'dd/mm/YYYY') as fechar, a.respuesta from
		atreclamos a,atunidades b,atciudadano c,atestados d,atmunicipios e,atparroquias f where
		a.fechar>=to_date('$fechades','dd/mm/YYYY') and a.fechar<=to_date('$fechahas','dd/mm/YYYY')
	    and a.id>=trim('".$iddes."') and a.id <=trim('".$idhas."') and c.cedciu like '$cedula%' and
	    a.atunidades_id= b.id and a.atsolici=c.id and c.atparroquias_id=f.id and c.atmunicipios_id=
	    e.id and c.atestados_id=d.id";
		return $this->select($sql);
	}
}