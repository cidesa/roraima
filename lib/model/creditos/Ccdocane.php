<?php

/**
 * Subclass for representing a row from the 'ccdocane' table.
 *
 *
 *
 * @package lib.model
 */
class Ccdocane extends BaseCcdocane
{
	public function __toString(){
		return $this->getNomdocane();
	}

}
