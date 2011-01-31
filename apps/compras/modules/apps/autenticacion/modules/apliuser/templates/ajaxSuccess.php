<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php echo grid_tag($obj);?>

<?php echo input_hidden_tag('totalfilas', $totfil) ?>