<?php

/**
 * Subclass for representing a row from the 'catipalm' table.
 *
 *
 *
 * @package lib.model
 */
class Catipalm extends BaseCatipalm
{
	  public function __toString()
  {
    return $this->getNomtip();

  }
}
