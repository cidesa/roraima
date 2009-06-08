<?php

/**
 * Subclass for representing a row from the 'attipproviv' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Attipproviv extends BaseAttipproviv
{
  public function __toString()
  {
    return $this->getTipproviv();
  }
}
