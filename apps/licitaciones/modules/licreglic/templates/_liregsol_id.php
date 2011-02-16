<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php echo Catalogo($lireglic,4,array(
  'getprincipal' => 'getNumemo',
  'getsecundario' => 'getNompro',
  'campoprincipal' => 'numemo',
  'camposecundario'=> 'nompro',
  'campobase' => 'id',
  ), 'Limemoran_numemo', 'limemoran', '', '' );
?>
