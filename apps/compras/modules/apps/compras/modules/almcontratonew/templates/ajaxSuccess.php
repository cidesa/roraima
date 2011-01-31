<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php $value = get_partial('grid3', array('type' => 'edit', 'caordcon' => $caordcon,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>