<?php
require_once("../../lib/modelo/baseClases.class.php");

class Vacperpormes extends baseClases {

  function sqlp($empdes,$emphas,$mes)
  {
  		$sql="select a.codemp,a.nomemp,
			coalesce(to_char(b.fecdes,'dd/mm/yyyy'),'NO SOLICITADA') as fecsal,
			coalesce(to_char(b.fechas,'dd/mm/yyyy'),'') as fecrei,
			coalesce(b.diasdisfrutar::text,'') as diadis
			from
			nphojint a left outer join  npvacsalidas b on (a.codemp=b.codemp), npasicaremp c
			where
			a.codemp=c.codemp and
			a.staemp='A' and
			c.codnom in (select codnom from npasiempcont) and
			to_char(a.fecing,'mm')='$mes'
			order by codemp";
		//H::printR($sql);exit;

   return $this->select($sql);
  }

  function sqlanofis()
  {
  	 $sql="select to_char(fecini,'yyyy') as anofis from contaba";

	 $rs = $this->select($sql);
	 return $rs[0]['anofis'];
  }

}
?>