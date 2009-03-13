<?php

/**
 * Subclass for performing query and update operations on the 'carecaud' table.
 *
 *
 *
 * @package lib.model
 */
class CarecaudPeer extends BaseCarecaudPeer
{
	public static function getDesrec($cod)
    {
  	  return Herramientas::getX_vacio('codrec','carecaud','desrec',str_pad($cod,10,'0',STR_PAD_LEFT));
    }
}
