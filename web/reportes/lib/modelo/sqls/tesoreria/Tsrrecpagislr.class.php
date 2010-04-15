<?php
require_once("../../lib/modelo/baseClases.class.php");

class Tsrrecpagislr extends baseClases{

    function SQLp($numorddes,$numordhas,$bendes,$benhas,$fecdes,$fechas,$status) {
    	$sql="select distinct a.numord,a.cedrif,a.nomben, a.desord,a.monord as monord from opordpag a
    	  where
    	  a.numord >= '".$numorddes."'
    	  and a.numord <= '".$numordhas."'
    	  and a.cedrif >= '".$bendes."'
          and a.cedrif <= '".$benhas."'
          and to_date(a.fecemi,'yyyy-mm-dd') >= to_date('".$fecdes."','dd/mm/yyyy')
          and to_date(a.fecemi,'yyyy-mm-dd') <= to_date('".$fechas."','dd/mm/yyyy')
          --and ( upper(a.status) = '".strtoupper($status[0])."' or upper(a.status) = '".strtoupper($status[1])."' or upper(a.status) = '".strtoupper($status[2])."')
          ";

    	return $this->select($sql);
    }

    function SQLopdetord($numord)
    {
    	$sql="select distinct b.codpre from opdetord b
    	  where
		   b.numord = '".$numord."'
          ";

          return $this->select($sql);
    }
}
?>