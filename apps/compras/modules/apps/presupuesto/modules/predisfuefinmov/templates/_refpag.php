<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

  $id="+'&tipmov=pag'";

  echo Catalogo($cpmovfuefin,5,array(
  'getprincipal' => 'getRefmov',
  'getsecundario' => 'getDespag',
  'campoprincipal' => 'refmov',
  'camposecundario' => 'despag',
  'campobase' => 'id',
  ), 'Predisfuefinmov_Cppagos', 'cppagos','',$id,'divGrid',1);
?>
