<?php

require_once("../../lib/modelo/baseClases.class.php");


class Cainfrec extends baseClases
{


function sqlp($refcot,$refcot2,$codpro,$codpro2)
  {
  	  $sql="
  	  		select
				distinct(b.refcot) as refcot,
				b.descot as descot ,
				c.nompro as nompro ,
				f.nompre as nompre ,
				b.refsol as refsol
			from
				cacotiza b ,
				caprovee c ,
				casolart d ,
			    cadetcot e ,
				cpdeftit f
			where
				b.refcot=('".$refcot."') --and b.refcot<=('".$refcot2."')
			and
				b.codpro=c.codpro
			and
				b.codpro>=('".$codpro."') and b.codpro<=('".$codpro2."')
			and
				b.refsol=d.reqart
			and
				b.refcot=e.refcot
			and
				e.priori='1'
			and
				d.unires=f.codpre
";
//print '<pre>'; print $sql; exit;
	return $this->select($sql);
  }

function sqlp2($refcot)
  {
  	  $sql="
  	  		select
				c.nompro as nompro,
				d.desart as desart,
				a.priori as priori
			from
				cadetcot a,
				cacotiza b,
				caprovee c,
				caregart d
			where
				b.refcot=('".$refcot."') and
				a.refcot=b.refcot and
				b.codpro=c.codpro and
				a.codart=d.codart and
				a.priori='1'
			order by  d.desart
";
//print '<pre>'; print $sql; exit;
	return $this->select($sql);
  }

}
?>