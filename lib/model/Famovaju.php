<?php

/**
 * Subclass for representing a row from the 'famovaju' table.
 *
 *
 *
 * @package lib.model
 */
class Famovaju extends BaseFamovaju
{
  protected $numlot="";

  public function getDesart()
  {
   return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
  }


}
