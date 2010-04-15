<?php

require_once("../../lib/modelo/baseClases.class.php");

class Invrcoltra extends baseClases 
{

  function sqlp($reftrades,$reftrahas)
  {
	$sql="select 
		a.reftra, 
		to_char(a.fectra,'dd/mm/yyyy') as fectra, 
		a.destra, 
		a.ctaori, 
		a.ctades, 
		a.montra 
		from 
		tsmovtra a 
		where
		trim(a.reftra)>=trim('".$reftrades."') and 
		trim(a.reftra)<=trim('".$reftrahas."')  
		order by a.reftra";
					
	//print $sql;exit;
   return $this->select($sql);
  }
  function sql_tsdefban($numcue)
  {
	$sql="select 
		a.numcue, 
		a.tipcue, 
		a.desenl 
		from 
		tsdefban a 
		where
		trim(a.numcue)<=trim('".$numcue."')";
					
	//print $sql;exit;
   return $this->select($sql);
  }

  function sql_empresa($codemp='001')
  {
	$sql="select 
		a.nomemp, 
		a.ciuemp  
		from 
		empresa a 
		where
		trim(a.codemp)='".$codemp."'";
					
	//print $sql;exit;
   return $this->select($sql);
  }
 
}
?>
