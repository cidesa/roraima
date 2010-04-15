<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/12/09 15:55:52
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edicion de Movimientos de Conceptos y Cargos',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('nomnommovnomconcar/edit_header', array('npasicaremp' => $npasicaremp)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('nomnommovnomconcar/edit_messages', array('npasicaremp' => $npasicaremp, 'labels' => $labels)) ?>
<?php include_partial('nomnommovnomconcar/edit_form', array('npasicaremp' => $npasicaremp, 'labels' => $labels, 'obj' => $obj)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('nomnommovnomconcar/edit_footer', array('npasicaremp' => $npasicaremp)) ?>
</div>

</div>
