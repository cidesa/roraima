<?php

/**
 * Subclass for representing a row from the 'ccperpre' table.
 *
 *
 *
 * @package lib.model
 */
class Ccperpre extends BaseCcperpre
{
	public function __toString(){
    return $this->getPrefijo();
  }


}
