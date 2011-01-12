<?php

/**
 * Subclass for representing a row from the 'ccdeducc' table.
 *
 *
 *
 * @package lib.model
 */
class Ccdeducc extends BaseCcdeducc
{
	 public function getDescta(){
   return Herramientas::getX('id','contabb','descta',self::getCodcta());
  }

}
