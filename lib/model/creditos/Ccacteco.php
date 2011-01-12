<?php

/**
 * Subclass for representing a row from the 'ccacteco' table.
 *
 *
 *
 * @package lib.model
 */
class Ccacteco extends BaseCcacteco
{
	public function __toString(){
		return $this->getNomacteco();
	}

}
