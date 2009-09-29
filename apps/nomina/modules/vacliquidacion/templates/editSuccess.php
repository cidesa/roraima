<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/16 17:33:55
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Liquidación de Vacaciones  por Egreso',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('vacliquidacion/edit_header', array('nphojint' => $nphojint)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('vacliquidacion/edit_messages', array('nphojint' => $nphojint, 'labels' => $labels)) ?>
<?php include_partial('vacliquidacion/edit_form', array('nphojint' => $nphojint, 'labels' => $labels, 'objVac' => $objVac, 'objHis' => $objHis, 'ultsue' => $ultsue, 'suenor' => $suenor, 'sueult' => $sueult, 'suepro' => $suepro, 'suedia' => $suedia, 'suediario' => $suediario)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('vacliquidacion/edit_footer', array('nphojint' => $nphojint)) ?>
</div>

</div>
