
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'Javascript', 'Grid', 'I18N', 'PopUp') ?>
<?php use_helper('tabs') ?>
<?php echo javascript_include_tag('ajax') ?>
<?php echo javascript_include_tag('tools') ?>

<div id="div_recargo" class="form-row">
<?
	echo grid_tag($obj2);
?>
</div>