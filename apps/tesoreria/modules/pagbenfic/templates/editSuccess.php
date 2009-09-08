<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/07/04 15:13:45
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date','PopUp', 'Grid', 'Javascript', 'tabs', 'Linktoapp') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Beneficiarios',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('pagbenfic/edit_header', array('opbenefi' => $opbenefi)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('pagbenfic/edit_messages', array('opbenefi' => $opbenefi, 'labels' => $labels)) ?>
<?php include_partial('pagbenfic/edit_form', array('opbenefi' => $opbenefi, 'labels' => $labels, 'mascaracontabilidad' => $mascaracontabilidad, 'lengthmask' => $lengthmask)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('pagbenfic/edit_footer', array('opbenefi' => $opbenefi)) ?>
</div>

</div>
