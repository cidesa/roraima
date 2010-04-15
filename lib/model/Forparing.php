<?php

/**
 * Subclass for representing a row from the 'forparing' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Forparing extends BaseForparing
{
	public function getMontoing($val=false)
	{
		return parent::getMontoing(true);
	}
	
	public function getDespar()
	{
      return Herramientas::getX('CODPARING','Fordefparing','Nomparing',self::getCodparing());
	}
		
	public function getDesfin()
	{
      return Herramientas::getX('CODFIN','Fortipfin','Nomext',self::getCodtipfin());
	}
	
		
	
}
