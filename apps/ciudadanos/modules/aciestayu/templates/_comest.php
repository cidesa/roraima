<?php
/*
 * Created on 30/06/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php echo select_tag('atestayu[comest]', options_for_select(Constantes::listaComportamientoEstadosAyudas(),$atestayu->getComest())); ?>

