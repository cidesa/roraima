<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<div id="divtipcal">   
<fieldset>
<legend><?php echo __('Tipo de Calculo')?></legend>	
 <?php $val1=$params['val1'];?>
  <?php $val2=$params['val2'];?>
  <?php $val3=$params['val3'];?>
<br>
  &nbsp;&nbsp;&nbsp;
  <?php echo radiobutton_tag('rhdefniv[tipcal]','1',$val1,array(
    'id' => 'rhdefniv_tipcal_1',
  )); ?>
  &nbsp;
  <?php echo __('Suma Puntuación)')?>  
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <?php echo radiobutton_tag('rhdefniv[tipcal]','2',$val2,array(
    'id' => 'rhdefniv_tipcal_2',
  )); ?>
  &nbsp;
  <?php echo __('Sum(Peso*Puntuación)')?>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <?php echo radiobutton_tag('rhdefniv[tipcal]','3',$val3,array(
    'id' => 'rhdefniv_tipcal_3',
  )); ?>
  &nbsp;
  <?php echo __('(Sum(Peso*Puntuación)/item)*C%')?>

<br>
<br>	
</fieldset>

</div>