<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/07/23 16:26:39
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Cuentas Bancarias por Nomina', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('empleadosbanco/edit_header', array('npempleados_banco' => $npempleados_banco)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('empleadosbanco/edit_messages', array('npempleados_banco' => $npempleados_banco, 'labels' => $labels)) ?>
<?php include_partial('empleadosbanco/edit_form', array('npempleados_banco' => $npempleados_banco, 'labels' => $labels, 'obj' => $obj)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('empleadosbanco/edit_footer', array('npempleados_banco' => $npempleados_banco)) ?>
</div>

</div>
