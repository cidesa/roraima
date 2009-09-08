<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/25 12:17:26
?>
<?php use_helper('I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Seguimiento de Metas Formuladas en el POA', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('forsegpoa/list_header', array('pager' => $pager)) ?>
<?php include_partial('forsegpoa/list_messages', array('pager' => $pager)) ?>
</div>

<div id="sf_admin_bar">
<?php include_partial('filters', array('filters' => $filters, 'mascaraproyecto' => $mascaraproyecto, 'mascaraaccion' => $mascaraaccion)) ?>
</div>

<div id="sf_admin_content">
<?php if (!$pager->getNbResults()): ?>
<?php echo __('no result') ?>
<?php else: ?>
<?php include_partial('forsegpoa/list', array('pager' => $pager)) ?>
<?php endif; ?>
<?php include_partial('list_actions') ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('forsegpoa/list_footer', array('pager' => $pager)) ?>
</div>

</div>
