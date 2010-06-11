<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?
 if(count($precios)!=0) {
  echo options_for_select($precios,'','include_custom=Seleccione...');
 }
?>
