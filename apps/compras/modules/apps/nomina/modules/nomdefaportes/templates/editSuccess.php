<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/21 09:22:08
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edicion de Retenciones y Aportes', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('nomdefaportes/edit_header', array('nptipaportes' => $nptipaportes)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('nomdefaportes/edit_messages', array('nptipaportes' => $nptipaportes, 'labels' => $labels)) ?>
<?php include_partial('nomdefaportes/edit_form', array('nptipaportes' => $nptipaportes, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('nomdefaportes/edit_footer', array('nptipaportes' => $nptipaportes)) ?>
</div>

</div>
