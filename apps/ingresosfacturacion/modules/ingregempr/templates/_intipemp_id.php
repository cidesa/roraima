<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php
 echo Catalogo($inempresa,0,array(
  'getprincipal' => 'getCodtipemp',
  'getsecundario' => 'getDestipemp',
  'campoprincipal' => 'codtipemp',
  'camposecundario' => 'destipemp',
  'campobase' => 'intipemp_id'
  ), 'Ingregprof_intipemp', 'Intipemp');
?>