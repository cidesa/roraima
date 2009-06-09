<?php

/**
 * Subclass for representing a row from the 'npvacdefgen' table.
 *
 *
 *
 * @package lib.model
 */
class Npvacdefgen extends BaseNpvacdefgen
{
	public function getNomnom()
	{	 
    	return Herramientas::getX('codnom','npnomina','nomnom',self::getCodnomvac());
    }

	public function getNomcon1()
	
	{ 
		return Herramientas::getX('codcon','npdefcpt','nomcon',self::getCodconvac());
	}	  
    
    public function getNomcon2()
	
	{ 
		return Herramientas::getX('codcon','npdefcpt','nomcon',self::getCodconuti());
	}	  
    	  



}
