<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

  <?php if($labels['licomint{tipcom}']!='.:') { ?>
  <?php echo label_for('licomint[tipcom]', __($labels['licomint{tipcom}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('licomint{tipcom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('licomint{tipcom}')): ?>
    <?php echo form_error('licomint{tipcom}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>


  <?php echo select_tag('licomint[tipcom]', options_for_select(array('N'=>'Nacional','I'=>'Internacional'),$licomint->getTipcom()), array (
)); ?>


  <?php if($labels['licomint{tipcom}']!='.:') { ?>



  </div>
  <?php  } ?>
