<?php

/**
 * Subclass for performing query and update operations on the 'fordefpryaccmet' table.
 *
 *
 *
 * @package lib.model
 */
class FordefpryaccmetPeer extends BaseFordefpryaccmetPeer
{
	public static function getDesmet($codmet, $codpro, $codaccesp)  //Meta
	{
	  return  Herramientas::getXx('Fordefpryaccmet',array('CODMET','CODPRO','CODACCESP'),array($codmet, $codpro, $codaccesp),'Desmet');
	}

	public static function getCanmet($codmet, $codpro, $codaccesp)  //Cant Program Anual
	{
	  return  Herramientas::getXx('Fordefpryaccmet',array('CODMET','CODPRO','CODACCESP'),array($codmet, $codpro, $codaccesp),'Canmet');
	}
}
