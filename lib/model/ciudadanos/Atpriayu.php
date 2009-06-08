<?php

/**
 * Subclass for representing a row from the 'atpriayu' table.
 *
 * 
 *
 * @package lib.model.ciudadanos
 */ 
class Atpriayu extends BaseAtpriayu
{
  public function __toString()
  {
    return $this->despriayu;
  }
	
}
