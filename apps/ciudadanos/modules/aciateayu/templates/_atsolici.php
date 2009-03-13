<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php echo Catalogo($atayudas,3,array(
  'getprincipal' => 'getCedsol',
  'getsecundario' => 'getNomsol',
  'campoprincipal' => 'cedsol',
  'camposecundario'=> 'nomsol',
  'campobase' => 'atsolici',
  ), 'Atsolici_Aciayudas', 'atciudadano', '' );
      echo "&nbsp;&nbsp;&nbsp;&nbsp;"."<a href=\"javascript: var w = window.open('/ciudadanos_dev.php/aciciudadano/create')\">Nuevo Ciudadano</a>"
?>


