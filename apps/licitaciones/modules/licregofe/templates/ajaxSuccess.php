<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?
if($ajax=='1')
    echo grid_tag_v2($liregofe->getGridart());
elseif($ajax=='8')
    echo grid_tag_v2($liregofe->getGridcroent());
elseif($ajax=='9')
    echo grid_tag_v2($liregofe->getGridleg());
elseif($ajax=='10')
    echo grid_tag_v2($liregofe->getGridtec());
elseif($ajax=='11')
    echo grid_tag_v2($liregofe->getGridfin());
elseif($ajax=='12')
    echo grid_tag_v2($liregofe->getGridfia());
?>
