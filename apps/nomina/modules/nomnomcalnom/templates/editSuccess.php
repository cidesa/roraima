<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:editSuccess.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/12/28 10:35:59
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Cálculo de Nómina',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('nomnomcalnom/edit_header', array('npnomina' => $npnomina)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('nomnomcalnom/edit_messages', array('npnomina' => $npnomina, 'labels' => $labels)) ?>
<?php include_partial('nomnomcalnom/edit_form', array('npnomina' => $npnomina, 'labels' => $labels, 'ent' => $ent, 'obj' => $obj)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('nomnomcalnom/edit_footer', array('npnomina' => $npnomina)) ?>
</div>

</div>
