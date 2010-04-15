<?php
require_once("../../lib/modelo/baseClases.class.php");

class Octipval extends baseClases
{
	function sqlp($coddes,$codhas)
	{
		$sql="select * from octipval where codtipval>='$coddes' and codtipval<='$codhas'";
				                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
		return $this->select($sql);
	}
	
	
}