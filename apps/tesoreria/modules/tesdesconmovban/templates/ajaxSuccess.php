<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?
$r = $tsdefban->getGripdesmovban();
if (count($r["datos"])>0)
{
	echo grid_tag_v2($tsdefban->getGripdesmovban());
}else{
	echo '<h4>No existen Movimientos Relacionado con la Busqueda...<h4>';
}

?>
