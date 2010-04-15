<?php

require_once("../../lib/modelo/baseClases.class.php");

class Tsrdetrelcajchi extends baseClases
{

 function sqlp($refsalmin,$refsalmax,$cedrifmin,$cedrifmax,$fecmin,$fecmax)
  {
  	    $sql="
		select
		a.refsal, to_char(a.fecsal,'dd/mm/yyyy') as fecsal ,a.cedrif,b.nomben, a.dessal, a.monsal as total,
		c.codart,d.desart, (c.codcat||'-'||d.codpar) as codpre, c.monsal
		from
		tssalcaj a, opbenefi b,tsdetsal c, caregart d
		where
		a.cedrif=b.cedrif and
		a.refsal=c.refsal and
		c.codart=d.codart and
		a.refsal>='".$refsalmin."' and a.refsal <='".$refsalmax."' and
		a.cedrif>='".$cedrifmin."' and a.cedrif <='".$cedrifmax."' and
		a.fecsal>=to_date('".$fecmin."','dd/mm/yyyy') and
    	a.fecsal<=to_date('".$fecmax."','dd/mm/yyyy') order by a.refsal";
   //     H::PrintR($sql);exit;

   return $this->select($sql);
  }

 function montoape()
  {
  	 $sql="select monapecajchi, porrepcajchi from opdefemp";
       //H::PrintR($sql);exit;

   return $this->select($sql);
  }

}
?>