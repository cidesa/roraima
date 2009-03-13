<fieldset>
<legend>Salarios</legend>
<div class="form-row">

  <?php if($labels['npliquidacion_det{sue311296}']!='.:') { ?>
  <?php echo label_for('npliquidacion_det[sue311296]', __($labels['npliquidacion_det{sue311296}' ]), 'class="required" Style="text-align:left; width:100px"') ?>
  <div class=" divlado">
  <?php if ($sf_request->hasError('npliquidacion_det{sue311296}')): ?>
    <?php echo form_error('npliquidacion_det{sue311296}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>

  <?php $value = object_input_tag($npliquidacion_det, 'getSue311296', array (
  'disabled' => true,
  'control_name' => 'npliquidacion_det[sue311296]',
)); echo $value ? $value : '&nbsp;' ?>
    <?php if($labels['npliquidacion_det{sue311296}']!='.:') { ?>
  </div>
  <?php  } ?>



  <?php if($labels['npliquidacion_det{sue180697}']!='.:') { ?>
  <?php echo  label_for('npliquidacion_det[sue180697]', __($labels['npliquidacion_det{sue180697}' ]), 'class="required" Style="text-align:left; width:100px"') ?>
  <div class=" divlado">
  <?php if ($sf_request->hasError('npliquidacion_det{sue180697}')): ?>
    <?php echo form_error('npliquidacion_det{sue180697}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>

  <?php $value = object_input_tag($npliquidacion_det, 'getSue180697', array (
  'disabled' => true,
  'control_name' => 'npliquidacion_det[sue180697]',
)); echo $value ? $value : '&nbsp;' ?>
    <?php if($labels['npliquidacion_det{sue180697}']!='.:') { ?>
  </div>
  <?php  } ?>



  <?php if($labels['npliquidacion_det{ultimosueldo}']!='.:') { ?>
  <?php echo label_for('npliquidacion_det[ultimosueldo]', __($labels['npliquidacion_det{ultimosueldo}' ]), 'class="required" Style="text-align:left; width:100px"') ?>
  <div class=" divlado">
  <?php if ($sf_request->hasError('npliquidacion_det{ultimosueldo}')): ?>
    <?php echo form_error('npliquidacion_det{ultimosueldo}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>

  <?php $value = object_input_tag($npliquidacion_det, 'getUltimosueldo', array (
  'disabled' => true,
  'control_name' => 'npliquidacion_det[ultimosueldo]',
)); echo $value ? $value : '&nbsp;' ?>
    <?php if($labels['npliquidacion_det{ultimosueldo}']!='.:') { ?>
  </div>
  <?php  } ?>
  <br><br>
</div>
</fieldset>
