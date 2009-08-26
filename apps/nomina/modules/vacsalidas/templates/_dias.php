<table>
	<tr>
		<th>
			<div id="divdiasdisfrutar">
			  <?php if($labels['npvacsalidas{diasdisfrutar}']!='.:') { ?>
			  <?php echo label_for('npvacsalidas[diasdisfrutar]', __($labels['npvacsalidas{diasdisfrutar}' ]), 'class="required" Style="text-align:left; width:143px"') ?>
			  <div class="divlado<?php if ($sf_request->hasError('npvacsalidas{diasdisfrutar}')): ?> form-error<?php endif; ?>">
			  <?php if ($sf_request->hasError('npvacsalidas{diasdisfrutar}')): ?>
			    <?php echo form_error('npvacsalidas{diasdisfrutar}', array('class' => 'form-error-msg')) ?>
			  <?php endif; }?>  
			  
			   
			  
			  <?php $value = object_input_tag($npvacsalidas, array('getDiasdisfrutar',true), array (
			  'size' => 7,
			  'onKeyPress' => 'return validaDecimal(event)',
			  'onBlur' => 'event.keyCode=13;return formatoDecimal(event,this.id)',
			  'control_name' => 'npvacsalidas[diasdisfrutar]',
			  'readonly' => $npvacsalidas->getId()== '' ? false : true,
			  'onBlur'=> remote_function(array(
			  'update'   => 'divgridvaca',
			  'url'      => 'vacsalidas/ajax',
			  'condition' => "$('npvacsalidas_codemp').value != '' && $('id').value == ''",
			  'complete' => 'AjaxJSON(request, json)',
			  'with' => "'ajax=2&codigo='+$('npvacsalidas_codemp').value+'&fecdes='+$('npvacsalidas_fecdes').value+'&diavac='+this.value+'&diaspend='+$('npvacsalidas_diaspend').value",
			        )),
			)); echo $value ? $value : '&nbsp;' ?>
			      
					
			  <?php if($labels['npvacsalidas{diasdisfrutar}']!='.:') { ?>  
			  
			
			   
			  </div>
			  <?php  } ?> 
			
			</div>					
		</th>
		<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
		<th>
			<div id="divdiaspend">
			  <?php if($labels['npvacsalidas{diaspend}']!='.:') { ?>
			  <?php echo label_for('npvacsalidas[diaspend]', __($labels['npvacsalidas{diaspend}' ]), 'class="required" Style="text-align:left; width:130px"') ?>
			  <div class="divlado<?php if ($sf_request->hasError('npvacsalidas{diaspend}')): ?> form-error<?php endif; ?>">
			  <?php if ($sf_request->hasError('npvacsalidas{diaspend}')): ?>
			    <?php echo form_error('npvacsalidas{diaspend}', array('class' => 'form-error-msg')) ?>
			  <?php endif; }?>  
			  
			   
			  
			  <?php $value = object_input_tag($npvacsalidas, 'getDiaspend', array (
			  'readonly' => true,
			  'size' => '5',
			  'control_name' => 'npvacsalidas[diaspend]',
			)); echo $value ? $value : '&nbsp;' ?>
			      
					
			  <?php if($labels['npvacsalidas{diaspend}']!='.:') { ?>  
			  
			
			   
			  </div>
			  <?php  } ?> 
			
			</div>
		</th>
	</tr>
</table>

<script>
	$('trigger_npvacsalidas_fechas').hide();
	if($('npvacsalidas_id').value!='')
	{
	  $('trigger_npvacsalidas_fecvac').hide();
	  $('trigger_npvacsalidas_fecdes').hide();
	  $('npvacsalidas_fecvac').readOnly=true;
	}else
	{
      $('npvacsalidas_fecvac').readOnly=false;
	}
</script>

