<?php

/**
 * Subclass for representing a row from the 'farecart' table.
 *
 *
 *
 * @package lib.model
 */
class Farecart extends BaseFarecart
{
    public function getDesart()
    {
  	    return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
    }

    public function getNomrgo()
    {
  	    return Herramientas::getX('CODRGO','Farecarg','Nomrgo',self::getCodrgo());
    }

}
