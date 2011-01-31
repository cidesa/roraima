<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/04/06 12:25:24
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Javascript', 'tabs', 'PopUp', 'Grid', 'Linktoapp') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Contratista',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('oycregpro/edit_header', array('caprovee' => $caprovee)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('oycregpro/edit_messages', array('caprovee' => $caprovee, 'labels' => $labels)) ?>
<?php include_partial('oycregpro/edit_form', array('caprovee' => $caprovee, 'labels' => $labels, 'obj' => $obj, 'obj2' => $obj2, 'obj3' => $obj3, 'loncta' => $loncta, 'mascara' => $mascara)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('oycregpro/edit_footer', array('caprovee' => $caprovee)) ?>
</div>

</div>
