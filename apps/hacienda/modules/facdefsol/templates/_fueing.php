<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

 echo Catalogo($fctipsol,1,array(
  'getprincipal' => 'getFueing',
  'getsecundario' => 'getNomfue',
  'campoprincipal' => 'fueing',
  'camposecundario' => 'nomfue',
  'campobase' => 'id'
  ), 'Facdefsol_fcfuepre', 'fcfuepre'); ?>

