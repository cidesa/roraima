<?php

/**
 * Subclass for performing query and update operations on the 'octipcar' table.
 *
 *
 *
 * @package lib.model
 */
class OctipcarPeer extends BaseOctipcarPeer
{
  public static function getDestipo($codigo)
  {
  	 	return Herramientas::getX('CODTIPCAR','Octipcar','Destipcar',$codigo);
  }
}
