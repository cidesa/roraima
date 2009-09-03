<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php $indi=$params['indi']?>

<div id="divindg">
  <?php if($labels['giproanu{numindg}']!='.:') { ?>
  <?php echo label_for('giproanu[numindg]', __($labels['giproanu{numindg}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('giproanu{numindg}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('giproanu{numindg}')): ?>
    <?php echo form_error('giproanu{numindg}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
     
  
  <?php echo select_tag('giproanu[numindg]', options_for_select($indi,$giproanu->getNumindg(), array (

))); ?>
      
		
  <?php if($labels['giproanu{numindg}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 
</div>



