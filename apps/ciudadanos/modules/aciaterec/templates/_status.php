<?php
/*
 * Created on 26/01/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php echo select_tag('atreclamos[status]', options_for_select(Constantes::listaAtencionCiudadanos(),$atreclamos->getStatus_())); ?>

