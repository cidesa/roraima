<?php

/**
 * Subclass for representing a row from the 'forcargos' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Forcargos extends BaseForcargos
{
	public function getNomtip()
	{
		return Herramientas::getX('codtipcar','Nptipcar','destipcar',self::getCodtip());
	}
}
