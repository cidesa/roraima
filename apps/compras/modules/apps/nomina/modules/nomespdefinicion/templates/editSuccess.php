<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/25 01:43:42
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edicion de Definicion',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('nomespdefinicion/edit_header', array('npnomesptipos' => $npnomesptipos)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('nomespdefinicion/edit_messages', array('npnomesptipos' => $npnomesptipos, 'labels' => $labels)) ?>
<?php include_partial('nomespdefinicion/edit_form', array('npnomesptipos' => $npnomesptipos, 'labels' => $labels, 'obj' => $obj)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('nomespdefinicion/edit_footer', array('npnomesptipos' => $npnomesptipos)) ?>
</div>

</div>
