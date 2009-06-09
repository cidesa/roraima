<?php

/**
 * Subclass for representing a row from the 'fcrutas' table.
 *
 *
 *
 * @package lib.model
 */
class Fcrutas extends BaseFcrutas
{
  public function getDescripcionruta()
  {
  	return self::getDesrut();
  }
}
