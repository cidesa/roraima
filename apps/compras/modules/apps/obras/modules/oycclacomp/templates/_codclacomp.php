<?php
/*
 * Created on 12/10/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
  <?php $value = object_input_tag($occlacomp, 'getCodclacomp', array (
  'size' => 20,
  'control_name' => 'occlacomp[codclacomp]',
  'maxlenght' => 5,
  'readonly'  =>  $occlacomp->getId()!='' ? true : false ,
)); echo $value ? $value : '&nbsp;' ?>