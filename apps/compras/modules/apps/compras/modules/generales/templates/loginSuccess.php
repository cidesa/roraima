<?php use_helper('Javascript') ?>

<?php if (SF_ENVIRONMENT=='dev') $dir = "/".sfConfig::get('app_autenticacion')."_dev.php/login"; else $dir = "/".sfConfig::get('app_autenticacion').".php/login"; ?>
<?php $script = 'location=('.'"'.$dir.'"'.')'  ?>
<?php echo javascript_tag($script); ?>