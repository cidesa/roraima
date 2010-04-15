<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/11/06 11:53:48
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición Contable de Semovientes',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('biedefcons/edit_header', array('bndefcons' => $bndefcons)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('biedefcons/edit_messages', array('bndefcons' => $bndefcons, 'labels' => $labels)) ?>
<?php include_partial('biedefcons/edit_form', array('bndefcons' => $bndefcons, 'labels' => $labels, 'mascaracontabilidad' => $mascaracontabilidad)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('biedefcons/edit_footer', array('bndefcons' => $bndefcons)) ?>
</div>

</div>
