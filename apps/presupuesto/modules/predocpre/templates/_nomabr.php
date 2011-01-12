<?php
/*
 * Created on 08/02/2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
  <?php $value = object_input_tag($cpdocprc, 'getNomabr', array (
  'size' => 5,
  'control_name' => 'cpdocprc[nomabr]',
  'readonly'  =>  ($cpdocprc->getId()!='' && $cpdocprc->getEtadef()=='C') ? true : false ,
  'onblur' => 'convertirMayusculas(this.id)',
  'maxlength' => 4,
)); echo $value ? $value : '&nbsp;' ?>