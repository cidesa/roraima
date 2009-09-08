<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/01/02 10:00:46
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Parámetros para el Registro y Control de Vacaciones', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('vacdefgen/edit_header', array('npvacdefgen' => $npvacdefgen)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('vacdefgen/edit_messages', array('npvacdefgen' => $npvacdefgen, 'labels' => $labels)) ?>
<?php include_partial('vacdefgen/edit_form', array('npvacdefgen' => $npvacdefgen, 'labels' => $labels, 'obj' => $obj)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('vacdefgen/edit_footer', array('npvacdefgen' => $npvacdefgen)) ?>
</div>

</div>
