<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/16 15:17:59
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid', 'PopUp') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Salidas de Almacén',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('almsalalm/edit_header', array('casalalm' => $casalalm)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('almsalalm/edit_messages', array('casalalm' => $casalalm, 'labels' => $labels)) ?>
<?php include_partial('almsalalm/edit_form', array('casalalm' => $casalalm, 'obj' => $obj, 'mascaraarticulo' => $mascaraarticulo, 'labels' => $labels, 'mascaraubi' => $mascaraubi, 'lonubi' => $lonubi, 'mansolocor' => $mansolocor, 'bloqfec' => $bloqfec, 'oculeli' => $oculeli)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('almsalalm/edit_footer', array('casalalm' => $casalalm)) ?>
</div>

</div>
