<?php
require_once("../../lib/modelo/baseClases.class.php");

class Ocregobr extends baseClases
{
  function sqlp($coddes,$codhas)
  {
    $sql="select codobr,desobr,to_char(fecini,'dd/mm/yyyy') as fecini,to_char(fecfin,'dd/mm/yyyy') as fecfin,monobr from ocregobr where trim(codobr)>='$coddes' and trim(codobr)<='$codhas'";

    return $this->select($sql);
  }


}