<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php $revision=$params['revision']?>
<div id="divrev">
  <?php if($labels['giproanu{revanoindg}']!='.:') { ?>
  <?php echo label_for('giproanu[revanoindg]', __($labels['giproanu{revanoindg}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('giproanu{revanoindg}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('giproanu{revanoindg}')): ?>
    <?php echo form_error('giproanu{revanoindg}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
     
  
  <?php echo select_tag('giproanu[revanoindg]', options_for_select($revision,$giproanu->getRevanoindg(), array (

))); ?>
      
		
  <?php if($labels['giproanu{revanoindg}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 
</div>


