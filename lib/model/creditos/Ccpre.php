<?php

/**
 * Subclass for representing a row from the 'ccpre' table.
 *
 *
 *
 * @package lib.model
 */
class Ccpre extends BaseCcpre
{
	public function __toString(){
    return $this->getPregun();
  }
}
