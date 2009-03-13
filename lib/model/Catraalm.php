<?php

/**
 * Subclass for representing a row from the 'catraalm' table.
 *
 *
 *
 * @package lib.model
 */
class Catraalm extends BaseCatraalm
{
	public function getAlmaori()
	{
		return Herramientas::getX('codalm','cadefalm','nomalm',self::getAlmori());
	}

	public function getAlmades()
	{
		return Herramientas::getX('codalm','cadefalm','nomalm',self::getAlmdes());
	}

	public function getNomubiori()
	{
		return Herramientas::getX('CODUBI','Cadefubi','Nomubi',self::getCodubiori());
	}

	public function getNomubides()
	{
		return Herramientas::getX('CODUBI','Cadefubi','Nomubi',self::getCodubides());
	}
}
