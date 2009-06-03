<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<div id='divTipoOeste'>
<?php
$tipo=array();
	echo
	select_tag('catman[cattramooesId]', options_for_select(
	$tipo,
	$catman->getTiplinoes(),'include_custom=Seleccione Uno')
	);
?>
</div>
