<?php

/**
 * Subclass for representing a row from the 'cattipviv' table.
 *
 *
 *
 * @package lib.model.catastro
 */
class Cattipviv extends BaseCattipviv
{
  public function __toString()
  {
    return $this->destipviv;
  }

}
