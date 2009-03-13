<?php
use_helper('Catalogo');

echo Catalogo($faartcom,4,array(
	'getprincipal' => 'getCodCom',
	'getsecundario' => 'getNomCom',
	'campoprincipal' => 'codcom',
	'camposecundario' => 'nomcom',
	'campobase' => 'xxx',
	), '', 'fadefcom', ''
);

?>