<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
 <?php $value = object_input_date_tag($casalalm, 'getFecsal', array (
  'size' => 11,
  'maxlength' => 10,
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'casalalm[fecsal]',
  'date_format' => 'dd/MM/yyyy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
   'readonly'  =>  $casalalm->getId()!='' ? true : false,
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>