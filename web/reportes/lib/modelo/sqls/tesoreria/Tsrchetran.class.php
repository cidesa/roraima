<?php
require_once("../../lib/modelo/baseClases.class.php");

class Tsrchetran extends baseClases {

  function sqlp($numchedes,$numchehas,$numcuedes,$numcuehas,$bendes,$benhas,$fecdes,$fechas)
  {
		$sql="select a.reflib as anumche, a.numcue as anumcue, b.nomcue as anomcue, c.nomben as anomben, a.feclib as afecemi, a.monmov as amonche 
				from tsmovlib a, tsdefban b, opbenefi c, tscheemi d
				where
					trim(a.reflib) >= trim('".$numchedes."') AND 
					trim(a.reflib) <= trim('".$numchehas."') AND 
					c.cedrif >= '".$bendes."' AND 
					c.cedrif <= '".$benhas."' AND 
					to_date(a.feclib,'yyyy-mm-dd') >= to_date('".$fecdes."','dd/mm/yyyy') AND 
					to_date(a.feclib,'yyyy-mm-dd') <= to_date('".$fechas."','dd/mm/yyyy') AND 
					trim(a.numcue) >= trim('".$numcuedes."') AND 
					trim(a.numcue) <= trim('".$numcuehas."') AND 
					(d.cedrif = c.cedrif) and
					a.reflib=d.numche and
					a.stacon='N' and
					(a.tipmov='CH' or a.tipmov='CHQD' or a.tipmov='CHQF') and
					a.numcue = b.numcue
				order by a.numcue, a.feclib, a.reflib	";		

	//print $sql;

   return $this->select($sql);
  }


  function sqlpx($numchedes,$numchehas)
  {
	$sql="select a.numord, b.numche
		from opordche a, tscheemi b 
		where
		rtrim(a.numche)>=('".$numchedes."') and 
		rtrim(a.numche)<=('".$numchehas."') and
		rtrim(a.numche)=rtrim(b.numche)
		order by a.numord";
     //print $sql;

   	return $this->select($sql);
  }



}
?>
