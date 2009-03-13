<?php

/**
 * Subclass for performing query and update operations on the 'tstipcue' table.
 *
 *
 *
 * @package lib.model
 */
class TstipcuePeer extends BaseTstipcuePeer
{

	public static function getDestip($codigo)
	{
    	return Herramientas::getX('CODTIP','Tstipcue','Destip',$codigo);
	}
}
