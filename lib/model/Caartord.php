<?php

/**
 * Subclass for representing a row from the 'caartord' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Caartord extends BaseCaartord
{
 public function getDesart()
  {
  	return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());  	
  }
}
