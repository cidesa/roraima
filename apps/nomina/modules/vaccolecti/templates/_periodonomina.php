<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<?php  
$arranos=$params['arranos'];
$arranom=$params['arranom'];
?>
<table>
<tr>
 <th>
  <?php echo label_for('npvacdisfrute[perini]', __($labels['npvacdisfrute{perini}']), 'class="required" ') ?>
	<div class="content<?php if ($sf_request->hasError('npvacdisfrute{perini}')): ?> form-error<?php endif; ?>">
	<?php if ($sf_request->hasError('npvacdisfrute{perini}')): ?>
	  <?php echo form_error('npvacdisfrute{perini}', array('class' => 'form-error-msg')) ?>
	<?php endif; ?>
		
	<?php echo select_tag('npvacdisfrute[perini]', options_for_select($arranos,$npvacdisfrute->getPerini()),array(
	   'onChange'=> remote_function(array(
	   'update'   => 'gridvacaciones',
	   'url'      => 'vaccolecti/ajax',
	   'complete' => 'AjaxJSON(request, json)',
	   'with' => "'ajax=1&perini='+this.value+'&cajaperfin=npvacdisfrute_perfin&nomina='+$(npvacdisfrute_codnom).value",
	 ))));?>
 </th>
 <th>&nbsp&nbsp</th>
 <th>
  <?php echo label_for('npvacdisfrute[perfin]', __($labels['npvacdisfrute{perfin}']), 'class="required"') ?>
	<div class=" content<?php if ($sf_request->hasError('npvacdisfrute{perfin}')): ?> form-error<?php endif; ?>">
	  <?php if ($sf_request->hasError('npvacdisfrute{perfin}')): ?>
	    <?php echo form_error('npvacdisfrute{perfin}', array('class' => 'form-error-msg')) ?>
	  <?php endif; ?>
	<?php $value = object_input_tag($npvacdisfrute, 'getPerfin', array (
	'size' => 7,
	'control_name' => 'npvacdisfrute[perfin]',
	'readonly' => true,
	)); echo $value ? $value : '&nbsp;' ?> 	
 </th>
  <th>&nbsp&nbsp</th>
 <th>
  <?php echo label_for('npvacdisfrute[codnom]', __($labels['npvacdisfrute{codnom}']), 'class="required"') ?>
	<div class=" content<?php if ($sf_request->hasError('npvacdisfrute{codnom}')): ?> form-error<?php endif; ?>">
	  <?php if ($sf_request->hasError('npvacdisfrute{codnom}')): ?>
	    <?php echo form_error('npvacdisfrute{codnom}', array('class' => 'form-error-msg')) ?>
	  <?php endif; ?>
	<?php echo select_tag('npvacdisfrute[codnom]', options_for_select($arranom,$npvacdisfrute->getCodnom()),array(
	    'onChange'=> remote_function(array(
	    'update'   => 'gridvacaciones',
	    'url'      => 'vaccolecti/ajax',
	    'complete' => 'AjaxJSON(request, json)',
	    'with' => "'ajax=1&perini='+$(npvacdisfrute_perini).value+'&cajaperfin=npvacdisfrute_perfin&nomina='+this.value",
	  ))));?> 	
 </th>
</tr>	
</table>
<script language="JavaScript">
	$('npvacdisfrute_perfin').value= parseInt($('npvacdisfrute_perini').value)+1;	
</script>	
	