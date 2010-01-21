<?php

/**
 * Subclass for representing a row from the 'cccargo' table.
 *
 *
 *
 * @package lib.model
 */
class Cccargo extends BaseCccargo
{
	public function __toString(){
    return $this->getNomcar();
  }

}
