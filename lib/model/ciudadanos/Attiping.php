<?php

/**
 * Subclass for representing a row from the 'attiping' table.
 *
 *
 *
 * @package lib.model
 */
class Attiping extends BaseAttiping
{
  public function __toString()
  {
    return $this->getTiping();
  }
}
