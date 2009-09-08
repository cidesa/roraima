<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/04/03 16:46:39
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Disposición de Semoviente', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('biedisactsem/edit_header', array('bndissem' => $bndissem)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('biedisactsem/edit_messages', array('bndissem' => $bndissem, 'labels' => $labels)) ?>
<?php include_partial('biedisactsem/edit_form', array('bndissem' => $bndissem, 'tipos' => $tipos, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('biedisactsem/edit_footer', array('bndissem' => $bndissem)) ?>
</div>

</div>
