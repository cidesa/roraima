<?php

require_once("../../lib/modelo/baseClases.class.php");


class Cainfrecod extends baseClases
{


function sqlp($refcot,$refcot2,$codpro,$codpro2)
  {
  	  $sql="
  	  		select
				distinct(b.refcot) as refcot,
				b.descot as descot ,
				c.nompro as nompro ,
				f.nompre as nompre,
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
//print $sql; exit;
	return $this->select($sql);
  }



}
?>