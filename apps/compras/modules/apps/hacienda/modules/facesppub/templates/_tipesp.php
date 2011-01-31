<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

 echo Catalogo($fcesplic,3,array(
  'getprincipal' => 'getTipesp',
  'getsecundario' => 'getDestip',
  //cajitas abajo
  'campoprincipal' => 'tipesp',
  'camposecundario' => 'destip',
  'tamanoprincipal' => '4',
  'campobase' => 'id'
  ), 'Facprocom_Fctipesp', 'fctipesp','','','divGrid'); ?>