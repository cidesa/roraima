<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/10/23 18:17:37
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Profesiones',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('nomdefespprofes/edit_header', array('npprofesion' => $npprofesion)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('nomdefespprofes/edit_messages', array('npprofesion' => $npprofesion, 'labels' => $labels)) ?>
<?php include_partial('nomdefespprofes/edit_form', array('npprofesion' => $npprofesion, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('nomdefespprofes/edit_footer', array('npprofesion' => $npprofesion)) ?>
</div>

</div>
