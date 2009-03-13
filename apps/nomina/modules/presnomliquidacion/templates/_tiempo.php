<fieldset>
<div class=" divlado">
<fieldset Style="width:290px">
<legend>Tiempo Efectivo</legend>
<div class="divlado form-row">
  <?php if($labels['npliquidacion_det{diaefe}']!='.:') { ?>
  <?php echo label_for('npliquidacion_det[diaefe]', __($labels['npliquidacion_det{diaefe}' ]), 'class="required" Style="text-align:left; width:25px"') ?>
  <div class="divlado">
  <?php if ($sf_request->hasError('npliquidacion_det{diaefe}')): ?>
    <?php echo form_error('npliquidacion_det{diaefe}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>

  <?php $value = object_input_tag($npliquidacion_det, 'getDiaefe', array (
  'disabled' => true,
  'size' => 3,
  'maxlength' => 4,
  'control_name' => 'npliquidacion_det[diaefe]',
)); echo $value ? $value : '&nbsp;' ?>
    <?php if($labels['npliquidacion_det{diaefe}']!='.:') { ?>
  </div>
  <?php  } ?>

  <?php if($labels['npliquidacion_det{mesefe}']!='.:') { ?>
  <?php echo label_for('npliquidacion_det[mesefe]', __($labels['npliquidacion_det{mesefe}' ]), 'class="required" Style="text-align:left; width:25px"') ?>
  <div class="divlado">
  <?php if ($sf_request->hasError('npliquidacion_det{mesefe}')): ?>
    <?php echo form_error('npliquidacion_det{mesefe}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>

  <?php $value = object_input_tag($npliquidacion_det, 'getMesefe', array (
  'disabled' => true,
  'size' => 3,
  'maxlength' => 4,
  'control_name' => 'npliquidacion_det[mesefe]',
)); echo $value ? $value : '&nbsp;' ?>
    <?php if($labels['npliquidacion_det{mesefe}']!='.:') { ?>
  </div>
  <?php  } ?>

  <?php if($labels['npliquidacion_det{anoefe}']!='.:') { ?>
  <?php echo label_for('npliquidacion_det[anoefe]', __($labels['npliquidacion_det{anoefe}' ]), 'class="required" Style="text-align:left; width:25px"') ?>
  <div class="divlado">
  <?php if ($sf_request->hasError('npliquidacion_det{anoefe}')): ?>
    <?php echo form_error('npliquidacion_det{anoefe}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>

  <?php $value = object_input_tag($npliquidacion_det, 'getAnoefe', array (
  'disabled' => true,
  'size' => 3,
  'maxlength' => 4,
  'control_name' => 'npliquidacion_det[anoefe]',
)); echo $value ? $value : '&nbsp;' ?>
    <?php if($labels['npliquidacion_det{anoefe}']!='.:') { ?>
  </div>
  <?php  } ?>
</div>

</fieldset>
</div>
<div class="divlado">
<fieldset Style="width:290px">
<legend>Tiempo Nuevo Regimen</legend>
<div class="divlado form-row">
  <?php if($labels['npliquidacion_det{diarn}']!='.:') { ?>
  <?php echo label_for('npliquidacion_det[diarn]', __($labels['npliquidacion_det{diarn}' ]), 'class="required" Style="text-align:left; width:25px"') ?>
  <div class="divlado">
  <?php if ($sf_request->hasError('npliquidacion_det{diarn}')): ?>
    <?php echo form_error('npliquidacion_det{diarn}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>

  <?php $value = object_input_tag($npliquidacion_det, 'getDiarn', array (
  'disabled' => true,
  'size' => 3,
  'maxlength' => 4,
  'control_name' => 'npliquidacion_det[diarn]',
)); echo $value ? $value : '&nbsp;' ?>
    <?php if($labels['npliquidacion_det{diarn}']!='.:') { ?>
  </div>
  <?php  } ?>

  <?php if($labels['npliquidacion_det{mesrn}']!='.:') { ?>
  <?php echo label_for('npliquidacion_det[mesrn]', __($labels['npliquidacion_det{mesrn}' ]), 'class="required" Style="text-align:left; width:25px"') ?>
  <div class="divlado">
  <?php if ($sf_request->hasError('npliquidacion_det{mesrn}')): ?>
    <?php echo form_error('npliquidacion_det{mesrn}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>

  <?php $value = object_input_tag($npliquidacion_det, 'getMesrn', array (
  'disabled' => true,
  'size' => 3,
  'maxlength' => 4,
  'control_name' => 'npliquidacion_det[mesrn]',
)); echo $value ? $value : '&nbsp;' ?>
    <?php if($labels['npliquidacion_det{mesrn}']!='.:') { ?>
  </div>
  <?php  } ?>


  <?php if($labels['npliquidacion_det{anorn}']!='.:') { ?>
  <?php echo label_for('npliquidacion_det[anorn]', __($labels['npliquidacion_det{anorn}' ]), 'class="required" Style="text-align:left; width:25px"') ?>
  <div class="divlado">
  <?php if ($sf_request->hasError('npliquidacion_det{anorn}')): ?>
    <?php echo form_error('npliquidacion_det{anorn}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>

  <?php $value = object_input_tag($npliquidacion_det, 'getAnorn', array (
  'disabled' => true,
  'size' => 3,
  'maxlength' => 4,
  'control_name' => 'npliquidacion_det[anorn]',
)); echo $value ? $value : '&nbsp;' ?>
    <?php if($labels['npliquidacion_det{anorn}']!='.:') { ?>
  </div>
  <?php  } ?>
</div>
<br> <br>
</fieldset>
</div>

<div class="divlado">
<fieldset Style="width:290px">
<legend>Tiempo Nuevo Regimen</legend>
<div class="divlado form-row">
  <?php if($labels['npliquidacion_det{diara}']!='.:') { ?>
  <?php echo label_for('npliquidacion_det[diara]', __($labels['npliquidacion_det{diara}' ]), 'class="required" Style="text-align:left; width:25px"') ?>
  <div class="divlado">
  <?php if ($sf_request->hasError('npliquidacion_det{diara}')): ?>
    <?php echo form_error('npliquidacion_det{diara}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>

  <?php $value = object_input_tag($npliquidacion_det, 'getDiara', array (
  'disabled' => true,
  'size' => 3,
  'maxlength' => 4,
  'control_name' => 'npliquidacion_det[diara]',
)); echo $value ? $value : '&nbsp;' ?>
    <?php if($labels['npliquidacion_det{diara}']!='.:') { ?>
  </div>
  <?php  } ?>

  <?php if($labels['npliquidacion_det{mesra}']!='.:') { ?>
  <?php echo label_for('npliquidacion_det[mesra]', __($labels['npliquidacion_det{mesra}' ]), 'class="required" Style="text-align:left; width:25px"') ?>
  <div class="divlado">
  <?php if ($sf_request->hasError('npliquidacion_det{mesra}')): ?>
    <?php echo form_error('npliquidacion_det{mesra}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>

  <?php $value = object_input_tag($npliquidacion_det, 'getMesra', array (
  'disabled' => true,
  'size' => 3,
  'maxlength' => 4,
  'control_name' => 'npliquidacion_det[mesra]',
)); echo $value ? $value : '&nbsp;' ?>
    <?php if($labels['npliquidacion_det{mesra}']!='.:') { ?>
  </div>
  <?php  } ?>


  <?php if($labels['npliquidacion_det{anora}']!='.:') { ?>
  <?php echo label_for('npliquidacion_det[anora]', __($labels['npliquidacion_det{anora}' ]), 'class="required" Style="text-align:left; width:25px"') ?>
  <div class="divlado">
  <?php if ($sf_request->hasError('npliquidacion_det{anora}')): ?>
    <?php echo form_error('npliquidacion_det{anora}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>

  <?php $value = object_input_tag($npliquidacion_det, 'getAnora', array (
  'disabled' => true,
  'size' => 3,
  'maxlength' => 4,
  'control_name' => 'npliquidacion_det[anora]',
)); echo $value ? $value : '&nbsp;' ?>
    <?php if($labels['npliquidacion_det{anora}']!='.:') { ?>
  </div>
  <?php  } ?>
</div>
</fieldset>
</div>
</fieldset>