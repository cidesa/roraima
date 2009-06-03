<?php

/**
 * Subclass for representing a row from the 'catusoesp' table.
 *
 *
 *
 * @package lib.model.catastro
 */
class Catusoesp extends BaseCatusoesp
{
  public function __toString()
  {
    return $this->desuso;
  }

}
