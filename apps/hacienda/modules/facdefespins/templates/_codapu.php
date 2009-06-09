<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

 echo Catalogo($fcdefins,1,array(
  'getprincipal' => 'getCodapu',
  'getsecundario' => 'getDescripcioncodapu',
  //cajitas abajo
  'campoprincipal' => 'codapu',
  'camposecundario' => 'descripcioncodapu',
  'campobase' => 'id'
  ), 'Facdefespins_fcdefins', 'fcfuepre'); ?>