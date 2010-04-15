<?php
require_once("../../lib/modelo/baseClases.class.php");
class Preprc2 extends baseClases
{
function sqlp($refdes,$refhas,$fecdes,$fechas,$coddes,$codhas)
  {

  	$sql="	select distinct a.refprc as refprc,b.codpre as codpre,a.fecprc as fecprc,d.perpre as perpre,
  			a.desprc as desprc,c.nomben as nomben,d.monasi as monasi,b.monimp as monimp
			from (cpprecom a left outer join opbenefi c on a.cedrif=c.cedrif),
			cpimpprc b,cpasiini d

			where
			a.refprc=b.refprc        and
			b.codpre=d.codpre        and
			d.perpre='00'		 and
			a.refprc>='".$refdes."'     and
			a.refprc<='".$refhas."'     and
			a.fecprc>=to_date('".$fecdes."','dd/mm/yyyy')   and
			a.fecprc<=to_date('".$fechas."','dd/mm/yyyy')	 and
			b.codpre>='".$coddes."' and
			b.codpre<='".$codhas."' order by b.codpre	";
			//H::printR($sql);exit;

   return $this->select($sql);
  }
}
?>