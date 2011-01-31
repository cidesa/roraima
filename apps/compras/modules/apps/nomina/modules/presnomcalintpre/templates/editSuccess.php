<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/08/28 16:34:44
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Cálculo de Antiguedad',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('presnomcalintpre/edit_header', array('nppresoc' => $nppresoc)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('presnomcalintpre/edit_messages', array('nppresoc' => $nppresoc, 'labels' => $labels)) ?>
<?php include_partial('presnomcalintpre/edit_form', array('nppresoc' => $nppresoc, 'labels' => $labels, 'capitalizacion' => $capitalizacion, 'obj' => $obj, 'obj2' => $obj2, 'obj3' => $obj3, 'ent' =>$ent)) ?>
<?php //include_partial('presnomcalintpre/edit_form', array('nppresoc' => $nppresoc, 'labels' => $labels, 'capitalizacion' => $capitalizacion, 'obj' => $obj, 'obj2' => $obj2, 'obj3' => $obj3, 'ent' =>$ent)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('presnomcalintpre/edit_footer', array('nppresoc' => $nppresoc)) ?>
</div>

</div>
