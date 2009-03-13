<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php echo Catalogo($atayudas,5,array(
  'getprincipal' => 'getRifpro',
  'getsecundario' => 'getNompro',
  'campoprincipal' => 'rifpro',
  'camposecundario'=> 'nompro',
  'campobase' => 'caprovee_id',
  ), 'Caprovee_Aciayudas', 'caprovee', '' );
?>
