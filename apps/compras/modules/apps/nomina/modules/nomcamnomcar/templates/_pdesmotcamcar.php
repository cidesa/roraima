<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php $arrmot=$params['arrmot'];?>

  <?php if($labels['npasicaremp{codmotcamcar}']!='.:') { ?>
  <?php echo label_for('npasicaremp[codmotcamcar]', __($labels['npasicaremp{codmotcamcar}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('npasicaremp{codmotcamcar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasicaremp{codmotcamcar}')): ?>
    <?php echo form_error('npasicaremp{codmotcamcar}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
     
  
  <?php echo select_tag('npasicaremp[codmotcamcar]', options_for_select($arrmot,$npasicaremp->getCodmotcamcar(), array (

))); ?>
      
		
  <?php if($labels['npasicaremp{codmotcamcar}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 



