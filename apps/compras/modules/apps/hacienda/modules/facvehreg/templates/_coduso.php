<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
  <?php
  	$var = $params[0];
  	$lon = strlen(trim($params[0]));
  	$id="+'&cajtexcom=fcregveh_desuso'";
   ?>
 <?php

  echo Catalogo($fcregveh,3,array(
  'getprincipal' => 'getCoduso',
  'getsecundario' => 'getDesuso',
  // cajitasss
  'campoprincipal' => 'coduso',
  'camposecundario' => 'desuso',
  'campobase' => 'id',
  'tamanoprincipal' => $lon,
  ), 'Facvehreg_Fcusoveh', 'fcusoveh', $var, $id,'divGrid'); ?>







