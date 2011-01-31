<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/29 14:16:50
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Conceptos para el Fondo de Jubilación y Pensiones',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('nomdefconfon/edit_header', array('npconfon' => $npconfon)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('nomdefconfon/edit_messages', array('npconfon' => $npconfon, 'labels' => $labels)) ?>
<?php include_partial('nomdefconfon/edit_form', array('npconfon' => $npconfon, 'obj' => $obj, 'labels' => $labels, 'deduccion' => $deduccion, 'aporte' => $aporte, 'ajudeduccion' => $ajudeduccion, 'ajuaporte' => $ajuaporte)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('nomdefconfon/edit_footer', array('npconfon' => $npconfon)) ?>
</div>

</div>
