<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<div id="divgridben">   

<?php $obj_ben=$params['obj_ben'];?>	    
<?php echo grid_tag_v2($obj_ben); ?>	  

</div>
<table>
	<tr>
		<th><?php echo input_tag('', '', array ('readonly' => true,'size' => 95,'style' => 'border:none')); ?></th>
		<th><?php echo __('Total: ')?>
			<?php echo input_tag('ben_total', '0,00', array ('readonly' => true)); ?>  		
		</th>
	</tr>
</table>

<script language="JavaScript">
    if($('npmaeemb_tipcal_mon').checked==true)
	{
		$('divgridcon').hide();
		$('divmontotemb').show();	
	}else if($('npmaeemb_tipcal_por').checked==true)
	{
		$('divgridcon').show();
		$('divmontotemb').hide();
	}else
	{
		$('divgridcon').hide();
		$('divmontotemb').hide();
	}	

	var c = obtener_filas_grid('b',1);
	var acuval = 0;
	for(i=0;i< (c-1) ;i++)
	 {
		     var  ida = 'bx_'+i+'_4';
			 if($(ida))
			 {
			 	var  val = $(ida).value; 				     
			    if(parseFloat(val))				
					acuval = parseFloat(acuval) + parseFloat(val);									   	       	
			 }	
	 }
	 $('ben_total').value = number_format(acuval,2,',','.');

</script>
