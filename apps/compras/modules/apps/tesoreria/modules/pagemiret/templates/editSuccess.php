<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/07/04 11:49:52
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Javascript', 'PopUp', 'Grid', 'Linktoapp') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Fondos a Terceros',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('pagemiret/edit_header', array('opordpag' => $opordpag)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('pagemiret/edit_messages', array('opordpag' => $opordpag, 'labels' => $labels)) ?>
<?php include_partial('pagemiret/edit_form', array('opordpag' => $opordpag, 'mascara' => $mascara, 'lonmas' => $lonmas, 'obj' => $obj, 'labels' => $labels, 'formulario' => $formulario, 'tipo' => $tipo, 'concepto' => $concepto, 'tiporet' => $tiporet, 'nomext' => $nomext, 'numdesh' => $numdesh)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('pagemiret/edit_footer', array('opordpag' => $opordpag)) ?>
</div>

</div>
