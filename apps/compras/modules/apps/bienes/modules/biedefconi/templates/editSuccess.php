<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/11/02 17:54:56
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Definición Contable de Inmuebles',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('biedefconi/edit_header', array('bndefconi' => $bndefconi)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('biedefconi/edit_messages', array('bndefconi' => $bndefconi, 'labels' => $labels)) ?>
<?php include_partial('biedefconi/edit_form', array('bndefconi' => $bndefconi, 'labels' => $labels, 'mascaracontabilidad' => $mascaracontabilidad)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('biedefconi/edit_footer', array('bndefconi' => $bndefconi)) ?>
</div>

</div>
