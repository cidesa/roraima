<?php

/**
 * Subclass for representing a row from the 'cctipcar' table.
 *
 *
 *
 * @package lib.model
 */
class Cctipcar extends BaseCctipcar
{
	protected $div='';

  public function __toString(){
    return $this->getNomtipcar();
  }
}
