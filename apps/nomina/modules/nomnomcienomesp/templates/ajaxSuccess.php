<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'PopUp', 'Grid', 'SubmitClick', 'Javascript') ?>


<?php $value = get_partial('mensaje', array('npnomesptipos' => $npnomesptipos, 'visible' => $visible)); echo $value ? $value : '&nbsp;' ?>
