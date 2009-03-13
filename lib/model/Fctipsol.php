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
	protected $grid= array();
  public function getNomfueing()
  {
  	return Herramientas::getX('CODFUE','FCFuePre','Nomfue',self::getFueing());
  }

  public function getDesing()
  {
	  	return Herramientas::getX('CODFUE','fcfuepre','Nomfue',self::getFueing());
  }
  public function getNomfue()
  {
  	return Herramientas::getX('CODFUE','FCFuePre','Nomfue',self::getFueing());
  }



}
