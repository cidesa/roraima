<?php
require_once("../../lib/modelo/baseClases.class.php");

class Tsrplaliqislr extends baseClases {

  function SQLp($numorddes,$numordhas,$bendes,$benhas,$fecdes,$fechas,$status)
  {
    $sql="select distinct c.codtip,c.destip,a.numord,a.nomben, b.monret, a.desord,c.porret as porret,a.monord as monord from opordpag a, opretord b,  optipret c
    	  where
    	  a.numord >= '".$numorddes."'
    	  and a.numord <= '".$numordhas."'
    	  and a.cedrif >= '".$bendes."'
          and a.cedrif <= '".$benhas."'
          and to_date(a.fecemi,'yyyy-mm-dd') >= to_date('".$fecdes."','dd/mm/yyyy')
          and to_date(a.fecemi,'yyyy-mm-dd') <= to_date('".$fechas."','dd/mm/yyyy')
    	  and a.numord = b.numord
    	  and b.codtip = c.codtip
          --and ( upper(a.status) = '".strtoupper($status[0])."' or upper(a.status) = '".strtoupper($status[1])."' or upper(a.status) = '".strtoupper($status[2])."')
          order by a.numord";

   return $this->select($sql);
  }
}
?>