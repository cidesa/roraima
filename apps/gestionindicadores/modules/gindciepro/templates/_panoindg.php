<div id="divanoindg">
  <?php if($labels['giproanu{anoindg}']!='.:') { ?>
  <?php echo label_for('giproanu[anoindg]', __($labels['giproanu{anoindg}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('giproanu{anoindg}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('giproanu{anoindg}')): ?>
    <?php echo form_error('giproanu{anoindg}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($giproanu, 'getAnoindg', array (
  'size' => 10,
  'onKeyPress' => 'javascript:return validaEntero(event)',
  'control_name' => 'giproanu[anoindg]',
  'maxlength' => 4,
  'onBlur'=> remote_function(array(
			  'update'   => 'divrev',
			  'url'      => 'gindciepro/ajax',
			  'complete' => 'AjaxJSON(request, json)',
			  'with' => "'ajax=1&codigo='+this.value",
			        )),
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['giproanu{anoindg}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>