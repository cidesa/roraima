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
		return Herramientas::getX('CODART','caregart','desart',self::getCodart());
	}
	public function getNomcat()
	{
		return Herramientas::getX('codcat','npcatpre','nomcat',str_pad(self::getCodcat(), 32, ' '));
	}	
}
