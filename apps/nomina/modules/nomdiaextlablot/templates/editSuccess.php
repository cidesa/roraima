<?php
// auto-generated by sfPropelAdmin
// date: 2007/03/29 18:06:45
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Registro de Dias Extras Laborados por Nomina en Lote', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('nomdiaextlablot/edit_header', array('npnomina' => $npnomina)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('nomdiaextlablot/edit_messages', array('npnomina' => $npnomina, 'labels' => $labels)) ?>
<?php include_partial('nomdiaextlablot/edit_form', array('npnomina' => $npnomina, 'detalles' => $detalles, 'nuevo' => $nuevo, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('nomdiaextlablot/edit_footer', array('npnomina' => $npnomina)) ?>
</div>

</div>
