<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php echo Catalogo($atayudas,4,array(
  'getprincipal' => 'getCedben',
  'getsecundario' => 'getNomben',
  'campoprincipal' => 'cedben',
  'camposecundario'=> 'nomben',
  'campobase' => 'atbenefi',
  ), 'Atbenefi_Aciayudas', 'atciudadano', '' );
      echo "&nbsp;&nbsp;&nbsp;&nbsp;"."<a href=\"javascript: var w = window.open('/ciudadanos_dev.php/aciciudadano/create')\">Nuevo Paciente</a>"
?>


