<?php

require_once("../../lib/modelo/baseClases.class.php");

class Reprutdoc extends baseClases {

  function sqlp()
  {

      $sql= "select b.tipdoc, c.nomuni, a.diadoc, a.rutdoc
            from dfrutadoc a, dftabtip b, acunidad c
            where
            a.id_dftabtip = b.id
            and a.id_acunidad = c.id
            order by
            b.tipdoc, a.rutdoc";

   return $this->select($sql);
  }
}
?>