<?php

require_once("../../lib/modelo/baseClases.class.php");

class Tsrbancheemi extends baseClases
{

 function sqlp($numcue)
  {
  	$sql="select 
  	 			a.numcue,
  	 			a.nomcue
			from
				tsdefban a
			where
				trim(a.numcue) = '".trim($numcue)."' 
			order by 
				a.numcue";
	return $this->select($sql);
  }

  function sql_tscheemi($numcue,$fecdes)
  {
	   $sql="select b.numche from tsdefban a, tscheemi b where a.numcue='".trim($numcue)."' and a.numcue=b.numcue and b.fecemi='2007-12-05'"; 
	   return $this->select($sql);
  }
  
  function sql_empresa($codemp)
  {
	   $sql="select nomemp from empresa where codemp='".$codemp."'"; 
	   return $this->select($sql);
  }  
}
?>