<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

 echo Catalogo($cideftit,0,array(
  'getprincipal' => 'getCodcta',
  'getsecundario' => 'getDescta',
  'campoprincipal' => 'codcta',
  'camposecundario' => 'descta',
  'campobase' => 'contabb_id'
  ), 'Ingtitpre_contabb', 'contabb'); ?>

