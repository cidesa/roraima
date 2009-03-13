<?php

/**
 * Subclass for representing a row from the 'faartpro' table.
 *
 *
 *
 * @package lib.model
 */
class Faartpro extends BaseFaartpro
{
	public $obj = array();

	public function getNomalm()
	{
		return Herramientas::getX('CODALM','Cadefalm','Nomalm',self::getCodalm());
	}
	public function getNompro()
	{
		return Herramientas::getX('CODPRO','Facliente','Nompro',self::getCodpro());
	}
	public function getRifpro()
	{
		return Herramientas::getX('CODPRO','Facliente','Rifpro',self::getCodpro());
	}
    public function getDesart()
    {
  	    return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
    }
    public function getDescta()
    {
  	    return Herramientas::getX('CODCTA','Contabb','Descta',self::getCodcta());
    }
}
