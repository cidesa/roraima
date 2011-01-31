<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/11/21 14:46:34
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Registro de Faltas y Permisos por Nomina en Lote',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('nomfalperlot/edit_header', array('npfalper' => $npfalper)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('nomfalperlot/edit_messages', array('npfalper' => $npfalper, 'labels' => $labels)) ?>
<?php include_partial('nomfalperlot/edit_form', array('npfalper' => $npfalper, 'labels' => $labels, 'obj' => $obj)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('nomfalperlot/edit_footer', array('npfalper' => $npfalper)) ?>
</div>

</div>
