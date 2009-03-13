<?php

/**
 * Subclass for representing a row from the 'ocdatste' table.
 *
 *
 *
 * @package lib.model
 */
class Ocdatste extends BaseOcdatste
{
	public function getDesste()
    {
  	return Herramientas::getX('codste','octipste','desste',self::getCodste());
    }	
}
