<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

  $id="+'&tipmov=cau'";

  echo Catalogo($cpmovfuefin,4,array(
  'getprincipal' => 'getRefmov',
  'getsecundario' => 'getDescau',
  'campoprincipal' => 'refmov',
  'camposecundario' => 'descau',
  'campobase' => 'id',
  ), 'Predisfuefinmov_Cpcausad', 'cpcausad','',$id,'divGrid',1);
?>
