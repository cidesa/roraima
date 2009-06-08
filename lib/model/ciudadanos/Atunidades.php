<?php

/**
 * Subclass for representing a row from the 'atunidades' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Atunidades extends BaseAtunidades
{
  public function __toString()
  {
    return $this->getCoduni().' - '.$this->getDesuni();
  }
}
