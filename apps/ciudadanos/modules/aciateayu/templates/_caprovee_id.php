<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php echo Catalogo($atayudas,6,array(
  'getprincipal' => 'getRifpro',
  'getsecundario' => 'getNompro',
  'campoprincipal' => 'rifpro',
  'camposecundario'=> 'nompro',
  'campobase' => 'atprovee_id',
  ), 'Atprovee_Aciayudas', 'atprovee', '' );
?>
