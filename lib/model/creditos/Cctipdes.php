<?php

/**
 * Subclass for representing a row from the 'cctipdes' table.
 *
 *
 *
 * @package lib.model
 */
class Cctipdes extends BaseCctipdes
{

	public function __toString(){
		return $this->getNomtipdes();
	}
}
