<?php

/**
 * Subclass for performing query and update operations on the 'octipprl' table.
 *
 *
 *
 * @package lib.model
 */
class OctipprlPeer extends BaseOctipprlPeer
{
  public static function getDato($codigo)
  {
	return Herramientas::getX('CODTIPPRO','Octipprl','Destippro',$codigo);
  }
}
