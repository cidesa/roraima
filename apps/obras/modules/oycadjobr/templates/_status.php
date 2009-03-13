<?php
/*
 * Created on 12/10/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>

  <?php $value = object_checkbox_tag($ocadjobr, 'getStatus', array (
  'disabled'  =>  $ocadjobr->getStatus()!='' ? true : false ,
  'control_name' => 'ocadjobr[status]',
  'onClick' => "validaradj()"
)); echo $value ? $value : '&nbsp;' ?>