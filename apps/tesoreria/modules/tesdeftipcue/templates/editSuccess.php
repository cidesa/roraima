<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/10/10 14:08:33
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición Tipos de Cuentas Bancarias',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('tesdeftipcue/edit_header', array('tstipcue' => $tstipcue)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('tesdeftipcue/edit_messages', array('tstipcue' => $tstipcue, 'labels' => $labels)) ?>
<?php include_partial('tesdeftipcue/edit_form', array('tstipcue' => $tstipcue, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('tesdeftipcue/edit_footer', array('tstipcue' => $tstipcue)) ?>
</div>

</div>
