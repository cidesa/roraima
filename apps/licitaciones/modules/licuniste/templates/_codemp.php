<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php echo Catalogo($lidatste,1,array(
  'getprincipal' => 'getCodemp',
  'getsecundario' => 'getNomemp',
  'campoprincipal' => 'codemp',
  'camposecundario'=> 'nomemp',
  'campobase' => 'nphojint_id',
  ), 'Nphojint_Nomasicarconnom', 'nphojint', '' );
?>
