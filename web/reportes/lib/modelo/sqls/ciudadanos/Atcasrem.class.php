<?php
require_once("../../lib/modelo/baseClases.class.php");
class Atcasrem extends baseClases
{
	function Sqlp($iddes,$idhas,$fechades,$cedula){
		$sql="select a.nroexp,b.apeciu||', '||b.nomciu as nombreciu, b.cedciu,c.desayu,d.apetra||', '||d.nomtra
        as nombretra, d.apetra||', '||d.nomtra as nombrecor,a.proayu from atayudas a,atciudadano b,attipayu c,attrasoc
        d where a.atsolici=b.id and a.attipayu_id=c.id and a.attrasoc_id=d.id and d.cedtra='".$cedula."' and
        a.nroexp>='".$iddes."' and a.nroexp<='".$idhas."' and a.fechaa=to_date('$fechades','dd/mm/YYYY')";
		return $this->select($sql);
	}
}