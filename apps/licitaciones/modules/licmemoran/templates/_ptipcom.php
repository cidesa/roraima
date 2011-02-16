<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

  <?php if($labels['limemoran{tipcom}']!='.:') { ?>
  <?php echo label_for('limemoran[tipcom]', __($labels['limemoran{tipcom}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('limemoran{tipcom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('limemoran{tipcom}')): ?>
    <?php echo form_error('limemoran{tipcom}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>


  <?php echo select_tag('limemoran[tipcom]', options_for_select(array('N'=>'Nacional','I'=>'Internacional'),$limemoran->getTipcom()), array (   
)); ?>


  <?php if($labels['limemoran{tipcom}']!='.:') { ?>



  </div>
  <?php  } ?>
