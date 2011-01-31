<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'PopUp', 'Grid', 'SubmitClick', 'Javascript') ?>
<? function Mensaje($msj)
 { ?>
 	<script>alert('<? echo $msj; ?>')</script>
 <? }
 ?>


<?
	if (!empty($obj)){
		echo grid_tag($obj);

	}else{
		Mensaje('Meta no se encuentra definida para Accion Especifica y Proyecto Seleccionado');

	}
?>


