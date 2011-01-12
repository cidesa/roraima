<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>

<?php $value = get_partial('grid', array('type' => 'edit', 'npasiconemp' => $npasiconemp,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>