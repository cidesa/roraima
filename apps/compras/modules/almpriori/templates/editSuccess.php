<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/12 13:02:49
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Análisis de Cotizaciones',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('almpriori/edit_header', array('casolart' => $casolart)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('almpriori/edit_messages', array('casolart' => $casolart, 'labels' => $labels)) ?>
<?php include_partial('almpriori/edit_form', array('casolart' => $casolart, 'labels' => $labels, 'articulos' => $articulos, 'grid' => $grid, 'elimina' => $elimina)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('almpriori/edit_footer', array('casolart' => $casolart)) ?>
</div>

</div>
