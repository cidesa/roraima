<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

 echo Catalogo($inrecaud,0,array(
  'getprincipal' => 'getCodgrup',
  'getsecundario' => 'getDesgrup',
  'campoprincipal' => 'codgrup',
  'camposecundario' => 'desgrup',
  'campobase' => 'ingruprec_id'
  ), 'Ingdefrec_ingruprec', 'Ingruprec'); ?>