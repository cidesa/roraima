<?php

/**
 * Subclass for representing a row from the 'ccrecaud' table.
 *
 *
 *
 * @package lib.model
 */
class Ccrecaud extends BaseCcrecaud
{

	public function __toString(){
		return $this->getNomrec();
	}
}
