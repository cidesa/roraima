<?php

/**
 * Subclass for representing a row from the 'cccondic' table.
 *
 *
 *
 * @package lib.model
 */
class Cccondic extends BaseCccondic
{
	public function __toString(){
    return $this->getNomcondic();
  }
}
