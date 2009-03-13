<?php

/**
 * Subclass for representing a row from the 'fafordes' table.
 *
 *
 *
 * @package lib.model
 */
class Fafordes extends BaseFafordes
{
  public function __toString()
  {
    return $this->nomdes;
  }
}
