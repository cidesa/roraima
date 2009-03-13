<?php

/**
 * Subclass for representing a row from the 'cadetent' table.
 *
 *
 *
 * @package lib.model
 */
class Cadetent extends BaseCadetent
{
	public function getDesart()
	{
		return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
	}

	public function getNomalm()
	{
		return Herramientas::getX('CODALM','cadefalm','Nomalm',self::getCodalm());
	}

	public function getNomubi()
	{
		return Herramientas::getX('CODUBI','cadefubi','Nomubi',self::getCodubi());
	}

}
