<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: editSuccess.php 37663 2010-04-20 15:15:49Z dmartinez $
 */
// date: 2007/03/16 17:37:55
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'tabs', 'PopUp', 'Grid', 'Linktoapp') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">
<h1>

<?php echo __('Presupuesto Base',
array()) ?>

</h1>

<div id="sf_admin_header">
<?php include_partial('licprebas/edit_header', array('liprebas' => $liprebas)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('licprebas/edit_messages', array('liprebas' => $liprebas, 'labels' => $labels)) ?>
<?php include_partial('licprebas/edit_form', array('liprebas' => $liprebas, 'moneda' => $moneda, 'listatipo' => $listatipo, 'mascaraarticulo' => $mascaraarticulo, 'mascaracategoria' => $mascaracategoria, 'mascarapresupuesto' => $mascarapresupuesto, 'loncat' => $loncat, 'obj' => $obj, 'obj3' => $obj3, 'tiporec' => $tiporec, 'cambiareti' => $cambiareti, 'mansolocor' => $mansolocor, 'nometifor' => $nometifor, 'labels' => $labels, 'catbnubica' => $catbnubica)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('licprebas/edit_footer', array('liprebas' => $liprebas)) ?>
</div>

</div>
