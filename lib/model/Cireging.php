<?php

/**
 * Subclass for representing a row from the 'cireging' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Cireging extends BaseCireging
{
   public function getDestip1()
	  {
	  	return Herramientas::getX('CODTIP','Citiping','Destip',self::getCodtip());
	  }

	public function getNomcon()
	  {
	  	return Herramientas::getX('RIFCON','Ciconrep','Nomcon',self::getRifcon());
	  }	  
	  
	public function getNomcue()
	  {
	  	return Herramientas::getX('NUMCUE','Tsdefban','Nomcue',self::getCtaban());
	  }	  
	  
	public function getDestip2()
	  {
	  	return Herramientas::getX('CODTIP','Tstipmov','Destip',self::getTipmov());
	  } 
}
