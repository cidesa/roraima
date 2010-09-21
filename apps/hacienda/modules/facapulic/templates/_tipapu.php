<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

 echo Catalogo($fcapulic,3,array(
  'getprincipal' => 'getTipapu',
  'getsecundario' => 'getDestip',
  //cajitas abajo
  'campoprincipal' => 'tipapu',
  'camposecundario' => 'destip',
  'tamanoprincipal' => '4',
  'campobase' => 'id'
  ), 'Facprocom_Fctipapu', 'fctipapu','','','divGrid'); ?>