<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

 echo Catalogo($fcdefins,1,array(
  'getprincipal' => 'getCodfue',
  'getsecundario' => 'getNomfue',
  //cajitas abajo
  'campoprincipal' => 'codpic',
  'camposecundario' => 'nomfue',
  'campobase' => 'codfue'
  ), 'Facdefespins_fcdefins', 'fcfuepre'); ?>