<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php $arrtipdia=$params['arrtipdia'];?>

  <?php if($labels['viadefrub{tipdia}']!='.:') { ?>
  <?php echo label_for('viadefrub[tipdia]', __($labels['viadefrub{tipdia}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('viadefrub{tipdia}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viadefrub{tipdia}')): ?>
    <?php echo form_error('viadefrub{tipdia}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>


  <?php echo select_tag('viadefrub[tipdia]', options_for_select($arrtipdia,$viadefrub->getTipdia(), array (

))); ?>


  <?php if($labels['viadefrub{tipdia}']!='.:') { ?>



  </div>
  <?php  } ?>



