<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>

<?php
$arrafecta=$params['arrafecta'];
?>

<?php echo label_for('npparamsalint[afecta]', __($labels['npparamsalint{afecta}']), 'class="required" Style="text-align:left; width:150px" ') ?>
  <div class="content<?php if ($sf_request->hasError('npparamsalint{afecta}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npparamsalint{afecta}')): ?>
    <?php echo form_error('npparamsalint{afecta}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  
  <?php echo select_tag('npparamsalint[afecta]', options_for_select($arrafecta,$npparamsalint->getafecta()),array(
	    ));?> 	
    </div>	