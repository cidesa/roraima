<?php
require_once("../../lib/modelo/baseClases.class.php");
class Atrelvis extends baseClases
{
	function Sqlp($iddes,$idhas,$fechades,$cedula){
		$sql="select a.nroexp,b.apeciu||', '||b.nomciu as nombreciu,b.dirhab,b.telhab,b.cedciu,b.apeciu||', '||b.nomciu as nombreben
        ,b.cedciu,d.desayu,e.apetra||', '||e.nomtra as nomtrasoc from atayudas a, atciudadano b,attipayu d,attrasoc
        e,atestayu f where	a.nroexp>='".$iddes."' and a.nroexp<=rtrim('".$idhas."') and e.cedtra=
		rtrim('".$cedula."') and a.atsolici=b.id and a.atbenefi=b.id and a.attipayu_id=d.id and a.atestayu_id=f.id
		and a.attrasoc_id=e.id and a.fechaa=to_date('$fechades','dd/mm/YYYY')";
	  return $this->select($sql);
	}
}