<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
  <?php
  	//$var = $params[0];
  	//$lon = strlen(trim($params[0]));
  	//$id="+'&cajtexcom=fcregveh_desuso'";
   ?>
 <?php

  echo Catalogo($fcdeclar,0,array(
	  'getprincipal' => 'getCoduso',
	  'getsecundario' => 'getDesuso',
	  // cajitasss
	  'campoprincipal' => 'coduso',
	  'camposecundario' => 'desuso',
	  'campobase' => 'id',
	  'tamanoprincipal' => '10',
	  ), 'Facvehreg_Fcusoveh', 'fcusoveh', '', ''); ?>







