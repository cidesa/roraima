<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?
 if  ($obj){
 	echo grid_tag_V2($obj);
 }

?>
