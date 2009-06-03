<?php

/**
 * Subclass for representing a row from the 'catest' table.
 *
 *
 *
 * @package lib.model.catastro
 */
class Catest extends BaseCatest
{
  public function __toString()
  {
    return $this->nomest;
  }

}
