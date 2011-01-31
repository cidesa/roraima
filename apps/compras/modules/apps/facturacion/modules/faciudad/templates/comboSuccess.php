<?php

?>

<?php use_helper('Object', 'Validation', 'Javascript') ?>



<?php if ($tipo=='P')
{
    echo select_tag('estado', options_for_select($estados,'','include_custom=Seleccione Uno'));
}
