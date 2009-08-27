<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php $arrsal=$params['arrsal'];?>

  <?php if($labels['npdefespparpre{tipsalbonfinanofra}']!='.:') { ?>
  <?php echo label_for('npdefespparpre[tipsalbonfinanofra]', __($labels['npdefespparpre{tipsalbonfinanofra}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('npdefespparpre{tipsalbonfinanofra}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npdefespparpre{tipsalbonfinanofra}')): ?>
    <?php echo form_error('npdefespparpre{tipsalbonfinanofra}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
     
  
  <?php echo select_tag('npdefespparpre[tipsalbonfinanofra]', options_for_select($arrsal,$npdefespparpre->getTipsalbonfinanofra(), array (
  'control_name' => 'npdefespparpre[tipsalbonfinanofra]',
))); ?>
      
		
  <?php if($labels['npdefespparpre{tipsalbonfinanofra}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

<br>
<br>


