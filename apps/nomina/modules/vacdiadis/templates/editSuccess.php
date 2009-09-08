<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/01/23 10:28:31
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edicion Dias de Disfrute', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('vacdiadis/edit_header', array('npvacdiadis' => $npvacdiadis)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('vacdiadis/edit_messages', array('npvacdiadis' => $npvacdiadis, 'labels' => $labels)) ?>
<?php include_partial('vacdiadis/edit_form', array('npvacdiadis' => $npvacdiadis, 'labels' => $labels, 'obj'=>$obj)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('vacdiadis/edit_footer', array('npvacdiadis' => $npvacdiadis)) ?>
</div>

</div>
