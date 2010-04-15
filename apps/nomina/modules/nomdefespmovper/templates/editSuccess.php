<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/01/25 16:28:42
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'PopUp', 'Linktoapp', 'Grid', 'SubmitClick', 'Javascript') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Conceptos Variables',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('nomdefespmovper/edit_header', array('npdefmov' => $npdefmov)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('nomdefespmovper/edit_messages', array('npdefmov' => $npdefmov, 'labels' => $labels)) ?>
<?php include_partial('nomdefespmovper/edit_form', array('npdefmov' => $npdefmov, 'obj' => $obj, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('nomdefespmovper/edit_footer', array('npdefmov' => $npdefmov)) ?>
</div>

</div>
