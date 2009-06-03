<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<div id='divTipoNorte'>
<?php
$tipo=array();
	echo
	select_tag('catman[cattramonorId]', options_for_select(
	$tipo,
	$catman->getTiplinnor(),'include_custom=Seleccione Uno')
	);


?>
</div>
