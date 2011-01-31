<?php
/*
 * Created on 12/10/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
  <?php $value = object_input_tag($ocadjobr, 'getCodadj', array (
  'size' => 15,
  'control_name' => 'ocadjobr[codadj]',
  'readonly'  =>  $ocadjobr->getId()!='' ? true : false ,
  'maxlength' => 8,
  'onBlur' => 'this.value=this.value.pad(8, \'0\',0);',
)); echo $value ? $value : '&nbsp;' ?>