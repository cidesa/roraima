<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/11/05 12:23:17
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Definición Contable de Muebles',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('biedefconm/edit_header', array('bndefcon' => $bndefcon)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('biedefconm/edit_messages', array('bndefcon' => $bndefcon, 'labels' => $labels)) ?>
<?php include_partial('biedefconm/edit_form', array('bndefcon' => $bndefcon, 'labels' => $labels, 'mascaracontabilidad' => $mascaracontabilidad)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('biedefconm/edit_footer', array('bndefcon' => $bndefcon)) ?>
</div>

</div>
