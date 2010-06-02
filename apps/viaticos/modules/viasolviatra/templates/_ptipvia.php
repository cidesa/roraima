<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php $opciones=$params['tipvia'];?>

  <?php if($labels['viasolviatra{tipvia}']!='.:') { ?>
  <?php echo label_for('viasolviatra[tipvia]', __($labels['viasolviatra{tipvia}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('viasolviatra{tipvia}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viasolviatra{tipvia}')): ?>
    <?php echo form_error('viasolviatra{tipvia}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>


  <?php echo select_tag('viasolviatra[tipvia]', options_for_select($opciones,$viasolviatra->getTipvia(), array (

))); ?>


  <?php if($labels['viasolviatra{tipvia}']!='.:') { ?>



  </div>
  <?php  } ?>



