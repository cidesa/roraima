<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

  $id="+'&tipmov=tra'";

  echo Catalogo($cpmovfuefin,7,array(
  'getprincipal' => 'getRefmov',
  'getsecundario' => 'getDestra',
  'campoprincipal' => 'refmov',
  'camposecundario' => 'destra',
  'campobase' => 'id',
  ), 'Predisfuefinmov_Cpsoltrasla', 'cpsoltrasla','',$id,'divGrid',1);
?>
