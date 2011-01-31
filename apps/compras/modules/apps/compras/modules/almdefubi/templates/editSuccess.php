<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/01 12:47:10
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Javascript') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Definición de Ubicaciones',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('almdefubi/edit_header', array('cadefubi' => $cadefubi)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('almdefubi/edit_messages', array('cadefubi' => $cadefubi, 'labels' => $labels)) ?>
<?php include_partial('almdefubi/edit_form', array('cadefubi' => $cadefubi, 'longubi' => $longubi, 'mascaraubicacion' => $mascaraubicacion, 'obj' => $obj, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('almdefubi/edit_footer', array('cadefubi' => $cadefubi)) ?>
</div>

</div>
