<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

 echo Catalogo($fcfuepre,1,array(
  'getprincipal' => 'getCodcta',
  'getsecundario' => 'getDescta',
  //cajitas abajo
  'campoprincipal' => 'ingrec',
  'camposecundario' => 'descta',
  'campobase' => 'id'
  ), 'Facfueing_Ingrec', 'contabb'); ?>