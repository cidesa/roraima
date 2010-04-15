<?php
require_once("../../lib/modelo/baseClases.class.php");

class Atlisuni extends baseClases
{

    function SQLp($coddes,$codhas) {
    	 $sql="select
    			coduni,
    			desuni,
    			diruni,
    			telfuni,
    			percon,
    			telpercon,
    			mailpercon,
    			horario
    		from
    			atunidades
    		where
				coduni >= '$coddes' and
				coduni <= '$codhas'
			order by
				coduni";

    	return $this->select($sql);
    }
 }
?>