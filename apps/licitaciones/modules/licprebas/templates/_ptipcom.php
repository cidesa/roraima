<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

  <?php if($labels['liprebas{tipcom}']!='.:') { ?>
  <?php echo label_for('liprebas[tipcom]', __($labels['liprebas{tipcom}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('liprebas{tipcom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('liprebas{tipcom}')): ?>
    <?php echo form_error('liprebas{tipcom}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>


  <?php echo select_tag('liprebas[tipcom]', options_for_select(array('N'=>'Nacional','I'=>'Internacional'),$liprebas->getTipcom()), array (   
)); ?>


  <?php if($labels['liprebas{tipcom}']!='.:') { ?>



  </div>
  <?php  } ?>
