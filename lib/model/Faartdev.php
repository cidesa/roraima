<?php

/**
 * Subclass for representing a row from the 'faartdev' table.
 *
 *
 *
 * @package lib.model
 */
class Faartdev extends BaseFaartdev
{
  protected $codalm="";

  public function getDesart()
  {
   return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
  }

}
