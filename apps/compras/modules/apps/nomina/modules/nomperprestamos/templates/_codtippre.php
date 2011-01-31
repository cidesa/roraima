<?php
/*
 * Created on 13/03/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
 <?php $value = input_tag('nptippre[codtippre]', $nptippre->getCodtippre(), array (
  'size' => 20,
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;
  <?php $value = input_tag('nptippre[destippre]', $nptippre->getDestippre(), array (
  'size' => 80,
   'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>
