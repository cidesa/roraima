<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

 echo Catalogo($fcdefins,1,array(
  'getprincipal' => 'getCodveh',
  'getsecundario' => 'getDescripcioncodveh',
  //cajitas abajo
  'campoprincipal' => 'codveh',
  'camposecundario' => 'descripcioncodveh',
  'campobase' => 'id'
  ), 'Facdefespins_fcdefins', 'fcfuepre'); ?>

