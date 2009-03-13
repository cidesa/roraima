<?php

/**
 * Subclass for representing a row from the 'fatipmov' table.
 *
 *
 *
 * @package lib.model
 */
class Fatipmov extends BaseFatipmov
{
   public function __toString()
  {
    return $this->desmov;
  }
}
