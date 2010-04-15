<?php
require_once("../../lib/modelo/baseClases.class.php");

class Atacta extends baseClases
{
	function Sqlp($codexpdes,$codexphas)
	{
		$sql="
		select
		 b.nroexp,
		 c.nompro as proveedor,
		 c.rifpro as rif,
		 a.apeciu||', '||a.nomciu as nombreciu,
		 a.cedciu,
		 b.motayu,
		 (d.canapr*d.precio) as totart,
		 e.coddon,e.desdon,d.unidad,d.canapr, f.desayu as tipo, usucre as usuario, atsolici as soli, atbenefi as bene, dirhab as dir, telhab as tel
		 from
		 atciudadano a,
		 atayudas b ,
		 caprovee c,
		 atdetayu d, atdonaciones e,  attipayu f
		 where
		 b.nroexp='".$codexpdes."'
		-- and d.aprobado=true
		 and a.id=b.atsolici
		 and c.id=b.caprovee_id
		 and d.atdonaciones_id=e.id
		 and d.atayudas_id=b.id
		 and f.id=b.attipayu_id
		 group by
		 b.nroexp,
		 c.nompro,
		 a.apeciu,
		 c.rifpro,
		 a.nomciu,
		 a.cedciu,
		 b.motayu,d.canapr,d.precio,
		  e.coddon,e.desdon,d.unidad,d.canapr,f.desayu,usucre , atsolici,atbenefi , dirhab , telhab ";

	/*	 print '<pre>';
						print_r($sql);
						 print '</pre>';
						exit;*/
				return $this->select($sql);
	}

	function Sqlbenefi($id)
	{
		$sql="
		select
		 a.nomciu,
		 a.cedciu
		 from
		 atciudadano a
		 where
		 a.id='".$id."'";

		/* print '<pre>';
						print_r($sql);
						 print '</pre>';
						exit;*/
				return $this->select($sql);
	}





}