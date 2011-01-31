<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

$catparams="/param1/'+$('intipcli_codtipcli').value+'";
 echo Catalogo($intipcli,1,array(
  'getprincipal' => 'getCodtipcli',
  'getsecundario' => 'getDestipcli',
  'campoprincipal' => 'codtipcli',
  'camposecundario' => 'destipcli',
  'campobase' => 'codtipcli',
  ), 'Ingtipcli_intipcli', 'Intipcli', $catparams ); ?>