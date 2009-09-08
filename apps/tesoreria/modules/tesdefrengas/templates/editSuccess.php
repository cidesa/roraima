<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/15 18:36:41
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'PopUp', 'Javascript', 'Linktoapp') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Cuentas Contables para Rendición de Gastos',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('tesdefrengas/edit_header', array('tsdefrengas' => $tsdefrengas)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('tesdefrengas/edit_messages', array('tsdefrengas' => $tsdefrengas, 'labels' => $labels)) ?>
<?php include_partial('tesdefrengas/edit_form', array('tsdefrengas' => $tsdefrengas, 'mascara' => $mascara, 'loncta' => $loncta, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('tesdefrengas/edit_footer', array('tsdefrengas' => $tsdefrengas)) ?>
</div>

</div>
