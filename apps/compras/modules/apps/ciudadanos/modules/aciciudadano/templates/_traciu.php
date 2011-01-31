<?php
/*
 * Created on 26/01/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php echo __('Sí') ?>
<?php echo radiobutton_tag('atciudadano[traciu]', 1, $atciudadano->getTraciu()==1 ? true : false ); ?>
&emsp;
<?php echo __('No') ?>
<?php echo radiobutton_tag('atciudadano[traciu]', 0, $atciudadano->getTraciu()==0 ? true : false ); ?>
