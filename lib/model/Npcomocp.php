<?php

/**
 * Subclass for representing a row from the 'npcomocp' table.
 *
 *
 *
 * @package lib.model
 */
class Npcomocp extends BaseNpcomocp
{
	  public function getDestipcar()
	  {
	  	return Herramientas::getX('Codtipcar','Nptipcar','Destipcar',self::getCodtipcar());
	  }

}