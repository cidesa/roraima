<div id="divcanvac">
  <?php if($labels['npcarpre{canvac}']!='.:') { ?>
  <?php echo label_for('npcarpre[canvac]', __($labels['npcarpre{canvac}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('npcarpre{canvac}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npcarpre{canvac}')): ?>
    <?php echo form_error('npcarpre{canvac}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>



  <?php $value = object_input_tag($npcarpre, array('getCanvac',true), array (
  'size' => 7,
  'readonly'=>true,
  'onKeyPress' => 'return validaDecimal(event)',
  'onBlur' => 'event.keyCode=13;return formatoDecimal(event,this.id)',
  'control_name' => 'npcarpre[canvac]',
)); echo $value ? $value : '&nbsp;' ?>


  <?php if($labels['npcarpre{canvac}']!='.:') { ?>



  </div>
  <?php  } ?>

</div>
<br/>
<div id="divcanhvac">
  <?php if($labels['npcarpre{canhvac}']!='.:') { ?>
  <?php echo label_for('npcarpre[canhvac]', __($labels['npcarpre{canhvac}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('npcarpre{canhvac}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npcarpre{canhvac}')): ?>
    <?php echo form_error('npcarpre{canhvac}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>



  <?php $value = object_input_tag($npcarpre, array('getCanhvac',true), array (
  'size' => 7,
  'readonly'=>true,
  'onKeyPress' => 'return validaDecimal(event)',
  'onBlur' => 'event.keyCode=13;return formatoDecimal(event,this.id)',
  'control_name' => 'npcarpre[canhvac]',
)); echo $value ? $value : '&nbsp;' ?>


  <?php if($labels['npcarpre{canhvac}']!='.:') { ?>



  </div>
  <?php  } ?>

</div>
<br/>
<div id="divcanmvac">
  <?php if($labels['npcarpre{canmvac}']!='.:') { ?>
  <?php echo label_for('npcarpre[canmvac]', __($labels['npcarpre{canmvac}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('npcarpre{canmvac}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npcarpre{canmvac}')): ?>
    <?php echo form_error('npcarpre{canmvac}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>



  <?php $value = object_input_tag($npcarpre, array('getCanmvac',true), array (
  'size' => 7,
  'readonly'=>true,
  'onKeyPress' => 'return validaDecimal(event)',
  'onBlur' => 'event.keyCode=13;return formatoDecimal(event,this.id)',
  'control_name' => 'npcarpre[canmvac]',
)); echo $value ? $value : '&nbsp;' ?>


  <?php if($labels['npcarpre{canmvac}']!='.:') { ?>



  </div>
  <?php  } ?>

</div>