<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/07/17 17:21:16
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Salario Integral Por Contrato Individual',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('presnomregsalintind/edit_header', array('npsalint' => $npsalint)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('presnomregsalintind/edit_messages', array('npsalint' => $npsalint, 'labels' => $labels)) ?>
<?php include_partial('presnomregsalintind/edit_form', array('npsalint' => $npsalint, 'labels' => $labels, 'obj' => $obj)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('presnomregsalintind/edit_footer', array('npsalint' => $npsalint)) ?>
</div>

</div>
