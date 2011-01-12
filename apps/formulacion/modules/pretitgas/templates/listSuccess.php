<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:listSuccess.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/06/19 08:58:33
?>
<?php use_helper('I18N', 'Date', 'Javascript') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Clasificador Presupuestario(Gastos)',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('pretitgas/list_header', array('pager' => $pager)) ?>
<?php include_partial('pretitgas/list_messages', array('pager' => $pager)) ?>
</div>

<div id="sf_admin_bar">
<?php include_partial('filters', array('filters' => $filters,'mascarapartida' => $mascarapartida)) ?>
</div>

<div id="sf_admin_content">
<?php if (!$pager->getNbResults()): ?>
<?php echo __('no result') ?>
<?php else: ?>
<?php include_partial('pretitgas/list', array('pager' => $pager)) ?>
<?php endif; ?>
<?php include_partial('list_actions') ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('pretitgas/list_footer', array('pager' => $pager)) ?>
</div>

</div>
