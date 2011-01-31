<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'SubmitClick', 'PopUp', 'Javascript') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Recargos',array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('farecarg/edit_header', array('farecarg' => $farecarg)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('farecarg/edit_messages', array('farecarg' => $farecarg, 'labels' => $labels)) ?>
<?php include_partial('farecarg/edit_form', array('farecarg' => $farecarg, 'tipoformato' => $tipoformato, 'longpre' => $longpre, 'longcon'=> $longcon, 'mascarapresupuestaria' => $mascarapresupuestaria, 'mascaracontabilidad' => $mascaracontabilidad, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('farecarg/edit_footer', array('farecarg' => $farecarg)) ?>
</div>

</div>