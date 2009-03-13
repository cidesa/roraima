<?php

/**
 * Subclass for representing a row from the 'npincapa' table.
 *
 *
 *
 * @package lib.model
 */
class Npincapa extends BaseNpincapa
{

	public function __toString()
    {
		return $this->getDesinc();
    }
}
