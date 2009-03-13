<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

 echo Catalogo($fcdefins,1,array(
  'getprincipal' => 'getCodfue_apu',
  'getsecundario' => 'getNomfue_apu',
  //cajitas abajo
  'campoprincipal' => 'codapu',
  'camposecundario' => 'nomfue',
  'campobase' => 'codfue'
  ), 'Facdefespins_fcdefins', 'fcfuepre'); ?>