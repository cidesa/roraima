<?php

/**
 * Subclass for representing a row from the 'ccconfcon' table.
 *
 *
 *
 * @package lib.model
 */
class Ccconfcon extends BaseCcconfcon
{
	public function getCodcta(){
   return Herramientas::getX('id','contabb','codcta',self::getCuecon());
  }
	 public function getDescta(){
   return Herramientas::getX('id','contabb','descta',self::getCuecon());
  }
}
