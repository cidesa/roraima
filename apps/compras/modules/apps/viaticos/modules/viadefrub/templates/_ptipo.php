<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php $arrtipo=$params['arrtipo'];?>

  <?php if($labels['viadefrub{tipo}']!='.:') { ?>
  <?php echo label_for('viadefrub[tipo]', __($labels['viadefrub{tipo}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('viadefrub{tipo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viadefrub{tipo}')): ?>
    <?php echo form_error('viadefrub{tipo}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>


  <?php echo select_tag('viadefrub[tipo]', options_for_select($arrtipo,$viadefrub->getTipo(), array (

))); ?>


  <?php if($labels['viadefrub{tipo}']!='.:') { ?>



  </div>
  <?php  } ?>



