<table>
	<tr>
		<th>
<div id="divfecdes">
  <?php if($labels['npvacsalidas{fecsalnom}']!='.:') { ?>
  <?php echo label_for('npvacsalidas[fecsalnom]', __($labels['npvacsalidas{fecsalnom}' ]), 'class="required" Style="text-align:left; width:143px"') ?>
  <div class="divlado<?php if ($sf_request->hasError('npvacsalidas{fecsalnom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npvacsalidas{fecsalnom}')): ?>
    <?php echo form_error('npvacsalidas{fecsalnom}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_date_tag($npvacsalidas, 'getFecsalnom', array (
  'rich' => true,
  'onkeyup' => 'javascript: mascara(this,\'/\',patron,true)',
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'npvacsalidas[fecsalnom]',
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
      
		
  <?php if($labels['npvacsalidas{fecsalnom}']!='.:') { ?>
  

   
  </div>
  <?php  } ?> 

</div></th>
		<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
		<th><div id="divfechas">
  <?php if($labels['npvacsalidas{fecreinom}']!='.:') { ?>
  <?php echo label_for('npvacsalidas[fecreinom]', __($labels['npvacsalidas{fecreinom}' ]), 'class="required" Style="text-align:left; width:120px"') ?>
  <div class="divlado<?php if ($sf_request->hasError('npvacsalidas{fecreinom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npvacsalidas{fecreinom}')): ?>
    <?php echo form_error('npvacsalidas{fecreinom}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_date_tag($npvacsalidas, 'getFecreinom', array (
  'rich' => true,
  'onkeyup' => 'javascript: mascara(this,\'/\',patron,true)',
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'npvacsalidas[fecreinom]',
  'date_format' => 'dd/MM/yyyy',
  'readonly' =>  true,
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['npvacsalidas{fecreinom}']!='.:') { ?>
  

   
  </div>
  <?php  } ?> 

</div></th>

</table>


