<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/16 17:37:55
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'tabs', 'PopUp', 'Grid', 'Linktoapp') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">
<h1>
<?php if ($cambiareti!="") {?>
<?php echo __('Edición de Solicitud de Cotización',
array()) ?>
<?php }else {?>
<?php echo __('Edición de Requisiciones por Departamento.(Solicitud de Egresos)',
array()) ?>
<?php }?>
</h1>

<div id="sf_admin_header">
<?php include_partial('almsolegr/edit_header', array('casolart' => $casolart)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('almsolegr/edit_messages', array('casolart' => $casolart, 'labels' => $labels)) ?>
<?php include_partial('almsolegr/edit_form', array('casolart' => $casolart, 'moneda' => $moneda, 'listatipo' => $listatipo, 'mascaraarticulo' => $mascaraarticulo, 'mascaracategoria' => $mascaracategoria, 'mascarapresupuesto' => $mascarapresupuesto, 'loncat' => $loncat, 'obj' => $obj, 'obj2' => $obj2, 'obj3' => $obj3, 'haydespacho' => $haydespacho, 'precompromete' => $precompromete, 'autorizaprecom' => $autorizaprecom, 'tiporec' => $tiporec, 'modifico' => $modifico, 'cotiz' => $cotiz, 'cambiareti' => $cambiareti, 'numsoldesh' => $numsoldesh, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('almsolegr/edit_footer', array('casolart' => $casolart)) ?>
</div>

</div>
