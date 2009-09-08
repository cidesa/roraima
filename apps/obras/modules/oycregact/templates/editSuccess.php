<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/05/03 15:38:36
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Javascript', 'PopUp', 'Grid', 'SubmitClick') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Actas',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('oycregact/edit_header', array('ocregact' => $ocregact)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('oycregact/edit_messages', array('ocregact' => $ocregact, 'labels' => $labels)) ?>
<?php include_partial('oycregact/edit_form', array('ocregact' => $ocregact, 'labels' => $labels, 'obj' => $obj)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('oycregact/edit_footer', array('ocregact' => $ocregact)) ?>
</div>

</div>
