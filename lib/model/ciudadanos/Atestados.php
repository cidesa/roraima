<?php

/**
 * Subclass for representing a row from the 'atestados' table.
 *
 *
 *
 * @package lib.model
 */
class Atestados extends BaseAtestados
{
  public function __toString()
  {
    return $this->desest;
  }
}
