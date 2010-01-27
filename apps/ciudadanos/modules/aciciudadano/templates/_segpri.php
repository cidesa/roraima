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
<?php echo radiobutton_tag('atciudadano[segpri]', 'true', $atciudadano->getSegpri()==true ? true : false ); ?>
&emsp;
<?php echo __('No') ?>
<?php echo radiobutton_tag('atciudadano[segpri]', 'false', $atciudadano->getSegpri()==false ? true : false ); ?>
