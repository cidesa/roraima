<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/07 10:17:11
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid', 'PopUp') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Prestación de Servicio', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('almdespser/edit_header', array('cadphartser' => $cadphartser)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('almdespser/edit_messages', array('cadphartser' => $cadphartser, 'labels' => $labels)) ?>
<?php include_partial('almdespser/edit_form', array('cadphartser' => $cadphartser, 'labels' => $labels, 'obj' => $obj)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('almdespser/edit_footer', array('cadphartser' => $cadphartser)) ?>
</div>

</div>
