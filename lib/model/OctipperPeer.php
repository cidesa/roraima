<?php

/**
 * Subclass for performing query and update operations on the 'octipper' table.
 *
 *
 *
 * @package lib.model
 */
class OctipperPeer extends BaseOctipperPeer
{
  public static function getDestipo($codigo)
  {
  	 	return Herramientas::getX('CODTIPPER','Octipper','Destipper',$codigo);
  }
}
