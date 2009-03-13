<?php
use_helper('Catalogo');

echo Catalogo($fanotent,4,array(
	'getprincipal' => 'getCodcli',
	'getsecundario' => 'getNomcli',
	'campoprincipal' => 'codpro',
	'camposecundario' => 'nompro',
	'campobase' => 'xxx',
	), '', 'caprovee', ''
);

?>
