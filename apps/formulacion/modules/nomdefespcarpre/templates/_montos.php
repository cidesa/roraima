<div id="divmonpre">
  <?php if($labels['npcarpre{monpre}']!='.:') { ?>
  <?php echo label_for('npcarpre[monpre]', __($labels['npcarpre{monpre}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('npcarpre{monpre}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npcarpre{monpre}')): ?>
    <?php echo form_error('npcarpre{monpre}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>



  <?php $value = object_input_tag($npcarpre, array('getMonpre',true), array (
  'size' => 10,
  'readonly'=>true,
  'onKeyPress' => 'return validaDecimal(event)',
  'onBlur' => 'event.keyCode=13;return formatoDecimal(event,this.id)',
  'control_name' => 'npcarpre[monpre]',
)); echo $value ? $value : '&nbsp;' ?>


  <?php if($labels['npcarpre{monpre}']!='.:') { ?>



  </div>
  <?php  } ?>

</div>
<br/>
<div id="divmonasi">
  <?php if($labels['npcarpre{monasi}']!='.:') { ?>
  <?php echo label_for('npcarpre[monasi]', __($labels['npcarpre{monasi}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('npcarpre{monasi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npcarpre{monasi}')): ?>
    <?php echo form_error('npcarpre{monasi}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>



  <?php $value = object_input_tag($npcarpre, array('getMonasi',true), array (
  'size' => 10,
  'readonly'=>true,
  'onKeyPress' => 'return validaDecimal(event)',
  'onBlur' => 'event.keyCode=13;return formatoDecimal(event,this.id)',
  'control_name' => 'npcarpre[monasi]',
)); echo $value ? $value : '&nbsp;' ?>


  <?php if($labels['npcarpre{monasi}']!='.:') { ?>



  </div>
  <?php  } ?>

</div>
<br/>
<div id="divdispo">
  <?php if($labels['npcarpre{dispo}']!='.:') { ?>
  <?php echo label_for('npcarpre[dispo]', __($labels['npcarpre{dispo}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('npcarpre{dispo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npcarpre{dispo}')): ?>
    <?php echo form_error('npcarpre{dispo}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>



  <?php $value = object_input_tag($npcarpre, array('getDispo',true), array (
  'size' => 10,
  'readonly'=>true,
  'onKeyPress' => 'return validaDecimal(event)',
  'onBlur' => 'event.keyCode=13;return formatoDecimal(event,this.id)',
  'control_name' => 'npcarpre[dispo]',
)); echo $value ? $value : '&nbsp;' ?>


  <?php if($labels['npcarpre{dispo}']!='.:') { ?>



  </div>
  <?php  } ?>

</div>