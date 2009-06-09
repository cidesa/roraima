<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

 echo Catalogo($fcreginm,0,array(
  'getprincipal' => 'getCodzon',
  'getsecundario' => 'getDeszon',
  //cajitas abajo
  'campoprincipal' => 'codzon',
  'camposecundario' => 'deszon',
  'campobase' => 'id'
  ), 'Fcreginm_Fcvalinm', 'fcvalinm','',''); ?>