<?php

/**
 * Subclass for representing a row from the 'faconpag' table.
 *
 *
 *
 * @package lib.model
 */
class Faconpag extends BaseFaconpag
{
  public function __toString()
  {
    return $this->desconpag;
  }

  public function getCodconpag()
  {
  	$valor=self::getId();
   return $valor;
  }
}
