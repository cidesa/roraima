<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

 echo Catalogo($fcdefins,1,array(
  'getprincipal' => 'getCodfue_esp',
  'getsecundario' => 'getDescripcioncodesp',
  //cajitas abajo
  'campoprincipal' => 'codfue_esp',
  'camposecundario' => 'descripcioncodesp',
  'campobase' => 'id'
  ), 'Facdefespins_fcdefins', 'fcfuepre'); ?>