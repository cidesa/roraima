<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/25 11:56:21
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid', 'Javascript') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Seguimiento de Metas Formuladas en el POA', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('forsegpoa/edit_header', array('fordismetperpryaccmet' => $fordismetperpryaccmet)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('forsegpoa/edit_messages', array('fordismetperpryaccmet' => $fordismetperpryaccmet, 'labels' => $labels)) ?>
<?php include_partial('forsegpoa/edit_form', array('fordismetperpryaccmet' => $fordismetperpryaccmet, 'obj' => $obj, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('forsegpoa/edit_footer', array('fordismetperpryaccmet' => $fordismetperpryaccmet)) ?>
</div>

</div>
