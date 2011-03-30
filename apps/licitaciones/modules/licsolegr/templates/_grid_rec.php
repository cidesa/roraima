<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<div id="divgrid2">

<?php echo grid_tag_v2($lisolegr->getGrid_rec());
      echo link_to_function(image_tag('/images/salir.gif'), "OcultarGrid()"); ?>

</div>
