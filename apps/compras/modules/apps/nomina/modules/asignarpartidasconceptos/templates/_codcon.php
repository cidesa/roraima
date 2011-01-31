<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php echo Catalogo($npdefcpt,1,array(
  'getprincipal' => 'getCodcon',
  'getsecundario' => 'getNomcon',
  'campoprincipal' => 'codcon',
  'camposecundario'=> 'nomcon',
  'campobase' => 'id',
  ), 'Npdefcpt_asignarcategoriaxemp', 'Npdefcpt', '','','grid',1 );
?>
