<?php

/**
 * Subclass for representing a row from the 'ccubiadm' table.
 *
 *
 *
 * @package lib.model
 */
class Ccubiadm extends BaseCcubiadm
{
	public function __toString(){
    return $this->getNomubiadm();
  }
}
