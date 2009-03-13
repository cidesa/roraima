<?php

/**
 * Subclass for representing a row from the 'litipsol' table.
 *
 *
 *
 * @package lib.model
 */
class Litipsol extends BaseLitipsol
{
  public function __toString()
  {
    return $this->dessol;
  }
}
