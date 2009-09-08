<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/04/03 12:24:32
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Disposición de Muebles', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('biedisactmuenew/edit_header', array('bndismue' => $bndismue)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('biedisactmuenew/edit_messages', array('bndismue' => $bndismue, 'labels' => $labels)) ?>
<?php include_partial('biedisactmuenew/edit_form', array('bndismue' => $bndismue, 'tipos' => $tipos, 'labels' => $labels, 'mascaracatalogo' => $mascaracatalogo, 'mascaraformatoubi' => $mascaraformatoubi, 'mascaralonformato' => $mascaralonformato, 'mascaralonubicacion' => $mascaralonubicacion)) ?>	
</div>

<div id="sf_admin_footer">
<?php include_partial('biedisactmuenew/edit_footer', array('bndismue' => $bndismue)) ?>
</div>

</div>
