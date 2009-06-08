<?php

/**
 * Subclass for representing a row from the 'dfmedtra' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Dfmedtra extends BaseDfmedtra
{
  public function __toString()
  {
    return $this->getDestra();  

  }

}
