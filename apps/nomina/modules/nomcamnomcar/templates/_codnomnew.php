<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php echo Catalogo($npasicaremp,0,array(
  'getprincipal' => 'getCodnomnew',
  'getsecundario' => 'getNomnomnew',
  'campoprincipal' => 'codnom',
  'camposecundario'=> 'nomnomnew',
  'campobase' => 'id',
  ), 'Npnomina_Presnomtipcon', 'npnomina', '', '' );
?>


