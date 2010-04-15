<?php
require_once("../../lib/modelo/baseClases.class.php");

class Ocregcon extends baseClases
{
	function sqlp($coddes,$codhas)
	{
		$sql="select * from ocregcon where trim(codcon)>='$coddes' and trim(codcon)<='$codhas'";
				                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
		return $this->select($sql);
	}
	
	
}