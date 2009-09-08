<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/10/14 22:43:28
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Javascript', 'PopUp', 'Grid', 'SubmitClick') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Valuaciones',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('oycregval/edit_header', array('ocperval' => $ocperval)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('oycregval/edit_messages', array('ocperval' => $ocperval, 'labels' => $labels)) ?>
<?php include_partial('oycregval/edit_form', array('ocperval' => $ocperval, 'obj' => $obj, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('oycregval/edit_footer', array('ocperval' => $ocperval)) ?>
</div>

</div>
