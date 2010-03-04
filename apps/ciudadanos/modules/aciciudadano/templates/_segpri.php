<?php
/*
 * Created on 26/01/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>
<?php echo $atciudadano->getSegpri() ?>
<?php echo __('Sí') ?>
<?php echo radiobutton_tag('atciudadano[segpri]', 1, $atciudadano->getSegpri()==1 ? true : false ); ?>
&emsp;
<?php echo __('No') ?>
<?php echo radiobutton_tag('atciudadano[segpri]', 0, $atciudadano->getSegpri()==0 ? true : false ); ?>
