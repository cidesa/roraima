<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php echo Catalogo($liressol,1,array(
  'getprincipal' => 'getNumsol',
  'getsecundario' => 'getDessol',
  'campoprincipal' => 'numsol',
  'camposecundario'=> 'dessol',
  'campobase' => 'liregsol_id',
  ), 'Liregsol_licressol', 'liregsol', '' );
?>
