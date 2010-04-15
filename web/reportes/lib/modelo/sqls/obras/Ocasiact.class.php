<?php
require_once("../../lib/modelo/baseClases.class.php");

class Ocasiact extends baseClases
{
	function sqlp($coddes,$codhas)
	{
		$sql="select * from ocasiact where trim(codcon)>='$coddes' and trim(codcon)<='$codhas'";
				                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
		return $this->select($sql);
	}
	
	
}