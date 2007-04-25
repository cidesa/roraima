<?php

/**
 * Subclass for performing query and update operations on the 'cadefubi' table.
 *
 * 
 *
 * @package lib.model
 */ 
class CadefubiPeer extends BaseCadefubiPeer
{
	public static function getDesubicacion($codubi)
	{
    	return Herramientas::getX('CODUBI','Cadefubi','Nomubi',str_pad($codubi, 20 , ' '));		
	}
}
