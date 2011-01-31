<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

 echo Catalogo($inmulta,0,array(
  'getprincipal' => 'getCodsan',
  'getsecundario' => 'getDessan',
  'campoprincipal' => 'codsan',
  'camposecundario' => 'dessan',
  'campobase' => 'insancion_id'
  ), 'Ingregmul_insancion', 'Insancion'); ?>