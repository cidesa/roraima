<?php

/**
 * Subclass for representing a row from the 'caartalmubi' table.
 *
 *
 *
 * @package lib.model
 */
class Caartalmubi extends BaseCaartalmubi
{
	public function getNomubi()
	{
		return Herramientas::getX('CODUBI', 'Cadefubi', 'Nomubi', self::getCodubi());

	}
}
