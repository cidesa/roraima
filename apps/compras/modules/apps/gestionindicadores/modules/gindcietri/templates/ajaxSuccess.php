<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>
<? if($cond=='1') { ?>
<div id="divrev">
  <?php if($labels['giproanu{revanoindg}']!='.:') { ?>
  <?php echo label_for('giproanu[revanoindg]', __($labels['giproanu{revanoindg}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('giproanu{revanoindg}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('giproanu{revanoindg}')): ?>
    <?php echo form_error('giproanu{revanoindg}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
     
  
  <?php echo select_tag('giproanu[revanoindg]', options_for_select($arrrev,$giproanu->getRevanoindg()), array (
			'onChange'=> remote_function(array(
			  'update'   => 'divtri',
			  'url'      => 'gindcietri/ajax',
			  'condition'=> "  $('giproanu_revanoindg').value!=''",
			  'complete' => 'AjaxJSON(request, json)',
			  'with' => "'ajax=3&codigo='+this.value+'&anoindg='+$('giproanu_anoindg').value",
			        )),
)); ?>
      
		
  <?php if($labels['giproanu{revanoindg}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 
</div>
<? }elseif($cond=='2') {?>
<div id="divtri" >
  <?php if($labels['giproanu{numtrim}']!='.:') { ?>
  <?php echo label_for('giproanu[numtrim]', __($labels['giproanu{numtrim}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('giproanu{numtrim}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('giproanu{numtrim}')): ?>
    <?php echo form_error('giproanu{numtrim}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
     
  
  <?php echo select_tag('giproanu[numtrim]', options_for_select($arrtri,$giproanu->getNumtrim(), array (

))); ?>
      
		
  <?php if($labels['giproanu{numtrim}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 
</div>

<? }?>