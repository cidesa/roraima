<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php $arrmon = $params['arrmon']?>

  <?php if($labels['liprebas{codmon}']!='.:') { ?>
  <?php echo label_for('liprebas[codmon]', __($labels['liprebas{codmon}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('liprebas{codmon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('liprebas{codmon}')): ?>
    <?php echo form_error('liprebas{codmon}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>


  <?php echo select_tag('liprebas[codmon]', options_for_select($arrmon,$liprebas->getCodmon()), array (
      'onChange' => "if(this.value!='001') $('divvalcam').show(); else { $('divvalcam').hide(); CalculaGrid('',''); $('divmonpreext').hide(); $('divmonpreextletras').hide();}",
)); ?>


  <?php if($labels['liprebas{codmon}']!='.:') { ?>



  </div>
  <?php  } ?>
