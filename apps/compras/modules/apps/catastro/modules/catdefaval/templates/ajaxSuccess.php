<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid', 'Javascript') ?>

<?php $value = get_partial('grid', array('type' => 'edit', 'catdefaval' => $catdefaval,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
