<?php

/**
 * Subclass for performing query and update operations on the 'octipact' table.
 *
 *
 *
 * @package lib.model
 */
class OctipactPeer extends BaseOctipactPeer
{
	public static function getDestipact($cod)
    {
  	  return Herramientas::getX_vacio('codtipact','octipact','destipact',str_pad($cod,4,'0',STR_PAD_LEFT));
    }
}
