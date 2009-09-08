<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/07/04 11:01:16
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'PopUp', 'Grid', 'Javascript', 'tabs', 'Linktoapp') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Definición de Empresa',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('pagdefemp/edit_header', array('opdefemp' => $opdefemp)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('pagdefemp/edit_messages', array('opdefemp' => $opdefemp, 'labels' => $labels)) ?>
<?php include_partial('pagdefemp/edit_form', array('opdefemp' => $opdefemp, 'labels' => $labels, 'mascaracontabilidad' => $mascaracontabilidad, 'lonconta' => $lonconta, 'esta' => $esta, 'mascaracategoria' => $mascaracategoria, 'loncat' => $loncat)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('pagdefemp/edit_footer', array('opdefemp' => $opdefemp)) ?>
</div>

</div>
