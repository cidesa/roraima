<?php
// auto-generated by sfPropelAdmin
// date: 2007/05/07 11:41:49
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'PopUp', 'Grid', 'SubmitClick') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('edit facranpagimp', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('facranpagimp/edit_header', array('fcdefpgi' => $fcdefpgi)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('facranpagimp/edit_messages', array('fcdefpgi' => $fcdefpgi, 'labels' => $labels)) ?>
<?php include_partial('facranpagimp/edit_form', array('fcdefpgi' => $fcdefpgi, 'labels' => $labels, 'obj' => $obj)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('facranpagimp/edit_footer', array('fcdefpgi' => $fcdefpgi)) ?>
</div>

</div>
