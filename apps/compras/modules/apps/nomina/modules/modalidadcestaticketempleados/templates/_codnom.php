<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

echo Catalogo($npnomina,1,array(
  'getprincipal' => 'getCodnom',
  'getsecundario' => 'getNomnom',
  'campoprincipal' => 'codnom',
  'camposecundario' => 'nomnom',
  'campobase' => 'npnomina',
  ), 'modalidadcestaticketempleados_Npnomina', 'Npnomina','','','grid1',1);

?>
