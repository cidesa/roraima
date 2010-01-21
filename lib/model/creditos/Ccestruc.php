<?php

/**
 * Subclass for representing a row from the 'ccestruc' table.
 *
 *
 *
 * @package lib.model
 */
class Ccestruc extends BaseCcestruc
{
	public function __toString(){
     return $this->getNomestruc();
  }
}
