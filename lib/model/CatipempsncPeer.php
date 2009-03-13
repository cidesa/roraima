<?php

/**
 * Subclass for performing query and update operations on the 'catipempsnc' table.
 *
 *
 *
 * @package lib.model
 */
class CatipempsncPeer extends BaseCatipempsncPeer
{
	public static function getDestip($codtip)
	{
    	return Herramientas::getX('CODTIP','Catipempsnc','Destip',str_pad($codtip,4,'0',STR_PAD_LEFT));
	}
}
