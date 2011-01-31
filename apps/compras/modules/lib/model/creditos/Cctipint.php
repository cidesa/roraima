<?php

/**
 * Subclass for representing a row from the 'cctipint' table.
 *
 *
 *
 * @package lib.model
 */
class Cctipint extends BaseCctipint
{
   public function __toString(){
    return $this->getNomtipint();
  }
}
