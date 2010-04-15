

<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<br/>
<br/>

<div id='divgridasig'>
<?php
echo grid_tag_v2($npliquidacion_det->getObjasig()); ?>
	<?php echo __('Total Asignaciones: ')?>
	<?php echo input_tag('total_asi', '0,00', array (
	'readonly' => true)); ?>
</div>
<script language="JavaScript">
var c = obtener_filas_grid('a',1);
var acuval = 0;
for(i=0;i< (c-1) ;i++)
 {
 	if($('ax_'+i+'_5').value=='AUT')
	{
	   $('ax_'+i+'_0').hide();
	   $('popup_a_'+i+'_1').hide();
	   if($('ax_'+i+'_4').value!='<!titulo presupuestario no existe!>')
	       $('popup_a_'+i+'_3').hide();
	   for(j=0;j<=6;j++)
	   {
	   	  $('ax_'+i+'_'+j).readOnly=true;
	   }
	}
	<?php
	   if ($sf_request->hasErrors())
	   {?>
	     var  ida = 'ax_'+i+'_2';
		 var  val = $(ida).value;

	     if($(ida))
		    if(parseFloat(val))
			{
				acuval = parseFloat(acuval) + parseFloat($(ida).value);
				$(ida).value=number_format($(ida).value,2,',','.');
			}
	<?php } ?>
 }
 $('total_asi').value = number_format(acuval,2,',','.');



</script>

