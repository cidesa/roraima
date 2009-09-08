<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/05/11 09:46:14
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Definición de Rutas', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('facsolvencia/edit_header', array('fcsolvencia' => $fcsolvencia)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('facsolvencia/edit_messages', array('fcsolvencia' => $fcsolvencia, 'labels' => $labels)) ?>
<?php include_partial('facsolvencia/edit_form', array('fcsolvencia' => $fcsolvencia, 'labels' => $labels, 'status' => $status)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('facsolvencia/edit_footer', array('fcsolvencia' => $fcsolvencia)) ?>
</div>

</div>
