<?php
require_once("../../lib/modelo/baseClases.class.php");

class Octipobr extends baseClases
{
	function sqlp($coddes,$codhas)
	{
		$sql="select * from octipobr where codtipobr>='$coddes' and codtipobr<='$codhas'";
				                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
		return $this->select($sql);
	}
	
	
}