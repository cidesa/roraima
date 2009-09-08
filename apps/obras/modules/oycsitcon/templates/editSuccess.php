<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/07/03 12:49:40
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'tabs', 'Grid', 'Linktoapp') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Situación del Contrato',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('oycsitcon/edit_header', array('ocregcon' => $ocregcon)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('oycsitcon/edit_messages', array('ocregcon' => $ocregcon, 'labels' => $labels)) ?>
<?php include_partial('oycsitcon/edit_form', array('ocregcon' => $ocregcon, 'obj' => $obj, 'obj2' => $obj2, 'fil1' => $fil1, 'fil2' => $fil2, 'totalizar' => $totalizar, 'eti' => $eti, 'color' => $color, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('oycsitcon/edit_footer', array('ocregcon' => $ocregcon)) ?>
</div>

</div>
