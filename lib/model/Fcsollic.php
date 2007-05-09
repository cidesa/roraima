<?php

/**
 * Subclass for representing a row from the 'fcsollic' table.
 *
 *
 *
 * @package lib.model
 */
class Fcsollic extends BaseFcsollic
{
	public function getNacconrep()
	{
		return Herramientas::getX('rifcon','fcconrep','naccon',str_pad(self::getRifcon(), 14 , ' '));
	}
	public function getNomconrep()
	{
		return Herramientas::getX('rifcon','fcconrep','nomcon',str_pad(self::getRifcon(), 14 , ' '));
	}
	public function getDirconrep()
	{
		return Herramientas::getX('rifcon','fcconrep','dircon',str_pad(self::getRifcon(), 14 , ' '));
	}
	public function getRepconrep()
	{
		return Herramientas::getX('rifcon','fcconrep','repcon',str_pad(self::getRifcon(), 14 , ' '));
	}
	public function getTipconrep()
	{
		return Herramientas::getX('rifcon','fcconrep','tipcon',str_pad(self::getRifcon(), 14 , ' '));
	}
	public function getDirinm()
	{
		return Herramientas::getX('CodCatInm','FCRegInm','Dirinm',self::getCatcon());
	}		
}
