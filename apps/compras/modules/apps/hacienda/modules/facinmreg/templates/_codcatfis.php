<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php
$parametro = "param1/".$params[0];

 echo Catalogo($fcreginm,0,array(
  'getprincipal' => 'getCodcatfis',
  'getsecundario' => 'getNomcatfis',
  //cajitas abajo
  'campoprincipal' => 'codcatfis',
  'camposecundario' => 'nomcatfis',
  'campobase' => 'id'
  ), 'Fcreginm_Fccatfis', 'Fccatfis',$parametro,''); ?>