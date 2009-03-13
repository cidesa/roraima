<?php
use_helper('Catalogo');

echo Catalogo($fadescom,4,array(
	'getprincipal' => 'getCodDesc',
	'getsecundario' => 'getDesDec',
	'campoprincipal' => 'coddesc',
	'camposecundario' => 'desdec',
	'campobase' => 'xxx',
	), '', 'fadescto', ''
);

?>