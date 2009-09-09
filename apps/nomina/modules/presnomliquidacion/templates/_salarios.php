<fieldset>
<legend>Salarios</legend>
<div class="form-row">
<table>
	<tr>
		<th>
			<?php if($labels['npliquidacion_det{sue311296}']!='.:') { ?>
			  <?php echo label_for('npliquidacion_det[sue311296]', __($labels['npliquidacion_det{sue311296}' ]), 'class="required" Style="text-align:left; width:100px"') ?>
			  <div class=" divlado">
			  <?php if ($sf_request->hasError('npliquidacion_det{sue311296}')): ?>
			    <?php echo form_error('npliquidacion_det{sue311296}', array('class' => 'form-error-msg')) ?>
			  <?php endif; }?>
			
			  <?php $value = object_input_tag($npliquidacion_det, 'getSue311296', array (
			  'readonly' => true,
			  'control_name' => 'npliquidacion_det[sue311296]',
			)); echo $value ? $value : '&nbsp;' ?>
			    <?php if($labels['npliquidacion_det{sue311296}']!='.:') { ?>
			  </div>
			  <?php  } ?>		
		</th>
		<th></th>
		<th>
			<?php if($labels['npliquidacion_det{sue180697}']!='.:') { ?>
			  <?php echo  label_for('npliquidacion_det[sue180697]', __($labels['npliquidacion_det{sue180697}' ]), 'class="required" Style="text-align:left; width:100px"') ?>
			  <div class=" divlado">
			  <?php if ($sf_request->hasError('npliquidacion_det{sue180697}')): ?>
			    <?php echo form_error('npliquidacion_det{sue180697}', array('class' => 'form-error-msg')) ?>
			  <?php endif; }?>
			
			  <?php $value = object_input_tag($npliquidacion_det, 'getSue180697', array (
			  'readonly' => true,
			  'control_name' => 'npliquidacion_det[sue180697]',
			)); echo $value ? $value : '&nbsp;' ?>
			    <?php if($labels['npliquidacion_det{sue180697}']!='.:') { ?>
			  </div>
			  <?php  } ?>		
		</th>
	</tr>
	<tr>
		<th>&nbsp;&nbsp;</th>
	</tr>
	<tr>
		<th>
			<?php if($labels['npliquidacion_det{ultimosueldo}']!='.:') { ?>
			  <?php echo label_for('npliquidacion_det[ultimosueldo]', __($labels['npliquidacion_det{ultimosueldo}' ]), 'class="required" Style="text-align:left; width:100px"') ?>
			  <div class=" ">
			  <?php if ($sf_request->hasError('npliquidacion_det{ultimosueldo}')): ?>
			    <?php echo form_error('npliquidacion_det{ultimosueldo}', array('class' => 'form-error-msg')) ?>
			  <?php endif; }?>
			
			  <?php $value = object_input_tag($npliquidacion_det, 'getUltimosueldo', array (
			  'readonly' => true,
			  'control_name' => 'npliquidacion_det[ultimosueldo]',			  
			)); echo $value ? $value : '&nbsp;' ?>
			    <?php if($labels['npliquidacion_det{ultimosueldo}']!='.:') { ?>
			  </div>
			  <?php  } ?>

		</th>
		<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
		<th>
			<?php if($labels['npliquidacion_det{salarioint}']!='.:') { ?>
			  <?php echo label_for('npliquidacion_det[salarioint]', __($labels['npliquidacion_det{salarioint}' ]), 'class="required" Style="text-align:left; width:100px"') ?>
			  <div class=" ">
			  <?php if ($sf_request->hasError('npliquidacion_det{salarioint}')): ?>
			    <?php echo form_error('npliquidacion_det{salarioint}', array('class' => 'form-error-msg')) ?>
			  <?php endif; }?>
			
			  <?php $value = object_input_tag($npliquidacion_det, 'getSalarioint', array (
			  'control_name' => 'npliquidacion_det[salarioint]',
			  'readonly' => true,
			  'onBlur'=> remote_function(array(
			  'update'   => 'divgridvaca',
			  'url'      => 'presnomliquidacion/ajax',
			  'condition' => "$('npliquidacion_det_codemp').value != '' && $('id').value == ''",
			  'complete' => 'AjaxJSON(request, json)',
			  'with' => "'ajax=1&cajtexmos=npliquidacion_det_nomemp&codigo='+$('npliquidacion_det_codemp').value+'&salario='+this.value",
			        )),
			)); echo $value ? $value : '&nbsp;' ?>
			    <?php if($labels['npliquidacion_det{salarioint}']!='.:') { ?>
			  </div>
			  <?php  } ?>
		</th>
	</tr>
	<tr>
		<th>
			<?php if($labels['npliquidacion_det{salintdia}']!='.:') { ?>
			  <?php echo label_for('npliquidacion_det[salintdia]', __($labels['npliquidacion_det{salintdia}' ]), 'class="required" Style="text-align:left; width:100px"') ?>
			  <div class=" ">
			  <?php if ($sf_request->hasError('npliquidacion_det{salintdia}')): ?>
			    <?php echo form_error('npliquidacion_det{salintdia}', array('class' => 'form-error-msg')) ?>
			  <?php endif; }?>
			
			  <?php $value = object_input_tag($npliquidacion_det, 'getSalintdia', array (
			  'readonly' => true,
			  'control_name' => 'npliquidacion_det[salintdia]',			  
			)); echo $value ? $value : '&nbsp;' ?>
			    <?php if($labels['npliquidacion_det{salintdia}']!='.:') { ?>
			  </div>
			  <?php  } ?>

		</th>
		<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
		<th id="thsalintconcol" style="display:none">
			<?php if($labels['npliquidacion_det{salintdiaconcol}']!='.:') { ?>
			  <?php echo label_for('npliquidacion_det[salintdiaconcol]', __($labels['npliquidacion_det{salintdiaconcol}' ]), 'class="required" Style="text-align:left; width:100px"') ?>
			  <div class=" ">
			  <?php if ($sf_request->hasError('npliquidacion_det{salintdiaconcol}')): ?>
			    <?php echo form_error('npliquidacion_det{salintdiaconcol}', array('class' => 'form-error-msg')) ?>
			  <?php endif; }?>
			
			  <?php $value = object_input_tag($npliquidacion_det, 'getSalintdiaconcol', array (
			  'control_name' => 'npliquidacion_det[salintdiaconcol]',
			  'readonly' => true,			  
			)); echo $value ? $value : '&nbsp;' ?>
			    <?php if($labels['npliquidacion_det{salintdiaconcol}']!='.:') { ?>
			  </div>
			  <?php  } ?>
		</th>		
	</tr>
</table> 
</div>
</fieldset>
<script language="JavaScript">
if($('npliquidacion_det_codemp').value!='')
	$('npliquidacion_det_codemp').readOnly=true;		
</script>
