<?php

require_once("../../lib/modelo/baseClases.class.php");

class Repuni extends baseClases {

  function sqlp()
  {

    $sql= "select a.nomuni, a.desuni from acunidad a order by nomuni";

    return $this->select($sql);
  }
}
?>