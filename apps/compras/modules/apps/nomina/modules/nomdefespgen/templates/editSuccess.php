<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/10/30 16:45:57
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'PopUp', 'Linktoapp', 'Grid', 'SubmitClick', 'Javascript') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Definición de Institución',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('nomdefespgen/edit_header', array('npdefgen' => $npdefgen)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('nomdefespgen/edit_messages', array('npdefgen' => $npdefgen, 'labels' => $labels)) ?>
<?php include_partial('nomdefespgen/edit_form', array('npdefgen' => $npdefgen, 'esta' => $esta, 'esta1'=> $esta1, 'esta2' => $esta2, 'esta3' => $esta3, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('nomdefespgen/edit_footer', array('npdefgen' => $npdefgen)) ?>
</div>

</div>
