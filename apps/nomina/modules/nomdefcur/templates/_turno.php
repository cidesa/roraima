<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<div id="divturno">   
  <?php $turno=array('D'=>'Diurno','N'=>'Nocturno');?>
 
 <?php if($labels['rhdefcur{turcur}']!='.:') { ?>
  <?php echo label_for('rhdefcur[turcur]', __($labels['rhdefcur{turcur}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('rhdefcur{turcur}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('rhdefcur{turcur}')): ?>
    <?php echo form_error('rhdefcur{turcur}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php echo select_tag('rhdefcur[turcur]', options_for_select($turno,$rhdefcur->getTurcur(), array (
  'control_name' => 'rhdefcur[turcur]',
))); ?>
      
		
  <?php if($labels['rhdefcur{turcur}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 
</div>