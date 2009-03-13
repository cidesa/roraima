<?php

/**
 * Subclass for performing query and update operations on the 'npincapa' table.
 *
 *
 *
 * @package lib.model
 */
class NpincapaPeer extends BaseNpincapaPeer
{
	public static function getDesinc($cod)
    {
  	  return Herramientas::getX_vacio('codinc','npincapa','desinc',str_pad($cod,10,'0',STR_PAD_LEFT));
    }

}
