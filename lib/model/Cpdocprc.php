<?php

/**
 * Subclass for representing a row from the 'cpdocprc' table.
 *
 *
 *
 * @package lib.model
 */
class Cpdocprc extends BaseCpdocprc
{
   public function getTipdocpre()
  {
  	return self::getTipprc();
  }

  public function getNomdocpre()
  {
  	return self::getNomext();
  }
}
