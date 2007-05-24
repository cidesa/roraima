<?php

/**
 * Subclass for representing a row from the 'caartdph' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Caartdph extends BaseCaartdph
{
	public function getDesart()
	{
		return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
	}
	
	public function getUnimed()
	{
		return Herramientas::getX('CODART','Caregart','Unimed',self::getCodart());
	}
	
	public function getCospro()
	{
		return Herramientas::getX('CODART','Caregart','Cospro',self::getCodart());
	}
	
	public function getDesfal()
	{
		return Herramientas::getX('CODFAL','Camotfal','Desfal',self::getCodfal());
	}
}
