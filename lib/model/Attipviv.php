<?php

/**
 * Subclass for representing a row from the 'attipviv' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Attipviv extends BaseAttipviv
{
  public function __toString()
  {
    return $this->getTipviv();
  }
}
