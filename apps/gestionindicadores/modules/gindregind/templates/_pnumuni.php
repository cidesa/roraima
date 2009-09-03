<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php $unidades=$params['unidades']?>

  <?php if($labels['giregind{numuni}']!='.:') { ?>
  <?php echo label_for('giregind[numuni]', __($labels['giregind{numuni}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('giregind{numuni}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('giregind{numuni}')): ?>
    <?php echo form_error('giregind{numuni}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
     
  
  <?php echo select_tag('giregind[numuni]', options_for_select($unidades,$giregind->getNumuni(), array (

))); ?>
      
		
  <?php if($labels['giregind{numuni}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 



