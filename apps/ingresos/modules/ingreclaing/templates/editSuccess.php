<?php
// auto-generated by sfPropelAdmin
// date: 2007/04/30 10:25:49
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edicion de Reclasificación de Ingresos', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('ingreclaing/edit_header', array('cireging' => $cireging)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('ingreclaing/edit_messages', array('cireging' => $cireging, 'labels' => $labels)) ?>
<?php include_partial('ingreclaing/edit_form', array('cireging' => $cireging, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('ingreclaing/edit_footer', array('cireging' => $cireging)) ?>
</div>

</div>
