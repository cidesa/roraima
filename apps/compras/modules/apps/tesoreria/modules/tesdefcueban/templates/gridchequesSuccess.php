<?php use_helper('Javascript') ?>
<?php use_helper('tabs') ?>
<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('tools') ?>
<?php echo javascript_include_tag('ajax') ?>
<?php use_helper('Grid'); ?>
<?php use_helper('PopUp') ?>

<div id="divGrid">
<?
echo grid_tag($objGriChe);
?>
</div>

