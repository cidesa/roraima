<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/21 11:56:07
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid', 'PopUp') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Conceptos para Retenciones',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('nomdefconretencion/edit_header', array('npcontipaporet' => $npcontipaporet)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('nomdefconretencion/edit_messages', array('npcontipaporet' => $npcontipaporet, 'labels' => $labels)) ?>
<?php include_partial('nomdefconretencion/edit_form', array('npcontipaporet' => $npcontipaporet, 'grid' => $grid,'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('nomdefconretencion/edit_footer', array('npcontipaporet' => $npcontipaporet)) ?>
</div>

</div>
