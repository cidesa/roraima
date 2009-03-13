<?php

/**
 * Subclass for performing query and update operations on the 'ocunidad' table.
 *
 *
 *
 * @package lib.model
 */
class OcunidadPeer extends BaseOcunidadPeer
{
	public static function getDesuni($cod)
    {
  	  return Herramientas::getX_vacio('coduni','ocunidad','desuni',$cod);
    }

}
