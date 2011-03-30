<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

  <?php if($labels['licomint{tipcon}']!='.:') { ?>
  <?php echo label_for('licomint[tipcon]', __($labels['licomint{tipcon}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('licomint{tipcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('licomint{tipcon}')): ?>
    <?php echo form_error('licomint{tipcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>


  <?php echo select_tag('licomint[tipcon]', options_for_select(array('B'=>'Bienes','S'=>'Servicio'),$licomint->getTipcon()), array (
)); ?>


  <?php if($labels['licomint{tipcon}']!='.:') { ?>



  </div>
  <?php  } ?>
