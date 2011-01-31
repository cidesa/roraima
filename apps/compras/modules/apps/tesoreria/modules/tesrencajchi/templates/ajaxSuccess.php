<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>
<?php if ($entrada=='1') {?>
 <?php $value = get_partial('grid', array('type' => 'edit', 'opordpag' => $opordpag,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<?php }else if ($entrada=='2') {?>
<?php $value = get_partial('gridsal', array('type' => 'edit', 'opordpag' => $opordpag,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<?php }?>