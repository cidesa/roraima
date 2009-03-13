<?php

/**
 * Subclass for representing a row from the 'faforsol' table.
 *
 *
 *
 * @package lib.model
 */
class Faforsol extends BaseFaforsol
{
  public function __toString()
  {
    return $this->nomsol;
  }
}
