<?php

/**
 * Subclass for representing a row from the 'atinsrefier' table.
 *
 *
 *
 * @package lib.model
 */
class Atinsrefier extends BaseAtinsrefier
{
  public function __toString()
  {
    return $this->desinsref;
  }
}
