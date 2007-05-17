<?php

/**
 * Subclass for representing a row from the 'fctipsol' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Fctipsol extends BaseFctipsol
{
public function getNomfueing()
  {
  	return Herramientas::getX('CODFUE','FCFuePre','Nomfue',self::getFueing());  	
  }
}
