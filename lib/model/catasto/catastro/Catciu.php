<?php

/**
 * Subclass for representing a row from the 'catciu' table.
 *
 *
 *
 * @package lib.model.catastro
 */
class Catciu extends BaseCatciu
{
  public function __toString()
  {
    return $this->nomciu;
  }

}
