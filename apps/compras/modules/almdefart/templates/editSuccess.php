<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/09/11 13:59:27
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Definición de Artículos',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('almdefart/edit_header', array('cadefart' => $cadefart)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('almdefart/edit_messages', array('cadefart' => $cadefart, 'labels' => $labels)) ?>
<?php include_partial('almdefart/edit_form', array('cadefart' => $cadefart, 'esta' => $esta, 'esta1' => $esta1, 'esta2' => $esta2, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('almdefart/edit_footer', array('cadefart' => $cadefart)) ?>
</div>

</div>
