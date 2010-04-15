<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/30 16:49:45
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('C&aacute;lculo de N&oacute;mina por Empleado',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('nomnomcalnomind/edit_header', array('npnomina' => $npnomina)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('nomnomcalnomind/edit_messages', array('npnomina' => $npnomina, 'labels' => $labels)) ?>
<?php include_partial('nomnomcalnomind/edit_form', array('npnomina' => $npnomina, 'labels' => $labels,'ent' => $ent, 'obj' => $obj)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('nomnomcalnomind/edit_footer', array('npnomina' => $npnomina)) ?>
</div>

</div>
