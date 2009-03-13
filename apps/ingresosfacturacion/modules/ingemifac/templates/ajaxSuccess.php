<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>


<?php if($sf_params->get('ajax')=='1') { ?>
  <?php $value = get_partial('inprofes_id', array('infactura' => $infactura)); echo $value ? $value : '&nbsp;'; ?>
<?php }
elseif($sf_params->get('ajax')=='2') { ?>
  <?php $value = get_partial('inempresa_id', array('infactura' => $infactura)); echo $value ? $value : '&nbsp;'; ?>
<?php }
elseif($sf_params->get('ajax')=='3') { ?>
  <?php $value = get_partial('inmulta_id', array('infactura' => $infactura)); echo $value ? $value : '&nbsp;'; ?>
<?php }
elseif($sf_params->get('ajax')=='4') { ?>
  <?php $value = get_partial('iningprof_id', array('infactura' => $infactura)); echo $value ? $value : '&nbsp;'; ?>
<?php }


// echo grid_tag($obj);
