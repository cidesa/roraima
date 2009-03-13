<?php

/**
 * Subclass for performing query and update operations on the 'fordetpryaccespmet' table.
 *
 *
 *
 * @package lib.model
 */
class FordetpryaccespmetPeer extends BaseFordetpryaccespmetPeer
{
	public static function getCodpro($codmet, $codpro, $codaccesp)
	{
	  return  Herramientas::getXx('Fordetpryaccespmet',array('CODMET','CODPRO','CODACCESP'),array($codmet, $codpro, $codaccesp),'Codpro');
	}

}
