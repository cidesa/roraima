<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php echo Catalogo($atayudas,6,array(
  'getprincipal' => 'getCedrifmed',
  'getsecundario' => 'getNombremed',
  'campoprincipal' => 'cedrifmed',
  'camposecundario'=> 'nombremed',
  'campobase' => 'atmedico_id',
  ), 'Atmedico_Aciayudas', 'atmedico', '' );
?>
