<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/17 14:19:20
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Actualización de Monto de Retenciones por Orden',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('pagmodret/edit_header', array('opordpag' => $opordpag)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('pagmodret/edit_messages', array('opordpag' => $opordpag, 'labels' => $labels)) ?>
<?php include_partial('pagmodret/edit_form', array('opordpag' => $opordpag,  'obj' => $obj, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('pagmodret/edit_footer', array('opordpag' => $opordpag)) ?>
</div>

</div>
