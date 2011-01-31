<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/12/19 12:17:46
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Asignación De Conceptos Por Categorias Presupuestarias Especiales', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('asignarconceptoscategoria/edit_header', array('npconceptoscategoria' => $npconceptoscategoria)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('asignarconceptoscategoria/edit_messages', array('npconceptoscategoria' => $npconceptoscategoria, 'labels' => $labels)) ?>
<?php include_partial('asignarconceptoscategoria/edit_form', array('npconceptoscategoria' => $npconceptoscategoria, 'labels' => $labels, 'formatocategoria'=> $formatocategoria, 'obj' => $obj)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('asignarconceptoscategoria/edit_footer', array('npconceptoscategoria' => $npconceptoscategoria)) ?>
</div>

</div>
