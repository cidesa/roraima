<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php $arrsal=$params['arrsal'];?>

<table>
	<tr>
		<th>
			<div id="divnumdiaant">
			  <?php if($labels['npdefespparpre{numdiaant}']!='.:') { ?>
			  <?php echo label_for('npdefespparpre[numdiaant]', __($labels['npdefespparpre{numdiaant}' ]), 'class="required" Style="text-align:left; width:143px"') ?>
			  <div class="divlado<?php if ($sf_request->hasError('npdefespparpre{numdiaant}')): ?> form-error<?php endif; ?>">
			  <?php if ($sf_request->hasError('npdefespparpre{numdiaant}')): ?>
			    <?php echo form_error('npdefespparpre{numdiaant}', array('class' => 'form-error-msg')) ?>
			  <?php endif; }?>  
			  
			   
			  
			  <?php $value = object_input_tag($npdefespparpre, 'getNumdiaant', array (
			  'size' => 7,
			  'onKeyPress' => 'javascript:return validaEntero(event)',
			  'control_name' => 'npdefespparpre[numdiaant]',
			)); echo $value ? $value : '&nbsp;' ?>
			      
					
			  <?php if($labels['npdefespparpre{numdiaant}']!='.:') { ?>  
			  
			
			   
			  </div>
			  <?php  } ?> 
			
			</div>			
		</th>
		<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
		<th>
			<div id="divporanoant">
			  <?php if($labels['npdefespparpre{poranoant}']!='.:') { ?>
			  <?php echo label_for('npdefespparpre[poranoant]', __($labels['npdefespparpre{poranoant}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
			  <div class="divlado<?php if ($sf_request->hasError('npdefespparpre{poranoant}')): ?> form-error<?php endif; ?>">
			  <?php if ($sf_request->hasError('npdefespparpre{poranoant}')): ?>
			    <?php echo form_error('npdefespparpre{poranoant}', array('class' => 'form-error-msg')) ?>
			  <?php endif; }?>  
			  
			   
			  
			  <?php $value = object_checkbox_tag($npdefespparpre, 'getPoranoant', array (
			  'control_name' => 'npdefespparpre[poranoant]',
			)); echo $value ? $value : '&nbsp;' ?>
			      
					
			  <?php if($labels['npdefespparpre{poranoant}']!='.:') { ?>  
			  
			
			   
			  </div>
			  <?php  } ?> 
			
			</div>
		</th>
	</tr>
</table>
<br>

  <?php if($labels['npdefespparpre{tipsaldiaant}']!='.:') { ?>
  <?php echo label_for('npdefespparpre[tipsaldiaant]', __($labels['npdefespparpre{tipsaldiaant}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('npdefespparpre{tipsaldiaant}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npdefespparpre{tipsaldiaant}')): ?>
    <?php echo form_error('npdefespparpre{tipsaldiaant}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
     
  
  <?php echo select_tag('npdefespparpre[tipsaldiaant]', options_for_select($arrsal, $npdefespparpre->getTipsaldiaant(), array (
  'control_name' => 'npdefespparpre[tipsaldiaant]',
))); ?>
      
		
  <?php if($labels['npdefespparpre{tipsaldiaant}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 


<script language="JavaScript">
	var p = '<?php echo $npdefespparpre->getPoranoant()?>';
	if(p!='S')
		$('npdefespparpre_poranoant').checked=false;
	else
		$('npdefespparpre_poranoant').checked=true;
	
</script>
