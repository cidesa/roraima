<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

 echo Catalogo($fcprolic,3,array(
  'getprincipal' => 'getTippro',
  'getsecundario' => 'getDestip',
  //cajitas abajo
  'campoprincipal' => 'tippro',
  'camposecundario' => 'destip',
  'tamanoprincipal' => '4',
  'campobase' => 'id'
  ), 'Facprocom_Fctippro', 'fctippro','','','divGrid'); ?>