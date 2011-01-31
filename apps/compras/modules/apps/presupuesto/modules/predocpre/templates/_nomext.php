<?php
/*
 * Created on 08/02/2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
  <?php $value = object_input_tag($cpdocprc, 'getNomext', array (
  'size' => 80,
  'readonly'  =>  ($cpdocprc->getId()!='' && $cpdocprc->getEtadef()=='C') ? true : false ,
  'control_name' => 'cpdocprc[nomext]',
)); echo $value ? $value : '&nbsp;' ?>