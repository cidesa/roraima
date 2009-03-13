<?php
use_helper('Catalogo');

echo Catalogo($faajuste,4,array(
	'getprincipal' => 'getCodAlm',
	'getsecundario' => 'getNomAlm',
	'campoprincipal' => 'codalm',
	'camposecundario' => 'nomalm',
	'campobase' => 'xxx',
	), '', 'cadefalm', ''
);

?>