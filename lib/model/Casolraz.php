<?php

/**
 * Subclass for representing a row from the 'casolraz' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Casolraz extends BaseCasolraz
{
   public function getDesrazcom()
	{
		return Herramientas::getX('CODRAZCOM','Carazcom','Desrazcom',self::getCodrazcom());
	}
}
