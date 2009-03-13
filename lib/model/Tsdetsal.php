<?php

/**
 * Subclass for representing a row from the 'tsdetsal' table.
 *
 *
 *
 * @package lib.model
 */
class Tsdetsal extends BaseTsdetsal
{
 protected $codpar="";
 protected $desart="";

  public function getCodpar()
  {
   return Herramientas::getX('CODART','Caregart','Codpar',self::getCodart());
  }

  public function getDesart()
  {
   return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
  }
}
