<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/04/18 09:27:58
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'PopUp', 'Linktoapp', 'Grid', 'SubmitClick', 'Javascript') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Catálogo de Activos',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('biecatact/edit_header', array('bndefact' => $bndefact)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('biecatact/edit_messages', array('bndefact' => $bndefact, 'labels' => $labels)) ?>
<?php include_partial('biecatact/edit_form', array('bndefact' => $bndefact, 'lonact' => $lonact, 'foract' => $foract, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('biecatact/edit_footer', array('bndefact' => $bndefact)) ?>
</div>

</div>
