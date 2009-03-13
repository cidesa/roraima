<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

 echo Catalogo($iningprof,0,array(
  'getprincipal' => 'getCodtipsol',
  'getsecundario' => 'getDestipsol',
  'campoprincipal' => 'codtipsol',
  'camposecundario' => 'destipsol',
  'campobase' => 'intipsol_id'
  ), 'Ingingprof_intipsol', 'Intipsol'); ?>