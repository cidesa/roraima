<?php
require_once("../../lib/modelo/baseClases.class.php");
class Precatprc extends baseClases
{
  function sqlp($tipprc1,$tipprc2)
  {
  	 $sql="SELECT tipprc as tipprc,nomext as nombre,nomabr as abrev
					FROM cpdocprc
					WHERE ( tipprc >='".$tipprc1."' AND tipprc <='".$tipprc2."' )
					ORDER BY tipprc";
   return $this->select($sql);
  }
}
?>