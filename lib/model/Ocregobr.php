<?php

/**
 * Subclass for representing a row from the 'ocregobr' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Ocregobr extends BaseOcregobr
{
  public function getDescon()
  {
  	return Herramientas::getX('CODCON','OCRegCon','Descon',self::getCodcon());  	
  }
 public function getNompro()
  {
  	return Herramientas::getX('CODPRO','Caprovee','Nompro',self::getCodpro());  	
  }	 
}
