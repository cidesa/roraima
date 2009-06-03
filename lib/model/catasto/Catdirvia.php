<?php

/**
 * Subclass for representing a row from the 'catdirvia' table.
 *
 *
 *
 * @package lib.model.catastro
 */
class Catdirvia extends BaseCatdirvia
{
  public function __toString()
  {
    return $this->desdir;
  }

}
