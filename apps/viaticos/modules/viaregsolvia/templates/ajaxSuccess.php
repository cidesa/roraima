<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?	//echo $ciudad. " 5555";
	if (!isset($ciudad) ){  ?>
	<input type="button" name="Submit" value="      Cerrar" class="sf_admin_action_cancel" onclick="javascript:GuardarDatos();$('divGrid').hide();" />
	<br><br>

	<?php  echo grid_tag_v2($viaregsolvia->getObjgastos());  	?>

<?php //echo label_for('',__('Total Gastos') , 'class="required" Style="width:80px"') ?>
<?php //echo input_tag('total_gastos','0,00', 'size=10 class=grid_txtright readonly=true') ?>



<?  }else{  //echo "88888888888";?>

	<?php echo options_for_select($ciudad,'occiudad_id','include_custom=Seleccione...');?>

<? } ?>

