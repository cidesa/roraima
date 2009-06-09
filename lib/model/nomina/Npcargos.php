<?php

/**
 * Subclass for representing a row from the 'npcargos' table.
 *
 *
 *
 * @package lib.model
 */
class Npcargos extends BaseNpcargos
{
	public function getNomtip()
	{
		return Herramientas::getX('codtipcar','Nptipcar','destipcar',self::getCodtip());
	}

	public function getCodcarnew()
	{
		return self::getCodcar();
	}

	public function getNomcarnew()
	{
		return self::getNomcar();
	}
}
