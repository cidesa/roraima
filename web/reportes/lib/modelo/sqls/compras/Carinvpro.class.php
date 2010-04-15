<?php

require_once("../../lib/modelo/baseClases.class.php");


class Carinvpro extends baseClases
{


function sqlp($reqartdes, $reqarthas)
  {
   $sql="select * from casolart ".
   		"where ".
   		"reqart >= '".$reqartdes."' and " .
   		"reqart <= '".$reqarthas."' " .
   		"order by reqart";
   //print $sql;exit;
   return $this->select($sql);
  }

function unidad($unires)
  {
   $sql="select nomubi from cadefubi ".
   		"where ".
   		"trim(codubi) = trim('".$unires."')";
   //print $sql;exit;
   $result = $this->select($sql);
   return $result[0]["nomubi"];
  }

}
?>