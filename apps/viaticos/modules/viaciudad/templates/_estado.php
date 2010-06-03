<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php $arreglo=$params['estado'];?>

  <?php if($labels['viaciudad{codest}']!='.:') { ?>
  <?php echo label_for('viaciudad[codest]', __($labels['viaciudad{codest}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('viaciudad{codest}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viaciudad{codest}')): ?>
    <?php echo form_error('viaciudad{codest}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>


  <?php echo select_tag('viaciudad[codest]', options_for_select($arreglo,$viaciudad->getCodest(), array (

))); ?>


  <?php if($labels['viaciudad{codest}']!='.:') { ?>



  </div>
  <?php  } ?>



