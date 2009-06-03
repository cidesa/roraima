<?php

/**
 * Subclass for representing a row from the 'cattipvia' table.
 *
 *
 *
 * @package lib.model.catastro
 */
class Cattipvia extends BaseCattipvia
{
  public function __toString()
  {
    return $this->desvia;
  }

}
