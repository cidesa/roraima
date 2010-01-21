<?php

/**
 * Subclass for representing a row from the 'cctipana' table.
 *
 *
 *
 * @package lib.model
 */
class Cctipana extends BaseCctipana
{
  public function __toString()
  {
    return $this->getNomtipana();
  }

  public function getNombregerencia()
  {
   return Herramientas::getX('id','ccgerenc','nomger',self::getCcgerencId());
  }
}
