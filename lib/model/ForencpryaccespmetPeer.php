<?php

/**
 * Subclass for performing query and update operations on the 'forencpryaccespmet' table.
 *
 * 
 *
 * @package lib.model
 */ 
class ForencpryaccespmetPeer extends BaseForencpryaccespmetPeer
{
	public function getNompro()
	{
	  return Herramientas::getX('codpro','Fordefpry','nompro',self::getCodpro());
	}	
}
