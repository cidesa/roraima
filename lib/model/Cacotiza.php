<?php

/**
 * Subclass for representing a row from the 'cacotiza' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Cacotiza extends BaseCacotiza
{
	private $rifpro = '';
	
	
	public function getNompro()
	{
	  return Herramientas::getX('codpro','caprovee','nompro',self::getCodpro());
	}
	
	

	public function getDesconpag()
	{
	  return Herramientas::getX('codconpag','caconpag','desconpag',self::getConpag());
	}
	
	public function getDesforent()
	{
	  return Herramientas::getX('codforent','caforent','desforent',self::getForent());
	}

	public function getDesreq()
	{
	  return Herramientas::getX('reqart','casolart','desreq',self::getRefsol());
	}
	
	public function getRifpro()
	{
	  return Herramientas::getX('codpro','caprovee','rifpro',self::getCodpro());	 
	}
	
   public function setRifpro($val)
    {
	   $this->rifpro= $val;		
	}
	
	public function getRifpronew()
    {  		
		return $this->rifpro;
    }
}
