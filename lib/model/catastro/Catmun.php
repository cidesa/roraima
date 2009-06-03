<?php

/**
 * Subclass for representing a row from the 'catmun' table.
 *
 *
 *
 * @package lib.model.catastro
 */
class Catmun extends BaseCatmun
{
  public function __toString()
  {
    return $this->nommun;
  }

}
