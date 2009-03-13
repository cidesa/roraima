<?php

/**
 * Subclass for representing a row from the 'tsdefrengas' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Tsdefrengas extends BaseTsdefrengas
{
  public function getNomext()
  {
	return Herramientas::getX('TIPCAU','Cpdoccau','Nomext',self::getPagrepcaj());
  }
  
  public function getDestip()
  {
	return Herramientas::getX('CODTIP','Tstipmov','Destip',self::getMovreicaj());
  }
  
  public function getDescta()
  {
	return Herramientas::getX('CODCTA','Contabb','Descta',self::getCtarepcaj());
  }
  
  public function getDescta2()
  {
	return Herramientas::getX('CODCTA','Contabb','Descta',self::getCtacheant());
  }
}
