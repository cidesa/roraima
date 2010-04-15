<?php

require_once("../../lib/modelo/baseClases.class.php");

class Repusu extends baseClases {

  function sqlp($unidad)
  {

    if($unidad==0) $tipo = " a.id like ('%') ";
    else  $tipo = ' a.numuni = '.$unidad.' ';

    $sql='select a.loguse, a.nomuse, a.cedemp,  a.numuni
            from "SIMA_USER".usuarios a
            where
            '.$tipo.' and a.numuni > 0';

  //print $sql; exit();

    return $this->select($sql);
  }

  function getUnidad($iduni)
  {
    $sql = "select nomuni from acunidad where id='".$iduni."'";
    return $this->select($sql);
  }

}
?>