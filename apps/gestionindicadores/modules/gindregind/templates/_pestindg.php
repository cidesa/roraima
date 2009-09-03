<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php $estatus=array('A'=>'Activo','I'=>'Inactivo')?>

  <?php if($labels['giregind{estindg}']!='.:') { ?>
  <?php echo label_for('giregind[estindg]', __($labels['giregind{estindg}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('giregind{estindg}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('giregind{estindg}')): ?>
    <?php echo form_error('giregind{estindg}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
     
  
  <?php echo select_tag('giregind[estindg]', options_for_select($estatus,$giregind->getEstindg(), array (

))); ?>
      
		
  <?php if($labels['giregind{estindg}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 



