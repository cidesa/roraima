<?php

require_once("../../lib/modelo/baseClases.class.php");

class Tsrcomtransbanc extends baseClases
{
 function sqlp($numcuedes,$numcuehas,$fecdes,$fechas)
 {
	$sql="SELECT b.reftra,b.destra,b.ctaori,b.ctades,b.montra,b.fectra
			from  tsmovtra b
			where
			b.status='A' and
           trim(b.ctaori) >='".trim($numcuedes)."'  and trim(b.ctaori) <= '".trim($numcuehas)."' and
			b.fectra >= to_date('".$fecdes."','dd/mm/yyyy') and
			b.fectra <= to_date('".$fechas."','dd/mm/yyyy')";

   	return $this->select($sql);
  }

  function sql_tsdefban($numcue)
  {
	 $sql="SELECT a.nomcue,a.tipcue,b.destip
			from  tsdefban a,tstipcue b
			where
			a.numcue='".trim($numcue)."' and
			a.tipcue=b.codtip";

   	return $this->select($sql);
  }
}
?>