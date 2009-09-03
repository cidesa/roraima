<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php $trimestre=$params['trimestre'];?>
<div id="divtri" >
  <?php if($labels['giproanu{numtrim}']!='.:') { ?>
  <?php echo label_for('giproanu[numtrim]', __($labels['giproanu{numtrim}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('giproanu{numtrim}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('giproanu{numtrim}')): ?>
    <?php echo form_error('giproanu{numtrim}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
     
  
  <?php echo select_tag('giproanu[numtrim]', options_for_select($trimestre,$giproanu->getNumtrim(), array (

))); ?>
      
		
  <?php if($labels['giproanu{numtrim}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 
</div>