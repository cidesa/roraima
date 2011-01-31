<?php

/**
 * Subclass for representing a row from the 'ccareger' table.
 *
 *
 *
 * @package lib.model
 */
class Ccareger extends BaseCcareger
{
  public function __toString(){
    return $this->getNomare();
  }

  public function getGerencia(){
  	return Herramientas::getX('id','ccgerenc','nomger',self::getCcgerencId());
  }

}
