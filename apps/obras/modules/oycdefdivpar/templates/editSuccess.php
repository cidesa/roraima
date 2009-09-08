<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/06/30 09:48:50
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Parroquias',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('oycdefdivpar/edit_header', array('ocparroq' => $ocparroq)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('oycdefdivpar/edit_messages', array('ocparroq' => $ocparroq, 'labels' => $labels)) ?>
<?php include_partial('oycdefdivpar/edit_form', array('ocparroq' => $ocparroq, 'pais' => $pais, 'estados' => $estados, 'municipios' => $municipios, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('oycdefdivpar/edit_footer', array('ocparroq' => $ocparroq)) ?>
</div>

</div>
