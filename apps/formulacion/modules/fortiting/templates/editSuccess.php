<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/29 11:41:38
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Linktoapp') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición Formulación Presupuesto de Ingresos', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('fortiting/edit_header', array('forparing' => $forparing)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('fortiting/edit_messages', array('forparing' => $forparing, 'labels' => $labels)) ?>
<?php include_partial('fortiting/edit_form', array('forparing' => $forparing, 'labels' => $labels, 'obj' => $obj, 'forpar' => $forpar, 'lonpar' => $lonpar)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('fortiting/edit_footer', array('forparing' => $forparing)) ?>
</div>

</div>
