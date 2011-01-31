<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/21 10:44:21
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Linktoapp') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Compensacion por Nomina',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('nomconceptoscompensacion/edit_header', array('npconcomp' => $npconcomp)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('nomconceptoscompensacion/edit_messages', array('npconcomp' => $npconcomp, 'labels' => $labels)) ?>
<?php include_partial('nomconceptoscompensacion/edit_form', array('npconcomp' => $npconcomp, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('nomconceptoscompensacion/edit_footer', array('npconcomp' => $npconcomp)) ?>
</div>

</div>
