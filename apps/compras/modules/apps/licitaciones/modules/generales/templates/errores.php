<?php
/*
 * Created on 26/05/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<?php include_http_metas() ?>
<?php include_metas() ?>
<?php include_title() ?>

<?php use_stylesheet('/sf/sf_default/css/screen.css', 'last') ?>

<link rel="shortcut icon" href="/favicon.ico" />

<!--[if lt IE 7.]>
<?php echo stylesheet_tag('/sf/sf_default/css/ie.css') ?>
<![endif]-->

<style type="text/css">
body {
background-color: #FFFFFF !important;
background-image: none !important;
}
</style>

</head>
<body>
<div class="sfTContainer" style="background-color:none important!;" >
  <?php echo link_to(image_tag('login_logo_01.jpg', array('alt' => 'SIGA-SL', 'class' => 'sfTLogo', 'size' => '186x120')), 'http://www.cidesa.com.ve/') ?>
  <?php echo $sf_data->getRaw('sf_content') ?>
</div>
</body>
</html>