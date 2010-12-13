<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>
<?php if ($ajaxs==1) { ?>
<?php $value = get_partial('grid2', array('type' => 'edit', 'npcatnomemp' => $npcatnomemp,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<?php }else  if ($ajaxs==2) { ?>
<?php $value = get_partial('grid1', array('type' => 'edit', 'npcatnomemp' => $npcatnomemp,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<?php }?>