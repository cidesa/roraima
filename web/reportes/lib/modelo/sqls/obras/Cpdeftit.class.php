<?php
require_once("../../lib/modelo/baseClases.class.php");

class Cpdeftit extends baseClases
{
	function sqlp($coddes,$codhas)
	{
		$sql="select * from cpdeftit where trim(codpre)>='$coddes' and trim(codpre)<='$codhas'";
				                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
		return $this->select($sql);
	}
	
	
}