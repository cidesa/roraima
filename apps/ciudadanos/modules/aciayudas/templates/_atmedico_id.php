<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php echo Catalogo($atayudas,6,array(
  'getprincipal' => 'getCedrifmed',
  'getsecundario' => 'getNombremed',
  'campoprincipal' => 'cedrifmed',
  'camposecundario'=> 'nombremed',
  'campobase' => 'atmedico_id',
  ), 'Atmedico_Aciayudas', 'atmedico', '' );
  echo "&nbsp;&nbsp;&nbsp;&nbsp;". "<a href=\"javascript: var w = window.open('/ciudadanos'+getEnv()+'.php/acimedico/create','','dependent=1,toolbar=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=1,width=ancho,height=alto')\">Nuevo Medico Tratante</a>"
?>
