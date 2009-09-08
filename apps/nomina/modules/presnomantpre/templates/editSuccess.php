<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/21 18:31:04
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición Anticipo Sobre Prestaciones',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('presnomantpre/edit_header', array('npantpre' => $npantpre)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('presnomantpre/edit_messages', array('npantpre' => $npantpre, 'labels' => $labels)) ?>
<?php include_partial('presnomantpre/edit_form', array('npantpre' => $npantpre, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('presnomantpre/edit_footer', array('npantpre' => $npantpre)) ?>
</div>

</div>
