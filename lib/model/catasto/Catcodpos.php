<?php

/**
 * Subclass for representing a row from the 'catcodpos' table.
 *
 *
 *
 * @package lib.model.catastro
 */
class Catcodpos extends BaseCatcodpos
{
  public function __toString()
  {
    return $this->despos;
  }

}
