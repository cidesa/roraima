<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php if($sf_params->get('ajax')=='1') { ?>
  <?php $value = get_partial('codpre', array('cideftit' => $cideftit)); echo $value ? $value : '&nbsp;'; ?>
<?php
}elseif ($sf_params->get('ajax')=='2') { ?>
  <?php $value = get_partial('codcta', array('cideftit' => $cideftit)); echo $value ? $value : '&nbsp;'; ?>
<?php }
