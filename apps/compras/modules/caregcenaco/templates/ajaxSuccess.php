<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php if ($tipo=='P') {?>
<?php $value = get_partial('codedo', array('type' => 'edit', 'cadefcenaco' => $cadefcenaco,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<?php } else if ($tipo=='E') { ?>
<?php $value = get_partial('codciu', array('type' => 'edit', 'cadefcenaco' => $cadefcenaco,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<?php } else if ($tipo=='C') {?>
<?php $value = get_partial('codmun', array('type' => 'edit', 'cadefcenaco' => $cadefcenaco,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<?php } ?>