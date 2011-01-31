<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php $unidades=$params['unidades']?>

  <?php if($labels['giproanu{numuni}']!='.:') { ?>
  <?php echo label_for('giproanu[numuni]', __($labels['giproanu{numuni}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('giproanu{numuni}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('giproanu{numuni}')): ?>
    <?php echo form_error('giproanu{numuni}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
     
  
  <?php echo select_tag('giproanu[numuni]', options_for_select($unidades,$giproanu->getNumuni()), array (
     'onChange'=> remote_function(array(
			  'update'   => 'divindg',
			  'url'      => 'gindproanu/ajax',
			  'condition' => " $('id').value == '' &&  $('giproanu_numuni').value != '' ",
			  'complete' => 'AjaxJSON(request, json)',
			  'with' => "'ajax=1&codigo='+this.value",
			        )),      
)); ?>
      
		
  <?php if($labels['giproanu{numuni}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 



