<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/04 18:31:38
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'PopUp', 'Grid', 'SubmitClick', 'Javascript', 'Linktoapp') ?>


<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Orden de Compra y/o Servicio',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('almordcom/edit_header', array('caordcom' => $caordcom)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('almordcom/edit_messages', array('caordcom' => $caordcom, 'labels' => $labels)) ?>
<?php include_partial('almordcom/edit_form', array('readonly' => $readonly, 'caordcom' => $caordcom, 'labels' => $labels, 'listatipocompra' => $listatipocompra, 'obj' => $obj, 'obj_resumen' => $obj_resumen, 'obj_entregas' => $obj_entregas, 'obj_recargos' => $obj_recargos, 'aprobacion' => $aprobacion, 'pais' => $pais, 'estados' => $estados, 'municipio' => $municipio, 'parroquia' => $parroquia, 'imp' => $imp, 'obj_respartidas' => $obj_respartidas, 'deshabmonrec' => $deshabmonrec, 'ordcomdesh' => $ordcomdesh)) ?>
<?php //include_partial('almordcom/edit_form', array('caordcom' => $caordcom, 'labels' => $labels, 'listatipocompra' => $listatipocompra, 'obj' => $obj)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('almordcom/edit_footer', array('caordcom' => $caordcom)) ?>
</div>

</div>
