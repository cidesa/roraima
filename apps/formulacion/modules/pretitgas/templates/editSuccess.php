<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/18 18:19:32
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Javascript') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Clasificador Presupuestario(Gastos)',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('pretitgas/edit_header', array('fordefparegr' => $fordefparegr)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('pretitgas/edit_messages', array('fordefparegr' => $fordefparegr, 'labels' => $labels)) ?>
<?php include_partial('pretitgas/edit_form', array('fordefparegr' => $fordefparegr, 'mascarapartida' => $mascarapartida, 'lonmaspar' => $lonmaspar, 'etiqueta' => $etiqueta, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('pretitgas/edit_footer', array('fordefparegr' => $fordefparegr)) ?>
</div>

</div>
