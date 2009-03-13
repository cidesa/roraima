<?php

/**
 * Subclass for representing a row from the 'lisicact' table.
 *
 *
 *
 * @package lib.model
 */
class Lisicact extends BaseLisicact
{
  public function __toString()
  {
    return $this->dessicact;
  }
}
