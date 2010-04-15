<?php

/**
 * Subclass for representing a row from the 'contabb' table.
 *
 *
 *
 * @package lib.model
 */
class Contabb extends BaseContabb
{
  public function getCodigo1()
  {
   return self::getCodcta();
  }
  public function getNombre1()
  {
   return self::getDescta();
  }
}
