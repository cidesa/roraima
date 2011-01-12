<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php echo Catalogo($atayudas,3,array(
  'getprincipal' => 'getCedsol',
  'getsecundario' => 'getNomsol',
  'campoprincipal' => 'cedsol',
  'camposecundario'=> 'nomsol',
  'campobase' => 'atsolici',
  ), 'Atsolici_Aciayudas', 'atciudadano', '' );
      echo "&nbsp;&nbsp;&nbsp;&nbsp;". "<a href=\"javascript: var w = window.open('/ciudadanos'+getEnv()+'.php/aciciudadano/create','','dependent=1,toolbar=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=1,width=ancho,height=alto')\">Nuevo Solicitante</a>"
?>


