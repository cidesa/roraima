<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/01/22 14:50:45
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Catalogo SNC',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('almdefcatsnc/edit_header', array('cacatsnc' => $cacatsnc)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('almdefcatsnc/edit_messages', array('cacatsnc' => $cacatsnc, 'labels' => $labels)) ?>
<?php include_partial('almdefcatsnc/edit_form', array('cacatsnc' => $cacatsnc, 'labels' => $labels, 'formatosnc' => $formatosnc, 'longsnc' => $longsnc)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('almdefcatsnc/edit_footer', array('cacatsnc' => $cacatsnc)) ?>
</div>

</div>
