<?php
require_once("../../lib/modelo/baseClases.class.php");

class Tsrchecomban extends baseClases {

  function sqlp($numchedes,$numchehas,$numcuedes,$numcuehas,$bendes,$benhas,$fecdes,$fechas)
  {
		$sql="select a.reflib as anumche,a.deslib, a.numcue as anumcue, b.nomcue as anomcue,  a.feclib as afecemi, a.monmov as amonche
				from tsmovlib a, tsdefban b
				where
					trim(a.reflib) >= trim('".$numchedes."') AND
					trim(a.reflib) <= trim('".$numchehas."') AND
					to_date(a.feclib,'yyyy-mm-dd') >= to_date('".$fecdes."','dd/mm/yyyy') AND
					to_date(a.feclib,'yyyy-mm-dd') <= to_date('".$fechas."','dd/mm/yyyy') AND
					trim(a.numcue) >= trim('".$numcuedes."') AND
					trim(a.numcue) <= trim('".$numcuehas."') AND
					a.numcue = b.numcue and
					(a.tipmov='NDGB')
				order by a.numcue, a.feclib, a.reflib	";

//	print '<pre>'; print $sql;

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
