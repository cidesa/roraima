<?php

/**
 * Subclass for representing a row from the 'inestado' table.
 *
 *
 *
 * @package lib.model
 */
class Inestado extends BaseInestado
{

public function __toString()
  {
    return $this->nomedo;
  }


}
