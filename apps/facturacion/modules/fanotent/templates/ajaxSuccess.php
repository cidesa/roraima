<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid', 'Javascript') ?>

<?php $value = get_partial('grid', array('fanotent' => $fanotent)); echo $value ? $value : '&nbsp;'; ?>

<?
   //include_partial('grid', array( 'fanotent' => $fanotent ));
?>
