<?php

/**
 * Subclass for representing a row from the 'ccclabie' table.
 *
 *
 *
 * @package lib.model
 */
class Ccclabie extends BaseCcclabie
{
		public function __toString(){
		return $this->getNomclabie();
	}
}
