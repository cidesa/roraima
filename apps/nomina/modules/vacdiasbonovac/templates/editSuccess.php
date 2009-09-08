<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/09/04 10:27:38
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Definición de Jornada Laboral',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('vacdiasbonovac/edit_header', array('npvacjorlab' => $npvacjorlab)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('vacdiasbonovac/edit_messages', array('npvacjorlab' => $npvacjorlab, 'labels' => $labels)) ?>
<?php include_partial('vacdiasbonovac/edit_form', array('npvacjorlab' => $npvacjorlab, 'labels' => $labels)) ?>

</div>

<div id="sf_admin_footer">
<?php include_partial('vacdiasbonovac/edit_footer', array('npvacjorlab' => $npvacjorlab)) ?>
</div>

</div>

