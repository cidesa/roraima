<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
 <?php
echo Catalogo($fatipmov,8,array(
  'getprincipal' => 'getCodcta',
  'getsecundario' => 'getDescta',
  'campoprincipal' => 'codcta',
  'camposecundario'=> 'descta',
  'campobase' => 'idcodcta',
  ), 'Contabb_Fatipmov', 'contabb', '' );

?>