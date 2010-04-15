<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<br/>
<br/>

<div id='divgridvaca'>
<?php
echo grid_tag_v2($npliquidacion_det->getObjvaca()); ?>
  <?php echo __('Total Vacaciones: ')?>
  <?php echo input_tag('total_vac', '0,00', array (
  'readonly' => true)); ?>  
  <br>
</div>

<script language="JavaScript">
var c = obtener_filas_grid('c',1);
var acuval = 0;
for(i=0;i< (c-1) ;i++)
 {
	<?php 
	   if ($sf_request->hasErrors())
	   {?>
	     var  ida = 'cx_'+i+'_6';
		 var  val = $(ida).value; 		 
	     if($(ida))
		    if(parseFloat(val))
			{
				acuval = parseFloat(acuval) + parseFloat(val);
				$(ida).value=number_format($(ida).value,2,',','.');
			}	   	       
	<?php } ?>	 	
 }
 $('total_vac').value = number_format(acuval,2,',','.');
</script>
