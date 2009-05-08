<?php

/**
 * Subclass for representing a row from the 'nppartidas' table.
 *
 *
 *
 * @package lib.model
 */
class Nppartidas extends BaseNppartidas
{
  public function getCodpar2()
  {
  	return self::getCodpar();
  }

  public function getNompar2()
  {
  	return self::getNompar();
  }

}
