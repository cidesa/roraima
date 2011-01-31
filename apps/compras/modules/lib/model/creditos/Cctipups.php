<?php

/**
 * Subclass for representing a row from the 'cctipups' table.
 *
 *
 *
 * @package lib.model
 */
class Cctipups extends BaseCctipups
{
	public function __toString(){
		return $this->getNomtipups();
	}
}
