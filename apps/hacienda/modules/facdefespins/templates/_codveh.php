<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

 echo Catalogo($fcdefins,1,array(
  'getprincipal' => 'getCodfue_veh',
  'getsecundario' => 'getNomfue_veh',
  //cajitas abajo
  'campoprincipal' => 'codveh',
  'camposecundario' => 'nomfue',
  'campobase' => 'codfue'
  ), 'Facdefespins_fcdefins', 'fcfuepre'); ?>