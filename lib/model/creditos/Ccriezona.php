<?php

/**
 * Subclass for representing a row from the 'ccriezona' table.
 *
 *
 *
 * @package lib.model
 */
class Ccriezona extends BaseCcriezona
{
	public function __toString(){
     return $this->getNomriezona();
  }
}
