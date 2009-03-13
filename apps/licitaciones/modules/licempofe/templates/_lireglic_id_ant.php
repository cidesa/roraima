<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php echo Catalogo($liempofe,1,array(
  'getprincipal' => 'getCodlic',
  'getsecundario' => 'getDeslic',
  'campoprincipal' => 'codlic',
  'camposecundario' => 'deslic',
  'campobase' => 'lireglic_id',
  ), 'Liemppar_licreglic', 'Lireglic', '', ''); ?>

