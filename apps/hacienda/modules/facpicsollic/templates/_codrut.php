<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

 echo Catalogo($fcsollic,4,array(
  'getprincipal' => 'getCodrut',
  'getsecundario' => 'getDescripcionruta',
  //cajitas abajo
  'campoprincipal' => 'codrut',
  'camposecundario' => 'descripcionruta',
  'campobase' => 'id'
  ), 'Facpicsollic_Fcrutas', 'fcrutas','',''); ?>