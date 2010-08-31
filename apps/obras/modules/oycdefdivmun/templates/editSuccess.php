<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/06/29 18:49:14
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Municipio',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('oycdefdivmun/edit_header', array('ocmunici' => $ocmunici)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('oycdefdivmun/edit_messages', array('ocmunici' => $ocmunici, 'labels' => $labels)) ?>
<?php include_partial('oycdefdivmun/edit_form', array('ocmunici' => $ocmunici, 'labels' => $labels, 'pais' => $pais, 'estados' => $estados, 'ciudades' => $ciudades)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('oycdefdivmun/edit_footer', array('ocmunici' => $ocmunici)) ?>
</div>

</div>
