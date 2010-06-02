<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php $arrtiprub=$params['arrtiprub'];?>

  <?php if($labels['viadefrub{tiprub}']!='.:') { ?>
  <?php echo label_for('viadefrub[tiprub]', __($labels['viadefrub{tiprub}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('viadefrub{tiprub}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viadefrub{tiprub}')): ?>
    <?php echo form_error('viadefrub{tiprub}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>


  <?php echo select_tag('viadefrub[tiprub]', options_for_select($arrtiprub,$viadefrub->getTiprub(), array (

))); ?>


  <?php if($labels['viadefrub{tiprub}']!='.:') { ?>



  </div>
  <?php  } ?>



