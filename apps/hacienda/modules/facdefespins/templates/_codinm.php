<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

 echo Catalogo($fcdefins,1,array(
  'getprincipal' => 'getCodinm',
  'getsecundario' => 'getDescripcioncodinm',
  //cajitas abajo
  'campoprincipal' => 'codinm',
  'camposecundario' => 'descripcioncodinm',
  'campobase' => 'codfue'
  ), 'Facdefespins_fcdefins', 'fcfuepre'); ?>

