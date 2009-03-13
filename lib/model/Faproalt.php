<?php

/**
 * Subclass for representing a row from the 'faproalt' table.
 *
 *
 *
 * @package lib.model
 */
class Faproalt extends BaseFaproalt
{
    public function getDesart()
    {
  	    return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
    }
}
