<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/05 10:26:19
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Cotizaciones',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('almcotiza/edit_header', array('cacotiza' => $cacotiza)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('almcotiza/edit_messages', array('cacotiza' => $cacotiza, 'labels' => $labels)) ?>
<?php include_partial('almcotiza/edit_form', array('cacotiza' => $cacotiza, 'moneda' => $moneda, 'valor' => $valor, 'aumdis' => $aumdis, 'numreg' => $numreg, 'labels' => $labels, 'obj' => $obj, 'mansolocor' => $mansolocor, 'bloqfec' => $bloqfec, 'oculeli' => $oculeli)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('almcotiza/edit_footer', array('cacotiza' => $cacotiza)) ?>
</div>

</div>
