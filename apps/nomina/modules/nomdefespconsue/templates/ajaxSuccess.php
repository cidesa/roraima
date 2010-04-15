<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php $value = get_partial('casep', array('type' => 'edit', 'npasiconsue' => $npasiconsue,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
