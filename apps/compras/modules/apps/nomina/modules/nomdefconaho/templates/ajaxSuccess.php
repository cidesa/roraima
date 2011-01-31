<?php
/*
 * Created on 01/11/2007
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php use_helper('Object', 'Validation', 'Javascript', 'Grid') ?>
<?php echo javascript_include_tag('ajax') ?>
<?php  echo grid_tag($obj);?>

