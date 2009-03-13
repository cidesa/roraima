<fieldset>
<legend>Fechas</legend>
<div class="form-row">
  <?php if($labels['npliquidacion_det{fecing}']!='.:') { ?>
  <?php echo label_for('npliquidacion_det[fecing]', __($labels['npliquidacion_det{fecing}' ]), 'class="required" Style="text-align:left; width:100px"') ?>
  <div class="divlado">
  <?php if ($sf_request->hasError('npliquidacion_det{fecing}')): ?>
    <?php echo form_error('npliquidacion_det{fecing}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>

  <?php $value = object_input_tag($npliquidacion_det, 'getFecing', array (
  'disabled' => true,
  'control_name' => 'npliquidacion_det[fecing]',
)); echo $value ? $value : '&nbsp;' ?>
    <?php if($labels['npliquidacion_det{fecing}']!='.:') { ?>
  </div>
  <?php  } ?>


  <?php if($labels['npliquidacion_det{feccor}']!='.:') { ?>
  <?php echo label_for('npliquidacion_det[feccor]', __($labels['npliquidacion_det{feccor}' ]), 'class="required" Style="text-align:left; width:100px"') ?>
  <div class="divlado">
  <?php if ($sf_request->hasError('npliquidacion_det{feccor}')): ?>
    <?php echo form_error('npliquidacion_det{feccor}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>

  <?php $value = object_input_tag($npliquidacion_det, 'getFeccor', array (
  'disabled' => true,
  'control_name' => 'npliquidacion_det[feccor]',
)); echo $value ? $value : '&nbsp;' ?>
    <?php if($labels['npliquidacion_det{feccor}']!='.:') { ?>
  </div>
  <?php  } ?>


  <?php if($labels['npliquidacion_det{fecegr}']!='.:') { ?>
  <?php echo label_for('npliquidacion_det[fecegr]', __($labels['npliquidacion_det{fecegr}' ]), 'class="required" Style="text-align:left; width:100px"') ?>
  <div class="divlado">
  <?php if ($sf_request->hasError('npliquidacion_det{fecegr}')): ?>
    <?php echo form_error('npliquidacion_det{fecegr}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>

  <?php $value = object_input_tag($npliquidacion_det, 'getFecegr', array (
  'disabled' => true,
  'control_name' => 'npliquidacion_det[fecegr]',
)); echo $value ? $value : '&nbsp;' ?>
    <?php if($labels['npliquidacion_det{fecegr}']!='.:') { ?>
  </div>
  <?php  } ?>
  <br><br>
</div>
</fieldset>