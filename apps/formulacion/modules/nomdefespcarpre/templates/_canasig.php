<div id="divcanasi">
  <?php if($labels['npcarpre{canasi}']!='.:') { ?>
  <?php echo label_for('npcarpre[canasi]', __($labels['npcarpre{canasi}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('npcarpre{canasi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npcarpre{canasi}')): ?>
    <?php echo form_error('npcarpre{canasi}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>



  <?php $value = object_input_tag($npcarpre, array('getCanasi',true), array (
  'size' => 7,
  'readonly'=>true,
  'onKeyPress' => 'return validaDecimal(event)',
  'onBlur' => 'event.keyCode=13;return formatoDecimal(event,this.id)',
  'control_name' => 'npcarpre[canasi]',
)); echo $value ? $value : '&nbsp;' ?>


  <?php if($labels['npcarpre{canasi}']!='.:') { ?>



  </div>
  <?php  } ?>

</div>
<br/>
<div id="divcanhom">
  <?php if($labels['npcarpre{canhom}']!='.:') { ?>
  <?php echo label_for('npcarpre[canhom]', __($labels['npcarpre{canhom}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('npcarpre{canhom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npcarpre{canhom}')): ?>
    <?php echo form_error('npcarpre{canhom}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>



  <?php $value = object_input_tag($npcarpre, array('getCanhom',true), array (
  'size' => 7,
  'readonly'=>true,
  'onKeyPress' => 'return validaDecimal(event)',
  'onBlur' => 'event.keyCode=13;return formatoDecimal(event,this.id)',
  'control_name' => 'npcarpre[canhom]',
)); echo $value ? $value : '&nbsp;' ?>


  <?php if($labels['npcarpre{canhom}']!='.:') { ?>



  </div>
  <?php  } ?>

</div>
<br/>
<div id="divcanmuj">
  <?php if($labels['npcarpre{canmuj}']!='.:') { ?>
  <?php echo label_for('npcarpre[canmuj]', __($labels['npcarpre{canmuj}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('npcarpre{canmuj}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npcarpre{canmuj}')): ?>
    <?php echo form_error('npcarpre{canmuj}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>



  <?php $value = object_input_tag($npcarpre, array('getCanmuj',true), array (
  'size' => 7,
  'readonly'=>true,
  'onKeyPress' => 'return validaDecimal(event)',
  'onBlur' => 'event.keyCode=13;return formatoDecimal(event,this.id)',
  'control_name' => 'npcarpre[canmuj]',
)); echo $value ? $value : '&nbsp;' ?>


  <?php if($labels['npcarpre{canmuj}']!='.:') { ?>



  </div>
  <?php  } ?>

</div>