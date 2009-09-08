<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/05/04 19:24:10
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid', 'Javascript') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Obras',array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('oycdesobr/edit_header', array('ocregobr' => $ocregobr)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('oycdesobr/edit_messages', array('ocregobr' => $ocregobr, 'labels' => $labels)) ?>
<?php include_partial('oycdesobr/edit_form', array('ocregobr' => $ocregobr, 'labels' => $labels, 'obj' => $obj, 'obj2' => $obj2, 'pais' => $pais, 'estados' => $estados, 'municipio' => $municipio, 'parroquia' => $parroquia, 'sector' => $sector, 'mascarapresupuesto' => $mascarapresupuesto, 'lonpre' => $lonpre)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('oycdesobr/edit_footer', array('ocregobr' => $ocregobr)) ?>
</div>

</div>
