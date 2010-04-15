<?php
require_once("../../lib/modelo/baseClases.class.php");
class Atcasasi extends baseClases
{
	function Sqlp($iddes,$idhas,$fechades,$fechahas,$cedula){
		$sql="select a.nroofi,a.nroexp,b.apeciu||', '||b.nomciu as nombreciu,b.cedciu,c.desayu,d.apetra||', '||d.nomtra as
			nombretra,a.fechaa,a.proayu from atayudas a,atciudadano b,attipayu c,attrasoc d where a.atsolici=b.id and
	        a.attipayu_id=c.id and a.attrasoc_id=d.id and d.cedtra='".$cedula."' and a.nroexp>='".$iddes."' and
	        a.nroexp<='".$idhas."' and a.fechaa>=to_date('$fechades','dd/mm/YYYY') and a.fechaa<=to_date('$fechahas','dd/mm/YYYY')
	        order by a.nroexp";
	        /*print '<pre>';
						print_r($sql);
						 print '</pre>';
			exit;*/
		return $this->select($sql);
	}
}