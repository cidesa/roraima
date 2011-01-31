<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php $arrret=$params['arrret'];?>

  <?php if($labels['npliquidacion_det{codret}']!='.:') { ?>
  <?php echo label_for('npliquidacion_det[codret]', __($labels['npliquidacion_det{codret}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('npliquidacion_det{codret}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npliquidacion_det{codret}')): ?>
    <?php echo form_error('npliquidacion_det{codret}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>


  <?php echo select_tag('npliquidacion_det[codret]', options_for_select($arrret,$npliquidacion_det->getCodret()), array (
			  'onChange'=> remote_function(array(
			  'update'   => 'divgridvaca',
			  'url'      => 'presnomliquidacion/ajax',
			  'condition' => "$('npliquidacion_det_codemp').value != '' && $('id').value == '' && $('npliquidacion_det_codret').value != ''",
			  'complete' => 'AjaxJSON(request, json)',
			  'with' => "'ajax=1&codigo='+$('npliquidacion_det_codemp').value+'&tipret='+this.value",
			        )),
)); ?>


  <?php if($labels['npliquidacion_det{codret}']!='.:') { ?>



  </div>
  <?php  } ?>



