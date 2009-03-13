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

}
