<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/21 09:48:16
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Linktoapp') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edicion de Variables', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('nomdefespvar/edit_header', array('npdefvar' => $npdefvar)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('nomdefespvar/edit_messages', array('npdefvar' => $npdefvar, 'labels' => $labels)) ?>
<?php include_partial('nomdefespvar/edit_form', array('npdefvar' => $npdefvar, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('nomdefespvar/edit_footer', array('npdefvar' => $npdefvar)) ?>
</div>

</div>
