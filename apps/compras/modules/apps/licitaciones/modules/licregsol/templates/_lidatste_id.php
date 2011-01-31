<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php echo Catalogo($liregsol,0,array(
  'getprincipal' => 'getCoduniste',
  'getsecundario' => 'getDesuniste',
  'campoprincipal' => 'coduniste',
  'camposecundario'=> 'desuniste',
  'campobase' => 'lidatste_id',
  ), 'Lidatste_licregsol', 'lidatste', '' );
?>
