<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php $arrsal=$params['arrsal'];?>

  <?php if($labels['npdefespparpre{tipsalvacven}']!='.:') { ?>
  <?php echo label_for('npdefespparpre[tipsalvacven]', __($labels['npdefespparpre{tipsalvacven}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('npdefespparpre{tipsalvacven}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npdefespparpre{tipsalvacven}')): ?>
    <?php echo form_error('npdefespparpre{tipsalvacven}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
     
  
  <?php echo select_tag('npdefespparpre[tipsalvacven]', options_for_select($arrsal,$npdefespparpre->getTipsalvacven(), array (
  'control_name' => 'npdefespparpre[tipsalvacven]',
))); ?>
      
		
  <?php if($labels['npdefespparpre{tipsalvacven}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

<br>
<br>


