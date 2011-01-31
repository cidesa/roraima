<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

 echo Catalogo($fcreginm,0,array(
  'getprincipal' => 'getCoduso',
  'getsecundario' => 'getDescripcionuso',
  //cajitas abajo
  'campoprincipal' => 'codusoinm',
  'camposecundario' => 'descripcionuso',
  'campobase' => 'id'
  ), 'Fcreginm_Fcusoinm', 'fcusoinm','',''); ?>