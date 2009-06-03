<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<div id='divTipoSur'>
<?php
$tipo=array();
	echo
	select_tag('catman[cattramosurId]', options_for_select(
	$tipo,
	$catman->getTiplinsur(),'include_custom=Seleccione Uno')
	);
?>
</div>
