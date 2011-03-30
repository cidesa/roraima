<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php $arrmon = $params['arrmon']?>

  <?php if($labels['licomint{codmon}']!='.:') { ?>
  <?php echo label_for('licomint[codmon]', __($labels['licomint{codmon}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('licomint{codmon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('licomint{codmon}')): ?>
    <?php echo form_error('licomint{codmon}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>


  <?php echo select_tag('licomint[codmon]', options_for_select($arrmon,$licomint->getCodmon()), array (
      'onChange' => "if(this.value!='') toAjaxUpdater('divgrid','1',getUrlModuloAjax(),this.value,'','&tipcom='+$('licomint_tipcom').value+'&codclacomp='+$('licomint_codclacomp').value);",
)); ?>


  <?php if($labels['licomint{codmon}']!='.:') { ?>



  </div>
  <?php  } ?>
