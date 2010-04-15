<?php

require_once("../../lib/modelo/baseClases.class.php");

class Bnrcomincorp extends baseClases
{
	function sqlp($codubides, $codubihas,$fecdes,$fechas)
	  {
		$sql="	select 1 as cantidad,a.codact as codact,a.codmue as codmue,
				b.desmue as desmue,a.codubiori,substr(a.tipdismue,1,6) as coddis,
				c.desdis as desdis,b.valini as valini from bndismue a,bnregmue b,bndisbie c,
				caartrcp d where substr(a.tipdismue,1,10)=c.coddis
				and c.desinc='N' and a.codmue=b.codmue and a.codact=b.codact
				and a.codubiori>='".$codubides."' and a.codubiori<='".$codubihas."' and
				a.fecdismue>=to_date('".$fecdes."','dd/mm/yyyy')
				and a.fecdismue<=to_date('".$fechas."','dd/mm/yyyy')";
		//H::printR($sql);exit;
	  	return $this->select($sql);
	  }
}
?>