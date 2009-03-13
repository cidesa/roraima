<?php

/**
 * Subclass for representing a row from the 'atgrudon' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Atgrudon extends BaseAtgrudon
{
  public function __toString()
  {
    return $this->getDesgru();

  }
}
