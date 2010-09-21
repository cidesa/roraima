 <?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
 <?php
 $criterio="+'&criterio='+$('fcpagos_criterio').value+'&feccor='+$('fcpagos_feccor').value";

//return array('I' => 'Industria y Comercio', 'V' => 'Vehiculo', 'U' => 'Inmuebles Urbanos', 'P' => 'Propaganda Comercial', 'G' => 'General', 'O' => 'Otros Ingresos');

  echo Catalogo($fcpagos,1,array(
  'getprincipal' => 'getRifcon',
  'getsecundario' => 'getNomcon',
  // cajitasss
  'campoprincipal' => 'rifcon',
  'camposecundario' => 'nomcon',
  'campobase' => 'id',
  ), 'Facpicliq_Borrar', 'Fcsollic', '', $criterio, 'gridetalles','1');

//0014455186
  ?>



