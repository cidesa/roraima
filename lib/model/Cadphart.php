<?php

/**
 * Subclass for representing a row from the 'cadphart' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Cadphart extends BaseCadphart
{
	public function getNomalm()
	{
		return Herramientas::getX('CODALM','Cadefalm','Nomalm',self::getCodalm());
	}
	
	public function getDesreq()
	{
		return Herramientas::getX('REQART','Careqart','Desreq',self::getReqart());
	}
	
	public function getFecreq()
	{
		return Herramientas::getX('REQART','Careqart','Fecreq',self::getReqart());
	}
	
	public function getDescat()
	{
		return Herramientas::getX('CODCAT','Npcatpre','Descat',self::getCodori());
	}
}
