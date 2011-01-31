<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/12 16:56:51
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Traspaso de Artículos',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('almtraalm/edit_header', array('catraalm' => $catraalm)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('almtraalm/edit_messages', array('catraalm' => $catraalm, 'labels' => $labels)) ?>
<?php include_partial('almtraalm/edit_form', array('catraalm' => $catraalm, 'labels' => $labels, 'mascaraubi' => $mascaraubi, 'lonubi' => $lonubi, 'obj' => $obj)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('almtraalm/edit_footer', array('catraalm' => $catraalm)) ?>
</div>

</div>
