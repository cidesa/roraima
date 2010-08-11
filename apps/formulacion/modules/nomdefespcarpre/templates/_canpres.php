<div id="divcanpre">
  <?php if($labels['npcarpre{canpre}']!='.:') { ?>
  <?php echo label_for('npcarpre[canpre]', __($labels['npcarpre{canpre}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('npcarpre{canpre}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npcarpre{canpre}')): ?>
    <?php echo form_error('npcarpre{canpre}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>



  <?php $value = object_input_tag($npcarpre, array('getCanpre',true), array (
  'size' => 7,
  'onKeyPress' => 'return validaDecimal(event)',
  'onBlur' => "toAjax('3','ajax',this.value,'','&canasi='+$('npcarpre_canasi').value);event.keyCode=13;return formatoDecimal(event,this.id);",
  'control_name' => 'npcarpre[canpre]',
)); echo $value ? $value : '&nbsp;' ?>


  <?php if($labels['npcarpre{canpre}']!='.:') { ?>



  </div>
  <?php  } ?>

</div>
<br/>
<div id="divcanhpre">
  <?php if($labels['npcarpre{canhpre}']!='.:') { ?>
  <?php echo label_for('npcarpre[canhpre]', __($labels['npcarpre{canhpre}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('npcarpre{canhpre}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npcarpre{canhpre}')): ?>
    <?php echo form_error('npcarpre{canhpre}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>



  <?php $value = object_input_tag($npcarpre, array('getCanhpre',true), array (
  'size' => 7,
  'onKeyPress' => 'return validaDecimal(event)',
  'onBlur' => "toAjax('4','ajax',this.value,'','&canhom='+$('npcarpre_canhom').value);event.keyCode=13;return formatoDecimal(event,this.id)",
  'control_name' => 'npcarpre[canhpre]',
)); echo $value ? $value : '&nbsp;' ?>


  <?php if($labels['npcarpre{canhpre}']!='.:') { ?>



  </div>
  <?php  } ?>

</div>
<br/>
<div id="divcanmpre">
  <?php if($labels['npcarpre{canmpre}']!='.:') { ?>
  <?php echo label_for('npcarpre[canmpre]', __($labels['npcarpre{canmpre}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('npcarpre{canmpre}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npcarpre{canmpre}')): ?>
    <?php echo form_error('npcarpre{canmpre}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>



  <?php $value = object_input_tag($npcarpre, array('getCanmpre',true), array (
  'size' => 7,
  'onKeyPress' => 'return validaDecimal(event)',
  'onBlur' => "toAjax('5','ajax',this.value,'','&canmuj='+$('npcarpre_canmuj').value);event.keyCode=13;return formatoDecimal(event,this.id)",
  'control_name' => 'npcarpre[canmpre]',
)); echo $value ? $value : '&nbsp;' ?>


  <?php if($labels['npcarpre{canmpre}']!='.:') { ?>



  </div>
  <?php  } ?>

</div>
