<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/04/27 20:30:22
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Asignación de Formularios',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('apliformu/edit_header', array('aplifor' => $aplifor)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('apliformu/edit_messages', array('aplifor' => $aplifor, 'labels' => $labels)) ?>
<?php include_partial('apliformu/edit_form', array('aplifor' => $aplifor, 'listaapli' => $listaapli, 'listadiv' => $listadiv, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('apliformu/edit_footer', array('aplifor' => $aplifor)) ?>
</div>

</div>
