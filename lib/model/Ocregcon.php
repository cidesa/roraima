<?php

/**
 * Subclass for representing a row from the 'ocregcon' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Ocregcon extends BaseOcregcon
{
 public function getDesobr()
  {
  	return Herramientas::getX('CODOBR','OCRegObr','Desobr',self::getCodobr());  	
  }
 public function getNompro()
  {
  	return Herramientas::getX('CODPRO','Caprovee','Nompro',self::getCodpro());  	
  }
  public function getNomtipcon()
  {
  	return Herramientas::getX('CodTipCon','OCTipCon','DesTipCon',self::gettipcon());  	
  }		 
}
