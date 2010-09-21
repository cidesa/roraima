<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

 echo Catalogo($fcreginm,0,array(
  'getprincipal' => 'getCodestinm',
  'getsecundario' => 'getDesestinm',
  //cajitas abajo
  'campoprincipal' => 'codestinm',
  'camposecundario' => 'desestinm',
  'tamanoprincipal' => '4',
  'campobase' => 'id'
  ), 'Fcreginm_Fcestinm', 'fcestinm','',''); ?>