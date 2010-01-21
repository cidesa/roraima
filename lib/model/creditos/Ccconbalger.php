<?php

/**
 * Subclass for representing a row from the 'ccconbalger' table.
 *
 *
 *
 * @package lib.model
 */
class Ccconbalger extends BaseCcconbalger
{
  public function __toString(){
  	return $this->codigo."-".$this->getNomconbalger();
  }

  public function getNombreVariable(){
   return Herramientas::getX('id','ccvariab','nomvar',self::getCcvariabId());
  }
}
