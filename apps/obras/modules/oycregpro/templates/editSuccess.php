<?php
// auto-generated by sfPropelAdmin
// date: 2007/04/06 12:25:24
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Definición de Contratista', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('oycregpro/edit_header', array('caprovee' => $caprovee)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('oycregpro/edit_messages', array('caprovee' => $caprovee, 'labels' => $labels)) ?>
<?php include_partial('oycregpro/edit_form', array('caprovee' => $caprovee, 'labels' => $labels, 'rs' => $rs, 'rs2' => $rs2, 'rs3' => $rs3)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('oycregpro/edit_footer', array('caprovee' => $caprovee)) ?>
</div>

</div>
