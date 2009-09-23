<table>
	<tr>
		<th>
<div id="divfecdes">
  <?php if($labels['npvacsalidas{fecdes}']!='.:') { ?>
  <?php echo label_for('npvacsalidas[fecdes]', __($labels['npvacsalidas{fecdes}' ]), 'class="required" Style="text-align:left; width:143px"') ?>
  <div class="divlado<?php if ($sf_request->hasError('npvacsalidas{fecdes}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npvacsalidas{fecdes}')): ?>
    <?php echo form_error('npvacsalidas{fecdes}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_date_tag($npvacsalidas, 'getFecdes', array (
  'rich' => true,
  'onkeyup' => 'javascript: mascara(this,\'/\',patron,true)',
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'npvacsalidas[fecdes]',
  'date_format' => 'dd/MM/yyyy',
  'readonly' => $npvacsalidas->getId()== '' ? false : true,
  'onBlur'=> remote_function(array(
  'update'   => 'divgridvaca',
  'url'      => 'vacsalidas/ajax',
  'condition' => "$('npvacsalidas_codemp').value != '' && $('id').value == ''",
  'complete' => 'AjaxJSON(request, json)',
  'script' => true,
  'with' => "'ajax=2&codigo='+$('npvacsalidas_codemp').value+'&fecdes='+this.value+'&diavac='+$('npvacsalidas_diasdisfrutar').value+'&diaspend='+$('npvacsalidas_diaspend').value",
        )),
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['npvacsalidas{fecdes}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div></th>
		<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
		<th><div id="divfechas">
  <?php if($labels['npvacsalidas{fechas}']!='.:') { ?>
  <?php echo label_for('npvacsalidas[fechas]', __($labels['npvacsalidas{fechas}' ]), 'class="required" Style="text-align:left; width:120px"') ?>
  <div class="divlado<?php if ($sf_request->hasError('npvacsalidas{fechas}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npvacsalidas{fechas}')): ?>
    <?php echo form_error('npvacsalidas{fechas}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_date_tag($npvacsalidas, 'getFechas', array (
  'rich' => true,
  'onkeyup' => 'javascript: mascara(this,\'/\',patron,true)',
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'npvacsalidas[fechas]',
  'date_format' => 'dd/MM/yyyy',
  'readonly' =>  true,
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['npvacsalidas{fechas}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div></th>
<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>
<div id="divfecpag">
  <?php if($labels['npvacsalidas{fecpagbonvac}']!='.:') { ?>
  <?php echo label_for('npvacsalidas[fecpagbonvac]', __($labels['npvacsalidas{fecpagbonvac}' ]), 'class="required" Style="text-align:left; width:143px"') ?>
  <div class="divlado<?php if ($sf_request->hasError('npvacsalidas{fecpagbonvac}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npvacsalidas{fecpagbonvac}')): ?>
    <?php echo form_error('npvacsalidas{fecpagbonvac}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_date_tag($npvacsalidas, 'getFecpagbonvac', array (
  'rich' => true,
  'onkeyup' => 'javascript: mascara(this,\'/\',patron,true)',
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'npvacsalidas[fecpagbonvac]',
  'date_format' => 'dd/MM/yyyy',
  'readonly' => $npvacsalidas->getId()== '' ? false : true,  
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['npvacsalidas{fecpagbonvac}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div></th>
	</tr>
</table>


