<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php
if($ajax=='1')
    echo grid_tag_v2($liplieesp->getGridart());
elseif($ajax=='7')
    echo grid_tag_v2($liplieesp->getGriduniart());
?>
