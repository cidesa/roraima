<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/04 10:23:30
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Editar Entradas en el Almacen',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('almentalm/edit_header', array('caentalm' => $caentalm)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('almentalm/edit_messages', array('caentalm' => $caentalm, 'labels' => $labels)) ?>
<?php include_partial('almentalm/edit_form', array('caentalm' => $caentalm, 'labels' => $labels, 'obj' => $obj, 'mascaraarticulo' => $mascaraarticulo, 'mascaraubi' => $mascaraubi, 'lonubi' => $lonubi)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('almentalm/edit_footer', array('caentalm' => $caentalm)) ?>
</div>

</div>
