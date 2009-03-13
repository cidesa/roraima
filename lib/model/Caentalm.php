<?php

/**
 * Subclass for representing a row from the 'caentalm' table.
 *
 *
 *
 * @package lib.model
 */
class Caentalm extends BaseCaentalm
{
    public function getMonrcp($val=false)
	{
		return parent::getMonrcp(true);

	}
	public function getNomalm()
	{
		return Herramientas::getX('CODALM','Cadefalm','Nomalm',self::getCodalm());
	}
	public function getNompro()
	{
		return Herramientas::getX('CODPRO','Caprovee','Nompro',self::getCodpro());
	}
	public function getNomtip()
	{
		return Herramientas::getX('CODTIPENT','Catipent','Destipent',self::getTipmov());
	}

	public function getRifpro()
	{
	  return Herramientas::getX('codpro','caprovee','rifpro',self::getCodpro());
	}

	public function getNomubi()
	{
		return Herramientas::getX('CODUBI','Cadefubi','Nomubi',self::getCodubi());
	}

}
