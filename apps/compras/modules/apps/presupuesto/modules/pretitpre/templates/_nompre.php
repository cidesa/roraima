<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<?php $value = object_input_tag($cpdeftit, 'getNompre', array (
  'size' => 68,
  'control_name' => 'cpdeftit[nompre]',
  'readonly'  =>  $cpdeftit->getAsigna()=='S' ? true : false ,
)); echo $value ? $value : '&nbsp;' ?>

