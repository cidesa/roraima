<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

  <?php if($labels['liprebas{tipcon}']!='.:') { ?>
  <?php echo label_for('liprebas[tipcon]', __($labels['liprebas{tipcon}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('liprebas{tipcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('liprebas{tipcon}')): ?>
    <?php echo form_error('liprebas{tipcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>


  <?php echo select_tag('liprebas[tipcon]', options_for_select(array('B'=>'Bienes','S'=>'Servicio'),$liprebas->getTipcon()), array (
)); ?>


  <?php if($labels['liprebas{tipcon}']!='.:') { ?>



  </div>
  <?php  } ?>
