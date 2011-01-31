<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/17 13:35:16
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'PopUp', 'Grid', 'SubmitClick') ?>


<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edicion de Servicio',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('almretser/edit_header', array('caretser' => $caretser)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('almretser/edit_messages', array('caretser' => $caretser, 'labels' => $labels)) ?>
<?php include_partial('almretser/edit_form', array('obj' => $obj, 'caretser' => $caretser, 'labels' => $labels, 'longitudarticulo' => $longitudarticulo,'mascaraarticulo' => $mascaraarticulo)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('almretser/edit_footer', array('caretser' => $caretser)) ?>
</div>

</div>
