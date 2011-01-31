<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?

$r = $tsdefban->getGripdesmovlib();
if (count($r["datos"])>0)
{
	echo grid_tag_v2($tsdefban->getGripdesmovlib());
}else{
	echo '<h4>No existen Movimientos Relacionado con la Busqueda...<h4>';
}

?>

