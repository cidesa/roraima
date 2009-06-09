<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

 echo Catalogo($fcdefins,1,array(
 //campos de la la tabla a consultar se colocan en la clase principal
  'getprincipal' => 'getCodfue',
  'getsecundario' => 'getDescripcioncodpic',
 //campos de la la tabla a consultar se colocan en la clase del catalogo
  'campoprincipal' => 'codpic',
  'camposecundario' => 'descripcioncodpic',
  'campobase' => 'id'
  ), 'Facdefespins_fcdefins', 'fcfuepre'); ?>

