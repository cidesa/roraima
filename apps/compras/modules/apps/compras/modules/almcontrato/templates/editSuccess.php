<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/19 16:41:52
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Registro de Contratos', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('almcontrato/edit_header', array('caordcon' => $caordcon)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('almcontrato/edit_messages', array('caordcon' => $caordcon, 'labels' => $labels)) ?>
<?php include_partial('almcontrato/edit_form', array('caordcon' => $caordcon, 'doctip' => $doctip, 'erif' => $erif, 'enom' => $enom, 'rs' => $rs, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('almcontrato/edit_footer', array('caordcon' => $caordcon)) ?>
</div>

</div>
