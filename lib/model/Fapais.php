<?php

/**
 * Subclass for representing a row from the 'fapais' table.
 *
 *
 *
 * @package lib.model
 */
class Fapais extends BaseFapais
{
  public function __toString()
  {
    return $this->nompai;
  }

}
