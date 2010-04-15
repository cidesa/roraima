<?php
require_once("../../lib/modelo/baseClases.class.php");

class Octipesp extends baseClases
{
	function sqlp($coddes,$codhas)
	{
		$sql="select * from octipesp where codtipesp>='$coddes' and codtipesp<='$codhas'";
				                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
		return $this->select($sql);
	}
	
	
}