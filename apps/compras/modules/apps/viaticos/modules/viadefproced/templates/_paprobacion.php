<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php $arraprobacion=$params['arraprobacion'];?>

  <?php if($labels['viadefproced{aprobacion}']!='.:') { ?>
  <?php echo label_for('viadefproced[aprobacion]', __($labels['viadefproced{aprobacion}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('viadefproced{aprobacion}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viadefproced{aprobacion}')): ?>
    <?php echo form_error('viadefproced{aprobacion}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>


  <?php echo select_tag('viadefproced[aprobacion]', options_for_select($arraprobacion,$viadefproced->getAprobacion(), array (

))); ?>


  <?php if($labels['viadefproced{aprobacion}']!='.:') { ?>



  </div>
  <?php  } ?>



