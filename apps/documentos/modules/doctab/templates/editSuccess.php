<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/05/15 12:08:22
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<?php echo javascript_include_tag('ajax') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Tablas', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('doctab/edit_header', array('dftabtip' => $dftabtip)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('doctab/edit_messages', array('dftabtip' => $dftabtip, 'labels' => $labels)) ?>
<?php include_partial('doctab/edit_form', array('dftabtip' => $dftabtip, 'labels' => $labels, 'campos' => $campos, 'tablas' => $tablas)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('doctab/edit_footer', array('dftabtip' => $dftabtip)) ?>
</div>

</div>
