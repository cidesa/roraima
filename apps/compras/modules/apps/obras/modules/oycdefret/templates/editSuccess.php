<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/12/23 14:26:57
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Retenciones',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('oycdefret/edit_header', array('octipret' => $octipret)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('oycdefret/edit_messages', array('octipret' => $octipret, 'labels' => $labels)) ?>
<?php include_partial('oycdefret/edit_form', array('octipret' => $octipret, 'mascaracontabilidad' => $mascaracontabilidad, 'loncta' => $loncta, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('oycdefret/edit_footer', array('octipret' => $octipret)) ?>
</div>

</div>
