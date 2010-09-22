<?php

  $lista = Constantes::listaAtencion();
  $estado = $lista[$dfatendoc->getStaate()];

  if($dfatendoc->getStaate()=='0') echo "<font color=\"#FF0000\">$estado</font>";
  elseif($dfatendoc->getStaate()=='1') echo "<font color=\"#FF0000\">$estado</font>";
  elseif($dfatendoc->getStaate()=='2') echo "<font color=\"#000080\">$estado</font>";

?>

