<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?
 if($ajax==1)
    echo grid_tag_v2($lisolegr->getGrid());
 elseif($ajax==6){
    echo grid_tag_v2($lisolegr->getGrid_rec());
    echo link_to_function(image_tag('/images/salir.gif'), "OcultarGrid()");
 }elseif($ajax==7)
    echo grid_tag_v2($lisolegr->getGrid_uni());
?>
