<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<div id="divtipcal">   
  <?php $valmon=$params['cal_valmon'];?>
  <?php $valpor=$params['cal_valpor'];?>
  <?php echo __('Monto Fijo')?>
  <?php echo radiobutton_tag('npmaeemb[tipcal]','M',$valmon,array(
    'id' => 'npmaeemb_tipcal_mon',
	'onclick' => "$('divgridcon').hide();$('divmontotemb').show();",
  )); ?>
  
  <?php echo __('Valor Porcentual')?>
  <?php echo radiobutton_tag('npmaeemb[tipcal]','P',$valpor,array(
    'id' => 'npmaeemb_tipcal_por',
	'onclick' => "$('divgridcon').show();$('divmontotemb').hide();validarmontoporcentaje();",
  )); ?>

</div>