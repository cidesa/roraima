<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php echo Catalogo($cobtransa,6,array(
  'getprincipal' => 'getCodtip',
  'getsecundario' => 'getDestip',
  'campoprincipal' => 'codtip',
  'camposecundario' => 'destip',
  'campobase' => 'codtip_id',
  ), 'Opdefemp_pagdefemp3', 'Tstipmov', '', ''); ?>

<ul class="sf_admin_actions" >
<li class="float-center">
<input id="acepta" class="sf_admin_action_save" type="button" value="Aceptar" onClick="aceptartip();">
</li>
</ul>
