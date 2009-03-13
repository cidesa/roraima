<?php

/**
 * Subclass for representing a row from the 'fanotent' table.
 *
 *
 *
 * @package lib.model
 */
class Fanotent extends BaseFanotent
{
	public $obj = array();

    public function getRifpro()
    {
        return Herramientas::getX('CODPRO','Facliente','Rifpro',self::getCodcli());
    }

    public function getNompro()
    {
  	    return Herramientas::getX('CODPRO','Facliente','Nompro',self::getCodcli());
    }

    public function getDirpro()
    {
  	    return Herramientas::getX('CODPRO','Facliente','Dirpro',self::getCodcli());
    }

    public function getTelpro()
    {
  	    return Herramientas::getX('CODPRO','Facliente','Telpro',self::getCodcli());
    }

    public function getNomalm()
    {
  	    return Herramientas::getX('CODALM','Cadefalm','nomalm',self::getCodalm());
    }

    public function getNoment()
    {
  	    return Herramientas::getX('RIFPRO','Facliente','nompro',self::getRifent());
    }

}
