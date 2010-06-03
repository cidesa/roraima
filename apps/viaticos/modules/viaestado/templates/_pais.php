<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php $arreglo=$params['pais'];?>

  <?php if($labels['viaestado{codpai}']!='.:') { ?>
  <?php echo label_for('viaestado[codpai]', __($labels['viaestado{codpai}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('viaestado{codpai}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viaestado{codpai}')): ?>
    <?php echo form_error('viaestado{codpai}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>


  <?php echo select_tag('viaestado[codpai]', options_for_select($arreglo,$viaestado->getCodpai(), array (

))); ?>


  <?php if($labels['viaestado{codpai}']!='.:') { ?>



  </div>
  <?php  } ?>



