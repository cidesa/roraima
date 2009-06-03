<?php

/**
 * Subclass for representing a row from the 'catconsoc' table.
 *
 *
 *
 * @package lib.model.catastro
 */
class Catconsoc extends BaseCatconsoc
{
  public function __toString()
  {
    return $this->desconsoc;
  }

}
