<?php

require_once("../../lib/modelo/baseClases.class.php");

class Tsrmovlib extends baseClases
{

 function sqlp($numcuedes,$numcuehas)
  {
  	 $sql="select a.numcue,a.nomcue,a.antlib
					from tsdefban a
					where trim(a.numcue) >= '".trim($numcuedes)."' and trim(a.numcue) <= '".trim($numcuehas)."'
					order by a.numcue";
	print $sql;exit;
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


  function sql_opbenefi($reflib)
  {
   $sql= "SELECT a.nomben as nomben from OPBENEFI a, TSCHEEMI b
		  WHERE trim(b.numche)='".trim($reflib)."' AND
		        trim(b.cedrif)=trim(a.cedrif)";
   return $this->select($sql);
  }
}
?>