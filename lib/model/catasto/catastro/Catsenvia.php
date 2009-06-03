<?php

/**
 * Subclass for representing a row from the 'catsenvia' table.
 *
 *
 *
 * @package lib.model.catastro
 */
class Catsenvia extends BaseCatsenvia
{
  public function __toString()
  {
    return $this->dessen;
  }

}
