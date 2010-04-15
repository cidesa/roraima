<?php

require_once("../../lib/modelo/baseClases.class.php");

class Tsrdisban extends baseClases
{

 function sqlp($numcuedes,$numcuehas)
  {
  	 $sql="select a.tipint as grupo, a.numcue, a.nomcue, a.antlib,
			(CASE WHEN a.tipint='D' THEN 1
				  WHEN a.tipint='O' THEN 2
				  WHEN a.tipint='C' THEN 3
				  WHEN a.tipint='F' THEN 4 END) as orden
			from tsdefban a
			where trim(a.numcue) >='".trim($numcuedes)."'  and trim(a.numcue) <= '".trim($numcuehas)."'
			order by orden,a.numcue";

   return $this->select($sql);
  }

  function sql_tstipmov($numcue,$fecdes)
  {
   $sql= "SELECT coalesce(sum(CASE WHEN a.debcre='D' THEN b.monmov ELSE 0 END),0) as deblibpos,
				               coalesce(sum(CASE WHEN a.debcre='C' THEN b.monmov ELSE 0 END),0) as crelibpos
				      FROM TSTIPMOV A, TSMOVLIB B, CONTABA C
					  WHERE (A.CODTIP) = (B.TIPMOV) AND
				      trim(B.NUMCUE) = '".trim($numcue)."' AND C.CODEMP='001' AND
		         	  B.FECLIB<to_date('".$fecdes."','dd/mm/yyyy') AND B.FECLIB>=C.FECINI";

   return $this->select($sql);
  }

  function sql_tsmovlib($numcue,$fecdes,$fechas)
  {
  	$sql="SELECT coalesce(sum(CASE WHEN b.debcre='D' THEN a.monmov ELSE 0 END),0) as mondeb,
				 coalesce(sum(CASE WHEN b.debcre='C' THEN a.monmov ELSE 0 END),0) as moncre
				    from tsmovlib a,tstipmov b
					where (a.tipmov)=(b.codtip) and
					trim(a.numcue)='".trim($numcue)."' and
					a.feclib >= to_date('".$fecdes."','dd/mm/yyyy') and
					a.feclib <= to_date('".$fechas."','dd/mm/yyyy')";
     return $this->select($sql);
  }
}
?>