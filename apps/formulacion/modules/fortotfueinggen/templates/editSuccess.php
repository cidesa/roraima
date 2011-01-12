<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:editSuccess.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/06/26 16:36:16
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Actualización Totales de Fuentes de Ingreso', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('fortotfueinggen/edit_header', array('fortipfin' => $fortipfin)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('fortotfueinggen/edit_messages', array('fortipfin' => $fortipfin, 'labels' => $labels)) ?>
<?php include_partial('fortotfueinggen/edit_form', array('fortipfin' => $fortipfin, 'labels' => $labels, 'grid'=> $grid, 'eximov'=> $eximov)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('fortotfueinggen/edit_footer', array('fortipfin' => $fortipfin)) ?>
</div>

</div>
