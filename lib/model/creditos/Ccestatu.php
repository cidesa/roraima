<?php

/**
 * Subclass for representing a row from the 'ccestatu' table.
 *
 *
 *
 * @package lib.model
 */
class Ccestatu extends BaseCcestatu
{
  public function __toString(){
    return $this->getNombre();
  }

  public function getGerencia(){
   return Herramientas::getX('id','ccgerenc','nomger',self::getCcgerencid());
  }

}
