<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<div id="divtipo">   
  <?php $tipo=array('A'=>'Actvidad','R'=>'Resultado',''=>'Proceso');?>
 
 <?php if($labels['rhdefind{tipind}']!='.:') { ?>
  <?php echo label_for('rhdefind[tipind]', __($labels['rhdefind{tipind}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('rhdefind{tipind}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('rhdefind{tipind}')): ?>
    <?php echo form_error('rhdefind{tipind}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php echo select_tag('rhdefind[tipind]', options_for_select($tipo,$rhdefind->getTipind(), array (
  'control_name' => 'rhdefind[tipind]',
))); ?>
      
		
  <?php if($labels['rhdefind{tipind}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 
</div>