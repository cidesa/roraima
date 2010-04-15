<?php
require_once("../../lib/modelo/baseClases.class.php");

class Tsrposdiaban extends baseClases {

    function SQLp($numcuedes,$numcuehas,$fechades,$fechahas)
    {

    	$fechades = $fechahas = '22/01/2008';
    	$sql="select distinct d.numcue as numcue,d.nomcue as nomcue,coalesce(a.salant,0) as salant,b.feclib,
		sum( case when c.debcre='D' then coalesce(b.monmov,0) else 0 end) as ingresos,
		sum( case when c.debcre='C' then coalesce(b.monmov,0) else 0 end) as egresos
		from (
		select
		a.numcue as numcue,
		a.nomcue as nomcue,
		sum(case when c.debcre='D'then (a.antlib+coalesce(b.monmov,0))
		 when c.debcre='C'  then (a.antlib-coalesce(b.monmov,0)) end) as salant
		from tsdefban a, TSTIPMOV c, TSMOVLIB B, CONTABA d
		where trim(a.numcue) >= trim('".$numcuedes."')
		and trim(a.numcue) <= trim('$numcuehas')
		and (c.CODTIP) = (B.TIPMOV)
		AND trim(B.NUMCUE) = trim(a.numcue)
		and to_date(B.FECLIB,'yyyy-mm-dd') < to_date('".$fechades."','dd/mm/yyyy')
		and B.FECLIB>=d.FECINI
		group by a.numcue,a.nomcue
		) a left outer join  tsmovlib b on (trim(B.NUMCUE) = trim(a.numcue))
		left outer join tsdefban d on (trim(B.NUMCUE) = trim(d.numcue) ), tstipmov c
		where
		(c.CODTIP) = (B.TIPMOV)
		and trim(d.numcue) >= trim('".$numcuedes."')
		and trim(d.numcue) <= trim('".$numcuehas."')
		and to_date(B.FECLIB,'yyyy-mm-dd') >= to_date('".$fechades."','dd/mm/yyyy')
		and to_date(B.FECLIB,'yyyy-mm-dd') <= to_date('".$fechahas."','dd/mm/yyyy')
		group by d.numcue,d.nomcue,coalesce(a.salant,0),b.feclib
		order by d.numcue,b.feclib";

		return $this->select($sql);
    }
}
?>