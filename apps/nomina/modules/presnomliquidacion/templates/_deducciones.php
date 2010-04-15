

<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<br/>
<br/>

<div id='divgriddeduc'>
<?php
echo grid_tag_v2($npliquidacion_det->getObjdeduc()); ?>
	  <?php echo __('Total Deducciones: ')?>
	  <?php echo input_tag('total_ded', '0,00', array (
	  'readonly' => true)); ?> 
	  <br><br> 
	  <?php echo __('Total Liquidacion: &nbsp')?>
	  <?php echo input_tag('total_liq', '0,00', array (
	  'readonly' => true)); ?>  
</div>
<script language="JavaScript">
var c = obtener_filas_grid('b',1);
var acuval = 0;
for(i=0;i< (c-1) ;i++)
 {
 	if($('bx_'+i+'_5').value=='AUT')
	{
	   $('bx_'+i+'_0').hide();
	   $('popup_b_'+i+'_1').hide();
	   if($('bx_'+i+'_4').value!='<!titulo presupuestario no existe!>')
	       $('popup_b_'+i+'_3').hide();
	   for(j=0;j<=6;j++)
	   {
	   	  $('bx_'+i+'_'+j).readOnly=true;  
	   }	  
	}
	<?php 
	   if ($sf_request->hasErrors())
	   {?>
	     var  ida = 'bx_'+i+'_2';
		 var  val = $(ida).value; 

	     if($(ida))
		    if(parseFloat(val))
			{
				acuval = parseFloat(acuval) + parseFloat($(ida).value);
				$(ida).value=number_format($(ida).value,2,',','.');
			}
	<?php } ?>	 	
 }
 $('total_ded').value = number_format(acuval,2,',','.'); 	
 	$('total_liq').value = number_format(FloatVEtoFloat($('total_asi').value) - FloatVEtoFloat($('total_ded').value),"2",",",".");		
</script>
