<?php

/**
 * Subclass for representing a row from the 'cctipmon' table.
 *
 *
 *
 * @package lib.model
 */
class Cctipmon extends BaseCctipmon
{
	public function __toString(){
    return $this->getNomtipmon();
  }
}
