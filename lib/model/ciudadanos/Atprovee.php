<?php

/**
 * Subclass for representing a row from the 'atprovee' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Atprovee extends BaseAtprovee
{
	
	public function __toString()
	{
		return $this->rifpro." - ".$this->nompro;
	}
  
}