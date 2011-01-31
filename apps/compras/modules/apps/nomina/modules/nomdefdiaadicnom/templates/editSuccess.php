<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/08/30 10:27:42
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'Grid', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Conceptos para Días Adicionales',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('nomdefdiaadicnom/edit_header', array('npdiaadicnom' => $npdiaadicnom)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('nomdefdiaadicnom/edit_messages', array('npdiaadicnom' => $npdiaadicnom, 'labels' => $labels)) ?>
<?php include_partial('nomdefdiaadicnom/edit_form', array('npdiaadicnom' => $npdiaadicnom, 'obj' => $obj, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('nomdefdiaadicnom/edit_footer', array('npdiaadicnom' => $npdiaadicnom)) ?>
</div>

</div>
