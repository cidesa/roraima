<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>


<?php

$id="'+$('npcestatickets_id').value+'";

echo Catalogo($npcestatickets,0,array(
  'getprincipal' => 'getCodnom',
  'getsecundario' => 'getNomnom',
  'campoprincipal' => 'codnom',
  'camposecundario' => 'nomnom',
  'campobase' => 'npnomina',
  ), 'Nomdefespcestic_Npnomina', 'Npnomina','','','',1);
?>
