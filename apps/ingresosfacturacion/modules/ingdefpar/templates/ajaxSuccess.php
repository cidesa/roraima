<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php
 switch ($ajax){
      case '1':
        include_partial('inmunicipio_id', array( 'inparroquia' => $inparroquia ));
        break;
 }?>

