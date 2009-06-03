<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<div id='divTipoEste'>
<?php
$tipo=array();
	echo
	select_tag('catman[cattramoestId]', options_for_select(
	$tipo,
	$catman->getTiplinoest(),'include_custom=Seleccione Uno')
	);
?>
</div>
