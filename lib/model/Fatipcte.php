<?php

/**
 * Subclass for representing a row from the 'fatipcte' table.
 *
 *
 *
 * @package lib.model
 */
class Fatipcte extends BaseFatipcte
{
  public function __toString()
  {
    return $this->nomtipcte;
  }
}
