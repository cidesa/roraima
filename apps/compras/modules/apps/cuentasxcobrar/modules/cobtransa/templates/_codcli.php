<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>


<?php echo Catalogo($cobtransa,1,array(
  'getprincipal' => 'getCodcli',
  'getsecundario' => 'getNompro',
  'campoprincipal' => 'codcli',
  'camposecundario' => 'nompro',
  'campobase' => 'codpro',
  ), 'Rifcli_Cobdocume', 'Facliente', '', '','grid'); ?>
