<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

 echo Catalogo($fcdefins,1,array(
  'getprincipal' => 'getCodfue_esp',
  'getsecundario' => 'getNomfue_esp',
  //cajitas abajo
  'campoprincipal' => 'codesp',
  'camposecundario' => 'nomfue',
  'campobase' => 'codfue'
  ), 'Facdefespins_fcdefins', 'fcfuepre'); ?>