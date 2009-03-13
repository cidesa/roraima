<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>
<?php

  if($sf_params->get('ajax')=='1'){  ?>
<?php $value = get_partial('gridmov', array('type' => 'edit', 'ciajuste' => $ciajuste)); echo $value ? $value : '&nbsp;' ?>
 <?php }  ?>
