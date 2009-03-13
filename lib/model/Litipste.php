<?php

/**
 * Subclass for representing a row from the 'litipste' table.
 *
 *
 *
 * @package lib.model
 */
class Litipste extends BaseLitipste
{
  public function __toString()
  {
    return $this->desste;
  }
}
