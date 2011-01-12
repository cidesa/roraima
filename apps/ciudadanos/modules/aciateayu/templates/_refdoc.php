<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php echo Catalogo($atayudas,7,array(
  'getprincipal' => 'getOrdcom',
  'getsecundario' => 'getDesord',
  'campoprincipal' => 'ordcom',
  'camposecundario'=> 'desord',
  'campobase' => 'refdoc',
  ), 'Caordcom_Aciayudas', 'caordcom', '' );
?>


