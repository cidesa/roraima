<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?
    switch ($ajax){
      case '1':
        include_partial('detallerecaudos', array( 'atayudas' => $atayudas ));
        break;
      case '2':
        include_partial('detalleayudas', array( 'atayudas' => $atayudas ));
      case '5':
        include_partial('atrubros_id', array( 'atayudas' => $atayudas ));
        break;
    }
?>
