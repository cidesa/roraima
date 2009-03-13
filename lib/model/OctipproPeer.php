<?php

/**
 * Subclass for performing query and update operations on the 'octippro' table.
 *
 *
 *
 * @package lib.model
 */
class OctipproPeer extends BaseOctipproPeer
{
	public static function getDestipo($codigo)
  {
  	 	return Herramientas::getX('CODTIPPRO','Octippro','Destippro',$codigo);
  }
}
