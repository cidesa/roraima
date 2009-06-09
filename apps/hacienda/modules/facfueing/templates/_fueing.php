<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

 echo Catalogo($fcfuepre,1,array(
  'getprincipal' => 'getFueing',
  'getsecundario' => 'getDesrede',
  //cajitas abajo
  'campoprincipal' => 'fueing',
  'camposecundario' => 'desrede',
  'campobase' => 'id'
  ), 'Facfueing_Ingrec', 'contabb'); ?>