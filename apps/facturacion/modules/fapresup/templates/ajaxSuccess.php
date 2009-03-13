<?php

?>

<?php //use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?
// echo grid_tag($obj);
?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid', 'Javascript') ?>
<?php if($ajaxs=='5') { echo options_for_select($precios,'');?>
<?php } else{ ?>
<?php $value = get_partial('grid', array('fapresup' => $fapresup)); echo $value ? $value : '&nbsp;'; ?>
<?php }?>