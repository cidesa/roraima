<?php

/**
 * Subclass for representing a row from the 'faartpvp' table.
 *
 *
 *
 * @package lib.model
 */
class Faartpvp extends BaseFaartpvp
{
	public $obj = array();

    public function getDesart()
    {
  	    return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
    }

  public function getDesartdesde()
  {
	return Herramientas::getX('CODART','Caregart','Desart',self::getArtdesde());
  }

  public function getDesarthasta()
  {
	return Herramientas::getX('CODART','Caregart','Desart',self::getArthasta());
  }

  public function getArtdesde()///
  {
	   return '';
  }

  public function getArthasta()
  {
	   return '';
  }

}
