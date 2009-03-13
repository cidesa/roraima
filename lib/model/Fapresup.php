<?php

/**
 * Subclass for representing a row from the 'fapresup' table.
 *
 *
 *
 * @package lib.model
 */
class Fapresup extends BaseFapresup
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

}
