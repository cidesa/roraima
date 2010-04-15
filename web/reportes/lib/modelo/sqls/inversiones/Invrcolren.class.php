<?php

require_once("../../lib/modelo/baseClases.class.php");

class Invrcolren extends baseClases 
{

  function sqlp()//$ordcomdes,$ordcomhas)
  {
	$sql="select 
		a.refcol, 
		to_char(a.fecemi,'dd/mm/yyyy') as fecemi, 
		to_char(a.fecven,'dd/mm/yyyy') as fecven, 
		a.numcue, 
		a.moncol, 
		b.tipcue,
		b.nomcue,
		b.desenl
		from 
		invcoloca a, tsdefban b 
		where
		trim(a.numcue)=trim(b.numcue) 
		order by refcol";
					
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
