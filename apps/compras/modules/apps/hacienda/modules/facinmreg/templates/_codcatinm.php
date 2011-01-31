<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php
$masc=$fcreginm->getMascara();
$lenmasc=strlen($fcreginm->getMascara());
$value = object_input_tag($fcreginm, 'getCodcatinm', array (
  'size' => $lenmasc,
  'maxlength' => $lenmasc,
  'control_name' => 'fcreginm[codcatinm]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$masc')",
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('MUN-PAR-SEC-LOT-MAN-INM-ETC') ?></div>

