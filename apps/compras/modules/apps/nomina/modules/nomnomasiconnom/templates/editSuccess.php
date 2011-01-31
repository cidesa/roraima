<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/26 14:56:01
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Asignación de Conceptos a Empleados',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('nomnomasiconnom/edit_header', array('npasiconemp' => $npasiconemp)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('nomnomasiconnom/edit_messages', array('npasiconemp' => $npasiconemp, 'labels' => $labels)) ?>
<?php include_partial('nomnomasiconnom/edit_form', array('npasiconemp' => $npasiconemp, 'labels' => $labels, 'obj' => $obj, 'numreg' => $numreg)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('nomnomasiconnom/edit_footer', array('npasiconemp' => $npasiconemp)) ?>
</div>

</div>
