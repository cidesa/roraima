<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/10/29 11:26:36
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Inventario Físico',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('alminvfis/edit_header', array('cainvfis' => $cainvfis)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('alminvfis/edit_messages', array('cainvfis' => $cainvfis, 'labels' => $labels)) ?>
<?php include_partial('alminvfis/edit_form', array('cainvfis' => $cainvfis, 'labels' => $labels, 'obj' => $obj, 'longitudarticulo' => $longitudarticulo, 'mascaraarticulo' => $mascaraarticulo)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('alminvfis/edit_footer', array('cainvfis' => $cainvfis)) ?>
</div>

</div>
