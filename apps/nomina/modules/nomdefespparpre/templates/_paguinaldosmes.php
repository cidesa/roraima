<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<table>
	<tr>		
		<th>
			<div id="divporanoant">
			  <?php if($labels['npdefespparpre{aguicom}']!='.:') { ?>
			  <?php echo label_for('npdefespparpre[aguicom]', __($labels['npdefespparpre{aguicom}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
			  <div class="divlado<?php if ($sf_request->hasError('npdefespparpre{aguicom}')): ?> form-error<?php endif; ?>">
			  <?php if ($sf_request->hasError('npdefespparpre{aguicom}')): ?>
			    <?php echo form_error('npdefespparpre{aguicom}', array('class' => 'form-error-msg')) ?>
			  <?php endif; }?>  
			  
			   
			  
			  <?php $value = object_checkbox_tag($npdefespparpre, 'getAguicom', array (
			  'control_name' => 'npdefespparpre[aguicom]',
			)); echo $value ? $value : '&nbsp;' ?>
			      
					
			  <?php if($labels['npdefespparpre{aguicom}']!='.:') { ?>  
			  
			
			   
			  </div>
			  <?php  } ?> 
			
			</div>
		</th>
		<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
		<th>
			<div id="divnumdiaant">
			  <?php if($labels['npdefespparpre{apartirmes}']!='.:') { ?>
			  <?php echo label_for('npdefespparpre[apartirmes]', __($labels['npdefespparpre{apartirmes}' ]), 'class="required" Style="text-align:left; width:143px"') ?>
			  <div class="divlado<?php if ($sf_request->hasError('npdefespparpre{apartirmes}')): ?> form-error<?php endif; ?>">
			  <?php if ($sf_request->hasError('npdefespparpre{apartirmes}')): ?>
			    <?php echo form_error('npdefespparpre{apartirmes}', array('class' => 'form-error-msg')) ?>
			  <?php endif; }?>  
			  
			   
			  
			  <?php $value = object_input_tag($npdefespparpre, 'getApartirmes', array (
			  'size' => 7,
			  'onKeyPress' => 'javascript:return validaEntero(event)',
			  'control_name' => 'npdefespparpre[apartirmes]',
			)); echo $value ? $value : '&nbsp;' ?>
			      
					
			  <?php if($labels['npdefespparpre{apartirmes}']!='.:') { ?>  
			  
			
			   
			  </div>
			  <?php  } ?> 
			
			</div>			
		</th>
	</tr>
</table>


<script language="JavaScript">
	var p = '<?php echo $npdefespparpre->getAguicom()?>';
	if(p!='S')
		$('npdefespparpre_aguicom').checked=false;
	else
		$('npdefespparpre_aguicom').checked=true;

</script>
