<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/20 12:29:18
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid', 'SubmitClick', 'tabs', 'Javascript', 'PopUp') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edicion de Ajustes a Ordenes de Compra',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('almajuoc/edit_header', array('caajuoc' => $caajuoc)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('almajuoc/edit_messages', array('caajuoc' => $caajuoc, 'labels' => $labels)) ?>
<?php include_partial('almajuoc/edit_form', array('caajuoc' => $caajuoc, 'labels' => $labels, 'obj' => $obj, 'bloqfec' => $bloqfec, 'oculeli' => $oculeli)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('almajuoc/edit_footer', array('caajuoc' => $caajuoc)) ?>
</div>

</div>
