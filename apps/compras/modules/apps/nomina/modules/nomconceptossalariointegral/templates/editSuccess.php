<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: editSuccess.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2008/05/13 17:02:09
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">
<?php if($sf_user->getAttribute('nomsalint','','nomconceptossalariointegral')=='S') { ?>
    <h1><?php echo __('Edición de Conceptos para el Salario Base',
    array()) ?></h1>
<?php }else { ?>
<h1><?php echo __('Edición de Conceptos para el Salario Integral',
array()) ?></h1>
<?php } ?>
<div id="sf_admin_header">
<?php include_partial('nomconceptossalariointegral/edit_header', array('npnomina' => $npnomina)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('nomconceptossalariointegral/edit_messages', array('npnomina' => $npnomina, 'labels' => $labels)) ?>
<?php include_partial('nomconceptossalariointegral/edit_form', array('npnomina' => $npnomina, 'labels' => $labels, 'obj' => $obj, 'obj2' => $obj2)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('nomconceptossalariointegral/edit_footer', array('npnomina' => $npnomina)) ?>
</div>

</div>
