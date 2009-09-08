<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/06/28 00:43:37
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Ciudad',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('oycdefdivciu/edit_header', array('occiudad' => $occiudad)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('oycdefdivciu/edit_messages', array('occiudad' => $occiudad, 'labels' => $labels)) ?>
<?php include_partial('oycdefdivciu/edit_form', array('occiudad' => $occiudad, 'pais' => $pais, 'estados' => $estados, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('oycdefdivciu/edit_footer', array('occiudad' => $occiudad)) ?>
</div>

</div>
