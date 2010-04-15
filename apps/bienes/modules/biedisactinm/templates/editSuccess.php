<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/04/03 15:27:55
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Disposición de Inmuebles',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('biedisactinm/edit_header', array('bndisinm' => $bndisinm)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('biedisactinm/edit_messages', array('bndisinm' => $bndisinm, 'labels' => $labels)) ?>
<?php include_partial('biedisactinm/edit_form', array('bndisinm' => $bndisinm, 'tipos' => $tipos, 'labels' => $labels ,'mascaracatalogo' => $mascaracatalogo, 'mascaraformatoubi' => $mascaraformatoubi, 'mascaralonformato' => $mascaralonformato, 'mascaralonubicacion' => $mascaralonubicacion)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('biedisactinm/edit_footer', array('bndisinm' => $bndisinm)) ?>
</div>

</div>
