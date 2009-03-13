<?php

/**
 * Subclass for representing a row from the 'cadettra' table.
 *
 *
 *
 * @package lib.model
 */
class Cadettra extends BaseCadettra
{
	public function getDesart()
	{
		return Herramientas::getX('CODART','CAREGART','DESART',self::getCodart());
	}
	public function getUnimed()
	{
		return Herramientas::getX('CODART','CAREGART','UNIMED',self::getCodart());
	}

}
