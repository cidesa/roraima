<?php

/**
 * Subclass for representing a row from the 'ccperiod' table.
 *
 *
 *
 * @package lib.model
 */
class Ccperiod extends BaseCcperiod
{
	public function __toString(){
	 return $this->getDesper();
	}

}
