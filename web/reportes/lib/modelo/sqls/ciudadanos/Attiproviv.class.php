<?php
require_once("../../lib/modelo/baseClases.class.php");

class Attiproviv extends baseClases
{
	function Sqlp($codexpdes,$codexphas)
	{
		$sql="select id,tipviv from attipproviv where id>=trim('".$codexpdes."')
		and id<=rtrim('".$codexphas."')";
		/*   print '<pre>';
						print_r($sql);
						 print '</pre>';
						exit;*/
				return $this->select($sql);
	}





}