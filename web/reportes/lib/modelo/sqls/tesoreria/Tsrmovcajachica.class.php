<?php
require_once("../../lib/modelo/baseClases.class.php");
class Tsrmovcajachica extends BaseClases {

	public function sqlp($cod1,$cod2,$fec1,$fec2)
    {


			$sql= "SELECT a.refsal, a.fecsal, a.cedrif, b.nompro " .
					"from tssalcaj a left outer join  caprovee b on (a.cedrif = b.rifpro) " .
					"where a.refsal >= '".$cod1."' and a.refsal <= '".$cod2."' " .
					"and a.fecsal >= to_date('".$fec1."','dd/mm/yyyy') and a.fecsal <= to_date('".$fec2."','dd/mm/yyyy')";


		//H::PrintR($sql);exit;
	    return $this->select($sql);

    }

    public function detalle($codigo)
    {
		$sql= "select a.refsal, a.monsal, a.codart, b.desart, b.codpar " .
				"from tsdetsal a left outer join caregart b on (a.codart = b.codart) " .
				"where a.refsal = '".$codigo."'";

	//	print $sql;exit;
	    return $this->select($sql);

    }
}
?>