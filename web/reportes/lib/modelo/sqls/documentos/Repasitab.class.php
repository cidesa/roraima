<?php

require_once("../../lib/modelo/baseClases.class.php");

class Repasitab extends baseClases {

  function sqlp()
  {

      $sql=("select a.tipdoc, a.nomtab, a.vidutil,
            a.clvprm, a.clvfrn, a.mondoc,
            a.fecdoc, a.desdoc, a.stadoc
            from dftabtip a
            order by a.tipdoc");

   return $this->select($sql);
  }
}
?>