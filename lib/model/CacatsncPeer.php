<?php

/**
 * Subclass for performing query and update operations on the 'cacatsnc' table.
 *
 *
 *
 * @package lib.model
 */
class CacatsncPeer extends BaseCacatsncPeer
{

 public static function getDessnc($codigo)
  {
	return Herramientas::getX('codsnc','Cacatsnc','Dessnc',$codigo);
  }
}
