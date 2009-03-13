<?php

/**
 * Subclass for performing query and update operations on the 'octipret' table.
 *
 *
 *
 * @package lib.model
 */
class OctipretPeer extends BaseOctipretPeer
{
	public static function getDesret($cod)
    {
  	  return Herramientas::getX('codtip','octipret','destip',$cod);
    }

	public static function getDesret_vacio($cod)
    {
  	  return Herramientas::getX_vacio('codtip','octipret','destip',$cod);
    }
}
