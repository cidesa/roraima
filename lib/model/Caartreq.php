<?php

/**
 * Subclass for representing a row from the 'caartreq' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Caartreq extends BaseCaartreq
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
		return Herramientas::getX('CODFAL','Camotfal','Desfal',self::getRelart());
	}
	
    public function getNomcat()
	{
		return Herramientas::getX('codcat','npcatpre','nomcat',self::getCodcat());
	}
}
