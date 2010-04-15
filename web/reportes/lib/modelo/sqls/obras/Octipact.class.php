<?php
require_once("../../lib/modelo/baseClases.class.php");

class Octipact extends baseClases
{
	function sqlp($coddes,$codhas)
	{
		$sql="select * from octipact where codtipact>='$coddes' and codtipact<='$codhas'";
				                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
		return $this->select($sql);
	}
	
	
}