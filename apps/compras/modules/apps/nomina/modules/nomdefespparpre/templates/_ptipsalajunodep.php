<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php $arrsal=$params['arrsal'];?>

  <?php if($labels['npdefespparpre{tipsalajunodep}']!='.:') { ?>
  <?php echo label_for('npdefespparpre[tipsalajunodep]', __($labels['npdefespparpre{tipsalajunodep}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('npdefespparpre{tipsalajunodep}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npdefespparpre{tipsalajunodep}')): ?>
    <?php echo form_error('npdefespparpre{tipsalajunodep}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
     
  
  <?php echo select_tag('npdefespparpre[tipsalajunodep]', options_for_select($arrsal,$npdefespparpre->getTipsalajunodep(), array (

))); ?>
      
		
  <?php if($labels['npdefespparpre{tipsalajunodep}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 



