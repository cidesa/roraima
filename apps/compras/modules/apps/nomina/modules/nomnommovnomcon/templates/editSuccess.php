<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/12/07 08:25:47
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Movimientos por Concepto',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('nomnommovnomcon/edit_header', array('npasiconemp' => $npasiconemp)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('nomnommovnomcon/edit_messages', array('npasiconemp' => $npasiconemp, 'labels' => $labels)) ?>
<?php include_partial('nomnommovnomcon/edit_form', array('npasiconemp' => $npasiconemp, 'labels' => $labels, 'obj' => $obj)) ?>

</div>

<div id="sf_admin_footer">
<?php include_partial('nomnommovnomcon/edit_footer', array('npasiconemp' => $npasiconemp)) ?>
</div>

</div>
