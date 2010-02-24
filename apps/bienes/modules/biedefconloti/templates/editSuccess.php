<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: editSuccess.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/12/20 16:28:33
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Definición Contable de Inmuebles por Lotes',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('biedefconloti/edit_header', array('bndefconi' => $bndefconi)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('biedefconloti/edit_messages', array('bndefconi' => $bndefconi, 'labels' => $labels)) ?>
<?php include_partial('biedefconloti/edit_form', array('bndefconi' => $bndefconi, 'labels' => $labels, 'mascaracatalogo' => $mascaracatalogo, 'mascaraformatoubi' => $mascaraformatoubi, 'mascaralonformato' => $mascaralonformato, 'mascaralonubicacion' => $mascaralonubicacion)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('biedefconloti/edit_footer', array('bndefconi' => $bndefconi)) ?>
</div>

</div>
