<?php

/**
 * Subclass for performing query and update operations on the 'cpdoccom' table.
 *
 *
 *
 * @package lib.model
 */
class CpdoccomPeer extends BaseCpdoccomPeer
{

    public static function getNomext($codigo)
	{
    	return Herramientas::getX('tipcom','Cpdoccom','nomext',$codigo);
	}


}
