<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

 echo Catalogo($fcreginm,0,array(
  'getprincipal' => 'getCodsitinm',
  'getsecundario' => 'getDescripcioncodsit',
  //cajitas abajo
  'campoprincipal' => 'codsitinm',
  'camposecundario' => 'descripcioncodsit',
  'campobase' => 'id'
  ), 'Fcreginm_Fcsitjurinm', 'fcsitjurinm','',''); ?>

