<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_helper('Javascript') ?>

<?php $js = "
     var msj='".$msj."';
     alert(msj);
     location=('/compras_dev.php/almsolegr/edit/id/".$id."');
"; ?>
<?php echo javascript_tag($js); ?>
