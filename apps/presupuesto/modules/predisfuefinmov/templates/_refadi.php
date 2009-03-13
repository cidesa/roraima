<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

  $id="+'&tipmov=adi'";

  echo Catalogo($cpmovfuefin,6,array(
  'getprincipal' => 'getRefmov',
  'getsecundario' => 'getDesadi',
  'campoprincipal' => 'refmov',
  'camposecundario' => 'desadi',
  'campobase' => 'id',
  ), 'Predisfuefinmov_Cpadidis', 'cpadidis','',$id,'divGrid',1);
?>
