<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/11/16 16:52:27
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Vacaciones Disfrutadas',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('vachistorico/edit_header', array('nphojint' => $nphojint)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('vachistorico/edit_messages', array('nphojint' => $nphojint, 'labels' => $labels)) ?>
<?php include_partial('vachistorico/edit_form', array('nphojint' => $nphojint,'obj'=>$obj, 'labels' => $labels, 'diaspen' => $diaspen)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('vachistorico/edit_footer', array('nphojint' => $nphojint)) ?>
</div>

</div>
