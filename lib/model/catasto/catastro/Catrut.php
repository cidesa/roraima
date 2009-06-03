<?php

/**
 * Subclass for representing a row from the 'catrut' table.
 *
 *
 *
 * @package lib.model.catastro
 */
class Catrut extends BaseCatrut
{

  public function __toString()
  {
    return $this->desrut;
  }
}
