<?php

/**
 * Subclass for representing a row from the 'attrasoc' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Attrasoc extends BaseAttrasoc
{
  public function __toString()
  {
    return $this->getNomtra().' '.$this->getApetra();
  }
}
