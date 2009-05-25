<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>
<?php if($cond==1) {?>
<div id='divgridvaca'>
<?php
echo grid_tag_v2($objvaca); ?>	
  <?php echo __('Total Vacaciones: ')?>
  <?php echo input_tag('total_vac', '0,00', array (
  'readonly' => true)); ?>  
</div>
<?php }elseif($cond==2){?>
<div id='divgridasig'>
<?php
echo grid_tag_v2($objasig); ?>
	<?php echo __('Total Asignaciones: ')?>
	<?php echo input_tag('total_asi', '0,00', array (
	'readonly' => true)); ?>  		
</div>
<?php }elseif($cond==3){?>
<div id='divgriddeduc'>
<?php
echo grid_tag_v2($objdeduc); ?>  
  <?php echo __('Total Deducciones: ')?>
  <?php echo input_tag('total_ded', '0,00', array (
  'readonly' => true)); ?>  
  <br><br>
  <?php echo __('Total Liquidacion: &nbsp')?>
  <?php echo input_tag('total_liq', '0,00', array (
  'readonly' => true)); ?> 
</div>
<?php }?>
<script language="JavaScript">
	$('total_liq').value = number_format(FloatVEtoFloat($('total_vac').value) + FloatVEtoFloat($('total_asi').value) - FloatVEtoFloat($('total_ded').value),"2",",",".");		
</script>