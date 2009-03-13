<?php

/**
 * Subclass for representing a row from the 'viaregtiptab' table.
 *
 *
 *
 * @package lib.model
 */
class Viaregtiptab extends BaseViaregtiptab
{

	protected $objcargos = array();


  public function __toString()
  {
    return $this->destiptab;
  }




}
