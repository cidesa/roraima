<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

 echo Catalogo($fcdefins,1,array(
  'getprincipal' => 'getCodpro',
  'getsecundario' => 'getDescripcioncodpro',
  //cajitas abajo
  'campoprincipal' => 'codpro',
  'camposecundario' => 'descripcioncodpro',
  'campobase' => 'id'
  ), 'Facdefespins_fcdefins', 'fcfuepre'); ?>

