<?php

/**
 * Subclass for representing a row from the 'cctipprobie' table.
 *
 *
 *
 * @package lib.model
 */
class Cctipprobie extends BaseCctipprobie
{
	public function __toString(){
		return $this->getNomtipprobie();
	}

}
