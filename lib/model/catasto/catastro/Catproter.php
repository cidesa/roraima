<?php

/**
 * Subclass for representing a row from the 'catproter' table.
 *
 *
 *
 * @package lib.model.catastro
 */
class Catproter extends BaseCatproter
{
  public function __toString()
  {
    return $this->descatproter;
  }
}
