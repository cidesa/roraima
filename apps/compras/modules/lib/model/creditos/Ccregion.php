<?php

/**
 * Subclass for representing a row from the 'ccregion' table.
 *
 *
 *
 * @package lib.model
 */
class Ccregion extends BaseCcregion
{
	 public function __toString(){
    return $this->getNomreg();
  }
}
