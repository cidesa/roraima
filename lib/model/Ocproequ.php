<?php

/**
 * Subclass for representing a row from the 'ocproequ' table.
 *
 *
 *
 * @package lib.model
 */
class Ocproequ extends BaseOcproequ
{
  public function getDesequ()
  {
  return Herramientas::getX('CODEQU','Ocdefequ','Desequ',self::getCodequ());
  }
}
