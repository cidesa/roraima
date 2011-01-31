<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php $value = get_partial('gridper', array('type' => 'edit', 'cidefniv' => $cidefniv)); echo $value ? $value : '&nbsp;' ?>