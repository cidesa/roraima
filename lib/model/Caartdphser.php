<?php

/**
 * Subclass for representing a row from the 'caartdphser' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Caartdphser extends BaseCaartdphser
{
	public function getNomart()
	{
		return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
	}
	
}
