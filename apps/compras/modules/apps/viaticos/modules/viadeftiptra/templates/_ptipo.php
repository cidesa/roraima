<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php $arrtipo=$params['arrtipo'];?>

  <?php if($labels['viadeftiptra{tipo}']!='.:') { ?>
  <?php echo label_for('viadeftiptra[tipo]', __($labels['viadeftiptra{tipo}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('viadeftiptra{tipo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viadeftiptra{tipo}')): ?>
    <?php echo form_error('viadeftiptra{tipo}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>


  <?php echo select_tag('viadeftiptra[tipo]', options_for_select($arrtipo,$viadeftiptra->getTipo(), array (

))); ?>


  <?php if($labels['viadeftiptra{tipo}']!='.:') { ?>



  </div>
  <?php  } ?>



