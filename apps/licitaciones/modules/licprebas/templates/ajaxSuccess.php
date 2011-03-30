<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?
 if($ajax==7)
    echo grid_tag_v2($liprebas->getGrid());
 elseif($ajax==8){
    echo grid_tag_v2($liprebas->getGrid_rec());
    echo link_to_function(image_tag('/images/salir.gif'), "OcultarGrid()");
 }
?>
