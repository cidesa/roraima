<?php

require_once("../../lib/modelo/baseClases.class.php");

class Ingplarei extends baseClases {

    function SQLp($refingdes,$refinghas,$fecdes,$fechas,$status) {

    	$sql="select a.refing,a.fecing,a.moning,a.desing,a.ctaban,b.nomcue,'DIRECCION BENEFIADA' as nomben
			from
			cireging a, tsdefban b
			where
			a.refing>='".$refingdes."'
			and a.refing <='".$refinghas."'
			and to_date(a.fecing,'yyyy-mm-dd') >= to_date('".$fecdes."','dd/mm/yyyy')
			and to_date(a.fecing,'yyyy-mm-dd') <= to_date('".$fechas."','dd/mm/yyyy')
			--and ( upper(a.status) = '".strtoupper($status[0])."' or upper(a.status) = '".strtoupper($status[1])."')
			and trim(a.ctaban) = trim(b.numcue)
    				";

    	return $this->select($sql);
    }

    function sqlcontabc($refing,$fecing)
    {
	   	$sql="select c.codcta, d.descta,
			(case when c.debcre='D' then c.monasi else 0 end) as deb,
    		(case when c.debcre='C' then c.monasi else 0 end) as cre
			from  contabc1 c, contabb d
			where
			c.numcom = '".$refing."'
			and c.feccom = '".$fecing."'
			and c.codcta = d.codcta
    					";

    	return $this->select($sql);

    }
}
?>