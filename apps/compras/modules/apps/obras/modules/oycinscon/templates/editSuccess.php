<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/05/03 11:12:03
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid', 'Linktoapp') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Inspecciones',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('oycinscon/edit_header', array('ocinscon' => $ocinscon)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('oycinscon/edit_messages', array('ocinscon' => $ocinscon, 'labels' => $labels)) ?>
<?php include_partial('oycinscon/edit_form', array('ocinscon' => $ocinscon, 'labels' => $labels, 'obj' => $obj)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('oycinscon/edit_footer', array('ocinscon' => $ocinscon)) ?>
</div>

</div>
