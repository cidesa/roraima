<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

 <?php use_helper('Javascript','Object')?>
<?php echo javascript_include_tag('ajax') ?>


<div id="sf_admin_content">
<?php
include_partial('facliente/doble', array('facliente' => $facliente, 'labels' => $labels, 'c' => $c)) ?>
</div>