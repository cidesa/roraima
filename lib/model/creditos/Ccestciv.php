<?php

/**
 * Subclass for representing a row from the 'ccestciv' table.
 *
 *
 *
 * @package lib.model
 */
class Ccestciv extends BaseCcestciv
{

	public function __toString(){
		return $this->getNomestciv();
	}

}
