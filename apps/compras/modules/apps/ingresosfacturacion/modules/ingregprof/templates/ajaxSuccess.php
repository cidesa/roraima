<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?
 switch ($ajax){
      case '1':
        include_partial('inmunicipio_id', array( 'inprofes' => $inprofes ));
        break;
      case '2':
        include_partial('inparroquia_id', array( 'inprofes' => $inprofes ));
    }
// echo grid_tag($obj);
?>
