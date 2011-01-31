<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php echo Catalogo($liregsol,0,array(
  'getprincipal' => 'getCodcom',
  'getsecundario' => 'getDescom',
  'campoprincipal' => 'codcom',
  'camposecundario'=> 'descom',
  'campobase' => 'licomlic_id',
  ), 'Licomlic_licregsol', 'licomlic', '' );
?>
