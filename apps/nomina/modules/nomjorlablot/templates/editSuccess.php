<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/21 19:21:56
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición Jonadas Laborales', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('nomjorlablot/edit_header', array('npdefjorlab' => $npdefjorlab)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('nomjorlablot/edit_messages', array('npdefjorlab' => $npdefjorlab, 'labels' => $labels)) ?>
<?php include_partial('nomjorlablot/edit_form', array('npdefjorlab' => $npdefjorlab, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('nomjorlablot/edit_footer', array('npdefjorlab' => $npdefjorlab)) ?>
</div>

</div>
