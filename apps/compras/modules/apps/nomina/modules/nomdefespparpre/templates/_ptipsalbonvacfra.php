<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php $arrsal=$params['arrsal'];?>

  <?php if($labels['npdefespparpre{tipsalbonvacfra}']!='.:') { ?>
  <?php echo label_for('npdefespparpre[tipsalbonvacfra]', __($labels['npdefespparpre{tipsalbonvacfra}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('npdefespparpre{tipsalbonvacfra}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npdefespparpre{tipsalbonvacfra}')): ?>
    <?php echo form_error('npdefespparpre{tipsalbonvacfra}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
     
  
  <?php echo select_tag('npdefespparpre[tipsalbonvacfra]', options_for_select($arrsal, $npdefespparpre->getTipsalbonvacfra(),array (
  'control_name' => 'npdefespparpre[tipsalbonvacfra]',
))); ?>
      
		
  <?php if($labels['npdefespparpre{tipsalbonvacfra}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

<br>
<br>


