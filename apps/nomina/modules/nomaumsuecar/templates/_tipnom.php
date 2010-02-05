<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php $arrnom=$params['arrnom'];?>

  <?php if($labels['npcargos{codnom}']!='.:') { ?>
  <?php echo label_for('npcargos[codnom]', __($labels['npcargos{codnom}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('npcargos{codnom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npcargos{codnom}')): ?>
    <?php echo form_error('npcargos{codnom}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
     
  
  <?php echo select_tag('npcargos[codnom]', options_for_select($arrnom,$npcargos->getCodnom()), array (
   'onChange'=> remote_function(array(
			  'update'   => 'divgridcargos',
			  'url'      => 'nomaumsuecar/ajax',
			  'complete' => 'AjaxJSON(request, json)',
			  'with' => "'ajax=1&codigo='+$('npcargos_codnom').value",
			        )),
)); ?>
      
		
  <?php if($labels['npcargos{codnom}']!='.:') { ?>  
   
  </div>
  <?php  } ?> 



