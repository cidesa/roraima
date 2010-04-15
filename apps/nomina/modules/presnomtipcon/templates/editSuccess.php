<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/27 11:01:06
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Tipos de Contratos Colectivos',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('presnomtipcon/edit_header', array('nptipcon' => $nptipcon)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('presnomtipcon/edit_messages', array('nptipcon' => $nptipcon, 'labels' => $labels)) ?>
<?php include_partial('presnomtipcon/edit_form', array('nptipcon' => $nptipcon, 'labels' => $labels, 'obj' => $obj, 'obj_nomina' => $obj_nomina, 'listaFrecuenciaPago' => $listaFrecuenciaPago, 'obj_intereses' => $obj_intereses, 'obj_antiguedad' => $obj_antiguedad )) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('presnomtipcon/edit_footer', array('nptipcon' => $nptipcon)) ?>
</div>

</div>
