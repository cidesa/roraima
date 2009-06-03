<?php

/**
 * Subclass for representing a row from the 'catconinm' table.
 *
 *
 *
 * @package lib.model.catastro
 */
class Catconinm extends BaseCatconinm
{
  public function __toString()
  {
    return $this->desconinm;
  }

}
