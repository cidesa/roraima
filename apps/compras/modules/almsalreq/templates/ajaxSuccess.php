<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php
if ($ajaxs=='4') {
$value = get_partial('grid', array('type' => 'edit', 'casalalm' => $casalalm,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;';
}else {
    echo options_for_select($lotes,$numlot,'include_custom=Seleccione...');
}

?>