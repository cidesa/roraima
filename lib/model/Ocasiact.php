<?php

/**
 * Subclass for representing a row from the 'ocasiact' table.
 *
 *
 *
 * @package lib.model
 */
class Ocasiact extends BaseOcasiact
{
	public function getDestipact()
	{
		return Herramientas::getX('codtipact','octipact','destipact',self::getCodtipact());
	}
}
