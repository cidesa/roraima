<?php

/**
 * Subclass for representing a row from the 'cctipliq' table.
 *
 *
 *
 * @package lib.model
 */
class Cctipliq extends BaseCctipliq
{
	public function __toString(){
		return $this->getNomtipliq();
	}

}
