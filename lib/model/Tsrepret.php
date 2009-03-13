<?php

/**
 * Subclass for representing a row from the 'tsrepret' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Tsrepret extends BaseTsrepret
{
	public function getDesret()
	{
		return Herramientas::getX('codtip','optipret','destip',self::getCodret());
	}
}
