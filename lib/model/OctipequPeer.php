<?php

/**
 * Subclass for performing query and update operations on the 'octipequ' table.
 *
 *
 *
 * @package lib.model
 */
class OctipequPeer extends BaseOctipequPeer
{
  public static function getDestipo($codigo)
  {
  	return Herramientas::getX('CODTIPEQU','Octipequ','Destipequ',$codigo);
  }
}
