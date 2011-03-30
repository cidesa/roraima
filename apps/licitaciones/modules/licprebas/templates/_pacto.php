<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

  <?php if($labels['liprebas{acto}']!='.:') { ?>
  <?php echo label_for('liprebas[acto]', __($labels['liprebas{acto}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('liprebas{acto}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('liprebas{acto}')): ?>
    <?php echo form_error('liprebas{acto}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>


  <?php echo select_tag('liprebas[acto]', options_for_select(array('S'=>'SI','N'=>'NO'),$liprebas->getActo()), array (
)); ?>


  <?php if($labels['liprebas{acto}']!='.:') { ?>



  </div>
  <?php  } ?>
