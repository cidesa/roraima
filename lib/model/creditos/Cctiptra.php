<?php

/**
 * Subclass for representing a row from the 'cctiptra' table.
 *
 *
 *
 * @package lib.model
 */
class Cctiptra extends BaseCctiptra
{
  public function __toString()
  {
    return $this->getNomtiptra();
  }
}
